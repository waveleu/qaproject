<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * task_case相关
 */
class ItemModel extends BaseModel{
	public function getData($filter=""){
		$case_list=M('case')->where(array('group'=>$filter))->select();
		foreach($case_list as $k=>$v){
		    $item_info=M('item')->where(array('id'=>$v['item']))->find();
		    $taskcase_info=M('task_case')->where(array('id'=>$v['group']))->find();
		    $testcase_info=M('testcase')->where(array('id'=>$taskcase_info['cid']))->find();
		    $case_list[$k]['item_name']=$item_info['name'];
		    $case_list[$k]['item_unit']=$item_info['unit'];
		    $case_list[$k]['case_name']=$testcase_info['CaseName'];
		}
		return $case_list;
	}
		
	public function saveData($data){
	    $array=explode(',',$data);
	    foreach ($array as $value){
	        list($name,$unit)=explode(' ',$value);
	        $tmp=array('name'=>$name,'unit'=>$unit);
	        $item_id=M(item)->add($tmp);
	    };
	    
	    $suit=$data['suit'];
	    if($data['id']!=null&&$data['id']!=""){
	        unset($data['id']);
	        $result=$this->where(array('id'=>$id))->save($data);
	    }else{
	        $result=$this->add($data);
	        $suit=D('TaskShot')->where(array('name'=>$suit))->getField('cids');
	        $suit=explode(',', $suit);
	        foreach ($suit as $k=>$v){
	            $tmp=array('cid'=>$v,'tid'=>$result,'start_time'=>$data['start_time'],'end_time'=>$data['end_time']);
	            M('task_case')->add($tmp);
	        }
	    }
	    return $result;
	}
	
	public function getPage($data,$limit='15'){
		$count      = $data->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,$limit);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show       = $Page->show();// 分页显示输出
		$list = $data->order('id')->select();//limit($Page->firstRow.','.$Page->listRows)->
		$result=array(
				'list'=>$list,
				'page'=>$show
		);
		return $result;
	}
}