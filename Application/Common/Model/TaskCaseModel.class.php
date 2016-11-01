<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * task_case相关
 */
class TaskCaseModel extends BaseModel{
	public function getData($filter=""){
		//条件过滤
		if($filter['result']=="NA"){
		    $filter['result']='N/A';		    
		}
		$arr=array('TaskCase.cid=Testcase.id AND TaskCase.tid=Task.id ');
		if($filter['tid']&&isset($filter['tid'])){
		    unset($filter['pid']);
		    $task_info=D('Task')->where(array('id'=>$filter['tid']))->find();
		    $task_list=D('Task')->where(array('pid'=>$task_info['pid']))->getField('id,name',true);
		}
		$sort_rule='id';
		foreach ($filter as $k=>$v){
			if($v&&isset($v)){
				if($k=='BugID'){
					$arr['TaskCase.BugID']=array('like',"%{$v}%");
				}else if($k=='CaseName'){
				    $arr['TestCase.CaseName']=array('like',"%{$v}%");
				}else if($k=='driver'){
				    $arr['TaskCase.driver']=array('like',"%{$v}%");
				}else if($k=='Status'){
				    $arr['TaskCase.Status']=array('like',"%{$v}%");
				}else if($k=='result'){
				    $arr['TaskCase.result']=array('like',"%{$v}%");
				}elseif($k=='sort'){
				    $sort_rule=$v; 
				    unset($filter['sort']);
				}else{
				    $arr['TaskCase.'.$k]="";
					$arr['TaskCase.'.$k]=$v;
				}
			}				
		}		
		//排序字段
		
		$cid_list 		  =$this->table('go_task_case TaskCase,go_task Task,go_testcase Testcase')->field('TaskCase.id,TaskCase.cid,TaskCase.tid')
							->where($arr)->select();		
		$list=$this->table('go_task_case TaskCase,go_task Task,go_testcase Testcase')
							->field('TaskCase.id,TaskCase.cid,TaskCase.tid,TaskCase.BugID,TaskCase.comments,TaskCase.driver,TaskCase.result,Testcase.pid as class_id,Testcase.CaseName as casename,Task.name as taskname')
							->where($arr)->order($sort_rule)->select();
		//var_dump($list);
		//case信息
		foreach ($list as $k=>$v){
		    $info=M('Testcase')->where(array('id'=>$v['cid']))->find();
		    $list[$k]['info']="";
		    foreach ($info as $key=>$val)
		        if($key!='id')
		            $list[$k]['info'].=$key.'&nbsp;:&nbsp;'.$val.'&#10;';
		}
		$data=array();
		$cname_list=array();
		foreach($list as $k=>$v){
		   $tmp=$v['class_id'];
		   if(!$cname_list[$tmp]||!isset($cname_list[$tmp])){
		       $cname_list[$tmp]=$this->getClass($tmp);
		   }
		   $data[$cname_list[$tmp]][]=$v;
		}
		ksort($cname_list);
		//var_dump($cname_list);
		$result=array(
		         'list'=>$list,
				'data'=>$data,
				'cid_list'=>json_encode($cid_list),
		        'task'=> $task_list,
		        'task_info'=>$task_info,
		        'cname_list'=>$cname_list
		);
		return $result;
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