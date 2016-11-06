<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * task_case相关
 */
class ItemModel extends BaseModel{
	public function getData(){
		$case_list=M('case')->where('id>0')->select();
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
	
    public function getClass($class_id){
        $name=array();
        while($class_id!=0){
            $tmp=M('class')->where(array('id'=>$class_id))->getField('name');
            $name[]=$tmp;
            $class_id=M('class')->where(array('id'=>$class_id))->getField('pid');
        }
        $name=array_reverse($name);
        return implode('-', $name);
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