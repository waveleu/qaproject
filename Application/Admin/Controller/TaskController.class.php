<?php
namespace Admin\Controller;
use Think\Controller;
class TaskController extends AuthController {
	/**
	 * Task操作
	 */
	public function index(){
		$filter=I('param.');
		if($filter['seconglist']==true){
		    $map['OS']=I('OS');
		    $result=M('os_version')->where($map)->select();
		    $this->ajaxReturn($result,'json');
		}else{
		    $ajax=$filter['ajax'];
		    unset($filter['ajax']);
		    $data=D('Task')->getData($filter);
		    $os_list=M('os')->where('id>0')->getField('OS',true);
		    $tree=D('Testcase')->getTree();
		    $scm=M('scm')->where('id>0')->getField('Build_No',true);
		    $data_task=M('task')->where('id>0')->select();
		    foreach ($data_task as $k=>$v){
		        $data_task[$k]['ov_list']=M('os_version')->where(array('OS'=>$v['OS']))->getField('Version',true);
		    } 
		    $this->assign($data);
		    $this->assign($tree);
		    $this->assign('scm',$scm);
		    $this->assign('os_list',$os_list);
		    $this->assign('data',$data_task);
		    if($ajax==true){
		        $this->display('task_index_table_div');
		    }else{
		        $this->display();
		    }
		}
	}
	public function task_search(){
		
	}
	public function add(){
		$data=I('post.');
		$result=D('Task')->saveData($data);
		$this->ajaxReturn($result);
	}
	public function del(){
		$id=I('id');
		$reuslt=D('Task')->delData($id);
		$this->ajaxReturn($reuslt);
	} 
	
	/**
	 * TaskShot操作
	 */
    public function shot_index(){
    	$data=D('TaskShot')->getData();
    	$tree=D('Testcase')->getTree();
    	$this->assign($data);
    	$this->assign($tree);
    	$this->display();
    }
    public function shot_edit(){
    	$data=I('post.');
    	$result=D('TaskShot')->saveData($data);
    	$this->ajaxReturn($result);
    }
    public function shot_del(){
    	$id=I('id');
    	$result=D('TaskShot')->where(array('id'=>$id))->delete();
    	$this->ajaxReturn($id.':'.$result);
    }

    public function case_index(){
    	$filter=I('param.');
    	if($filter['ajax']==true){
    		unset($filter['ajax']);
    		$data=D('TaskCase')->getData($filter);
    		$project_list=D('Project')->getField('id,name',true);
    		$data['reuslt_list']=M('result_type')->where('id>0')->getField('name',true);
    		$task_list=array();
    		foreach ($project_list as $k=>$v){
    			$task_list[$k]=D('Task')->where(array('pid'=>$k))->getField('id,name');
    		}
    		$data['project_list']=$project_list;
    		$data['task_list']=json_encode($task_list);
    		$this->assign($data);
    		$this->display('case_table_div');    		
    	}
    	else if($filter['case_item']==true){
    	    $data=D('Item')->getData();
    	    $this->assign('data',$data);
    	    $this->display('case_item');
    	}
    	else{
    		$data=D('TaskCase')->getData($filter);
    		$tree=D('Testcase')->getTree();
    		$testrun_list=D('TestRun')->getField('id,name',true);
    		$task_list=array();
    		$project_list=D('Project')->getField('id,name',true);
    		foreach ($project_list as $k=>$v){
    			$task_list[$k]=D('Task')->where(array('pid'=>$k))->getField('id,name');
    		}
    		$data['testrun_list']=$testrun_list;
    		$data['task_list']=json_encode($task_list);
    		$data['result_list']=M('result_type')->where('id>0')->getField('name',true);
    		$this->assign($tree);
    		$this->assign($data);
    		$this->display(); 
    	}
    	 
    }
 	public function case_reassign(){
 		$data=I('post.');
 		$cids=explode(',', ($data['cids']));
 		$tid=$data['tid'];
 		$original_cids=D('TaskCase')->where(array('tid'=>$tid))->getField('id,cid',true);
 		foreach ($original_cids as $k=>$v){
 			if(!in_array($v, $cids))
 			{
 				D('TaskCase')->delete($k);
 			}
 		}
 		foreach ($cids as $k=>$v){
 			if(!in_array($v, $original_cids))
 			{
 				$time=date('Y-m-d H:i:s');
 				D('TaskCase')->add(array('cid'=>$v,'tid'=>$tid,'start_time'=>$time));
 			}
 		}
 	}
	
	public function case_del(){
		$id=I('id');
		D('TaskCase')->delete($id);
	}
	public function case_edit(){
		$data=I('post.');
		$id['id']=$data['id'];
		unset($data['id']);
		$result=D('TaskCase')->where($id)->save($data);
		$this->ajaxReturn($result); 
	}
	
	public function mytask(){
	   $filter=I('param.');
	   unset($filter['p']);
	   //根据用户所属用户组查看
	   $filter['owner']=$_SESSION['user']['username'];
	   $owner= $filter['owner'];
	   $uid=D('Users')->where(array('username'=>$owner))->getField('id');
	   $group_ids=D('AuthGroupAccess')->where(array('uid'=>$uid))->getField('group_id',true);
	   foreach ($group_ids as $v){
	       if($v!='20')
	           unset($filter['owner']);
	   }
	   
	   $ajax=$filter['ajax'];
	   unset($filter['ajax']);
	   $data=D('Task')->getData($filter);
	   
	   $tree=D('Testcase')->getTree();
	   $this->assign($data);
	   $this->assign($tree);
	   if($ajax==true){
	       $this->display('task_index_table_div');
	   }else{
	       $this->display('mytask');
	   }
	}
	public function alltask(){
	    $filter=I('param.');
	    unset($filter['p']);
	
	    $ajax=$filter['ajax'];
	    unset($filter['ajax']);
	    $data=D('Task')->getData($filter);
	
	    $this->assign($data);
	    if($ajax==true){
	        $this->display('task_index_table_div');
	    }else{
	        $this->display('mytask');
	    }
	}
	public function _empty($action='check_version'){
	    $map['OS']=I('OS');
	    $result=M('os_version')->where($map)->select();
	    $this->ajaxReturn($result,'json');
	}
}
