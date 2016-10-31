<?php
namespace Common\Model;
use Think\Model;
use Common\Controller\PublicBaseController;

class TestcaseModel extends Model{
	
	public function getTree(){
			$class=M('class')->select();
			$customer_list=M('customer')->select();
			$project_list=M('project')->select();
			$board_list=M('board')->select();
			$os_list=M('os')->select();
			foreach($class as $k=>$v){
				$class[$k]['count']=$this->getCount($v['id']);
			}
			$data=M('testcase')->select();
			foreach ($data as $k=>$v){
			    $data[$k]['info']="";
			    foreach ($v as $key=>$val)
			        if($key!='id')
			             $data[$k]['info'].=$key." : ".$val.'<br/>';  
			}
			//var_dump($data);
			$map=array(
					'class'=>json_encode($class),
					'tree_data'=>json_encode($data),
					'customer_list'=>$customer_list,
					'os_list'=>$os_list,
					'board_list'=>$board_list,
					'project_list'=>$project_list
			);
			return $map;
		}
		
		public function getCount($id=''){
			$count=0;
			$count+=M('testcase')->where(array('pid'=>$id))->count();
			$sub_dir=M('class')->where(array('pid'=>$id))->getField('id',true);
			if(count($sub_dir)){
				foreach ($sub_dir as $k=>$v){
					$count+=$this->getCount($v);
				}
			}
			return $count;
		}
}