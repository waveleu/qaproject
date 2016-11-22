<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台权限管理
 */
class RuleController extends AuthController{

//******************权限***********************
    /**
     * 权限列表
     */
    public function index(){
        $data=D('AuthRule')->getTreeData('tree','id asc','title');
        $assign=array(
            'data'=>$data
            );
        
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加权限
     */
    public function add(){
        $data=I('post.');
        unset($data['id']);
        D('AuthRule')->addData($data);
        $this->display("index");
    }

    /**
     * 修改权限
     */
    public function edit(){
        $data=I('post.');
        $map=array(
            'id'=>$data['id']
            );
        D('AuthRule')->editData($map,$data);
        $this->display("index");
    }

    /**
     * 删除权限
     */
    public function delete(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
            );
        $result=D('AuthRule')->deleteData($map);
        if($result){
            $this->success('删除成功',U('Admin/Rule/index'));
        }else{
            $this->error('请先删除子权限');
        }

    }
//*******************用户组**********************
    /**
     * 用户组列表
     */
    public function group(){
        $data=D('AuthGroup')->select();  
        for($i=0;$i<count($data);$i++){
        	$data[$i]['titles']=D('AuthGroup')->getTitles($data[$i]['id']);
        	$data[$i]['name']=$i+100000000;
        	$data[$i]['uids']=D('AuthGroupAccess')->getUidsByGroupId($data[$i]['id']);
        	$data[$i]['uids']=implode(',', $data[$i]['uids']);
        }
        $rule_info=D('AuthRule')->where('pid=0')->select();
  		$user_info=D('AuthGroupAccess')->getAllData();
  		$user_list=D('Users')->where('id>0')->select();
        $assign=array(
            'data'=>$data,
        	'rule_info'=>$rule_info,
        	'group_info'=>$user_info,
        	'user_list'=>$user_list
            );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加用户组
     */
    
    public function add_group(){
        $data['title']=I('title');
       $data['rules']=D('AuthGroup')->get_rules(I('rules'));
        $result=D('AuthGroup')->add($data);
        $this->ajaxReturn($result,'json');
    }

    /**
     * 修改用户组
     */
    public function edit_group(){
        $data['id']=I('id','');
        $data['title']=I('title');
        $data['rules']=D('AuthGroup')->get_rules(I('rules'));
        
        if($data['rules']!=null&&$data['rules']!="")
		{
			$result=D('AuthGroup')->where(array('id'=>$data['id']))->save(array('rules'=>$data['rules']));			
		}
		elseif($data['title']!=null&&$data['title']!=""){
			$result=D('AuthGroup')->where(array('id'=>$data['id']))->save(array('title'=>$data['title']));
		}			  
		$this->ajaxReturn($result); 
    }

    /**
     * 删除用户组
     */
    public function delete_group(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
            );
        D('AuthGroup')->deleteData($map);
        $this->redirect("group");
    }

//*****************权限-用户组*****************
    /**
     * 分配权限
     */
    public function rule_group(){
        if(IS_POST){
            $data=I('post.');
            $map=array(
                'id'=>$data['id']
                );
            $data['rules']=implode(',', $data['rule_ids']);
            D('AuthGroup')->editData($map,$data);
            $this->redirect("group");
        }else{
            $id=I('get.id');
            // 获取用户组数据
            $group_data=M('Auth_group')->where(array('id'=>$id))->find();
            $group_data['rules']=explode(',', $group_data['rules']);
            // 获取规则数据
            $rule_data=D('AuthRule')->getTreeData('level','id','title');
            $assign=array(
                'group_data'=>$group_data,
                'rule_data'=>$rule_data
                );
            $this->assign($assign);
            $this->display();
        }

    }
 //******************用户-用户组分配*******************
 public function group_re_assign(){
 	$group_id=I('group_id','');
 	$uids=explode(',', I('uids'));
 	$data=array();
 	foreach ($uids as $key=>$value){
 		$data[$key]['uid']=$value;
 		$data[$key]['group_id']=$group_id;
 	}
 	if($group_id!=""){
 		$del_map['group_id']=$group_id;
 		$del_map['uid']=array('neq','88');
 		$result=D('AuthGroupAccess')->where($del_map)->delete();
 		foreach ($data as $k=>$v){
 			$result=D('AuthGroupAccess')->data($v)->add();
 		}
 	}else{
 		$result="group_id is null";
 	}
 	$this->ajaxReturn($result,'json');
 }
 //******************用户-用户组分配*******************
 
//******************用户-用户组*******************

    /**
     * 添加用户到用户组
     */
    public function add_user_to_group(){
        $data=I('post.');
        $group_id=$data['group_id'];
        unset($data['group_id']);
        $uid=D('Users')->add($data); 
        if($uid!=false&&$uid>0) {
        	$map=array(
        			'uid'=>$uid,
        			'group_id'=>$group_id
        	);
        	D('AuthGroupAccess')->addData($data);
        }    
    }

