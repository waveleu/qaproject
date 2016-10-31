<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * task相关
 */
class TaskShotModel extends BaseModel{
		/**
		 * task_shot操作
		 */
	public function getData(){
		$data=D('TaskShot')->select();
		$page=$this->getPage('TaskShot',15);	
		$result=array(
				'list'=>$page['list'],
				'page'=>$page['page'],
				'shot_data'=>$data,
		);
		
		return $result;
	}

	public function saveData($data){
		$id=$data['id'];		
		if($data['id']!=null&&$data['id']!=""){
			unset($data['id']);
			$result=M('task_shot')->where(array('id'=>$id))->save($data);
		}else{
			$result=D('TaskShot')->add($data);
		}
		return $result;
	} 
	
}