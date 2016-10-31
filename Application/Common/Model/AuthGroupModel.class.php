<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * 权限规则model
 */
class AuthGroupModel extends BaseModel{

	/**
	 * 传递主键id删除数据
	 * @param  array   $map  主键id
	 * @return boolean       操作是否成功
	 */
	public function deleteData($map){
		$this->where($map)->delete();
		$group_map=array(
			'group_id'=>$map['id']
			);
		// 删除关联表中的组数据
		$result=D('AuthGroupAccess')->deleteData($group_map);
		return $result;
	}
	
	//获取rules对应的title信息
	public function getTitles($groupid){
		$rules=$this->where(array('id'=>$groupid))->getField('rules');
		$rule_id_list=explode(',', $rules);
		$titles=array();
		$title_list=D('AuthRule')->where('pid=0')->order('id asc')->select();
		foreach ($title_list as $key=>$value){
			$titles[$key]['name']=$value['title'];
			$titles[$key]['id']=$value['id'];
			$titles[$key]['flag']=2;
			if(in_array($value['id'], $rule_id_list)){
				$titles[$key]['flag']=1;
			}
		}	
		return $titles;		
	}
	
	
	public function ruleToTitle($rules){
		$rules=explode(',',$rules );
		$map['id']=array('in',$rules);
		$rule_list=D('AuthRule')->where($map)->field('title')->select();
		foreach ($rule_list as $key=>$value){
			$rule_list[$key]=$value['title'];
		}
		return $rule_list;
	}

	public function get_rules($rules_pid){
	    $rules_pid=explode(',',$rules_pid);
	    $rules=array();
	    foreach ($rules_pid as $k=>$v){
	        array_push($rules, $v);
	        $sub_id=D('AuthRule')->where(array('pid'=>$v))->getField('id',true);
	        if($sub_id!=null)
	            $rules[]=implode(',',$sub_id );
	    }
	    $rules=implode(',', $rules);
	    return $rules;
	}
}