    /**
     * 将用户移除用户组
     */
    public function delete_user_from_group(){
        $map=I('get.');
        D('AuthGroupAccess')->deleteData($map);
        $this->redirect("group");
    }

    /**
     * 管理员列表
     */
    public function admin_user_list(){
        $data=D('AuthGroupAccess')->getAllData();
        $group_info=D('AuthGroup')->where('id>0')->select();
        $assign=array(
            'data'=>$data,
        	'group_info'=>$group_info
            );
        $this->assign($assign);
        $this->display();
    }
    public function edit_user(){
    	$data=I('post.');
    	$group_ids=explode(',', $data['group_ids']);

    	$uid=$data['id'];
    	unset($data['group_ids']);
    	$result=D('Users')->where(array('id'=>$uid))->save($data);
    	if(true){
    		$tmp=array();
    		D('AuthGroupAccess')->where(array('uid'=>$uid))->delete();
    		foreach ($group_ids as $value){
    		   $tmp=array('uid'=>$uid,'group_id'=>$value);
    		   $result_group=D('AuthGroupAccess')->add($tmp); 
    		}
    		$this->ajaxReturn($tmp);
    	}
    	
    }
    
    //添加用户，并分配权限组
    public function add_user(){
    	$data=I('post.');
    	$data['password']=md5($data['password']);
    	$data['status']='1';
    	$group_ids= explode(',',$data['group_ids'] ); 
    	unset($data['group_ids']);
    	if($data['username']!=""&&$data['password'])
    			$uid=D('Users')->add($data);
    	 if($uid!=false&&$uid!=null){
    			foreach ($group_ids as $key=>$value){
    				$result_group[$key]=D('AuthGroupAccess')->data(array('uid'=>$uid,'group_id'=>$value))->add();  			     			
    		}	
    	}
    	$this->ajaxReturn($group_ids,'json');
    }

    //删除用户并解绑权限组
    public function delete_user(){
    	$id=I('id');
    	$result=D('Users')->where(array('id'=>$id))->delete();
    	if ($result){
    		$result=D('AuthGroupAccess')->where(array('uid'=>$id))->delete();
    		$result=($result==flase?"unbind failed":"delete success");
    		$this->ajaxReturn($result,'json');
    	}
    	else{
    		$this->ajaxReturn('delete failed','json');
    	}
    }
    
    /**
     * 添加管理员
     */
    public function add_admin(){
        if(IS_POST){
            $data=I('post.');
            $result=D('Users')->addData($data);
            if($result){
                if (!empty($data['group_ids'])) {
                    foreach ($data['group_ids'] as $k => $v) {
                        $group=array(
                            'uid'=>$result,
                            'group_id'=>$v
                            );
                        D('AuthGroupAccess')->addData($group);
                    }                   
                }
                // 操作成功
                $this->display('admin_user_list');
            }else{
                $error_word=D('Users')->getError();
                // 操作失败
                $this->error($error_word);
            }
        }else{
            $data=D('AuthGroup')->select();
            $assign=array(
                'data'=>$data
                );
            $this->assign($assign);
            $this->display();
        }
    }

    /**
     * 修改管理员
     */
    public function edit_admin(){
        if(IS_POST){
            $data=I('post.');
            // 组合where数组条件
            $uid=$data['id'];
            $map=array(
                'id'=>$uid
                );
            // 修改权限
            D('AuthGroupAccess')->deleteData(array('uid'=>$uid));
            foreach ($data['group_ids'] as $k => $v) {
                $group=array(
                    'uid'=>$uid,
                    'group_id'=>$v
                    );
                D('AuthGroupAccess')->addData($group);
            }
            $data=array_filter($data);
            // 如果修改密码则md5
            if (!empty($data['password'])) {
                $data['password']=md5($data['password']);
            }
            // p($data);die;
            $result=D('Users')->editData($map,$data);
            if($result){
                // 操作成功
                $this->success('编辑成功',U('Admin/Rule/edit_admin',array('id'=>$uid)));
            }else{
                $error_word=D('Users')->getError();
                if (empty($error_word)) {
                    $this->success('编辑成功',U('Admin/Rule/edit_admin',array('id'=>$uid)));
                }else{
                    // 操作失败
                    $this->error($error_word);                  
                }

            }
        }else{
            $id=I('get.id',0,'intval');
            // 获取用户数据
            $user_data=M('Users')->find($id);
            // 获取已加入用户组
            $group_data=M('AuthGroupAccess')
                ->where(array('uid'=>$id))
                ->getField('group_id',true);
            // 全部用户组
            $data=D('AuthGroup')->select();
            $assign=array(
                'data'=>$data,
                'user_data'=>$user_data,
                'group_data'=>$group_data
                );
            $this->assign($assign);
            $this->display();
        }
    }
}
