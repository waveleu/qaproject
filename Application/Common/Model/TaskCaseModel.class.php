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
							->field('TaskCase.id,TaskCase.cid,TaskCase.tid,Task.pid,TaskCase.BugID,TaskCase.Status,TaskCase.item,TaskCase.comments,TaskCase.driver,TaskCase.result,Testcase.pid as class_id,Testcase.CaseName as casename,Task.name as taskname,Task.board')
							->where($arr)->order($sort_rule)->select();
		//case信息
		$result_type=M('result_type')->where('id>0')->getField('name',true);
		foreach ($list as $k=>$v){
		    $info=M('Testcase')->where(array('id'=>$v['cid']))->find();
		    $list[$k]['info']="";
		    foreach ($info as $key1=>$val)
		        if($key1!='id')
		            $list[$k]['info'].=$key1.'&nbsp;:&nbsp;'.$val.'&#10;';
		        
	        $tmp=M('board')->where(array('Name'=>$v['board']))->find();
	        $list[$k]['board_name']=$tmp['Name'];
	        $list[$k]['project_name']=D('Project')->table('go_project Project,go_test_run Run,go_task Task')->
	        where(array('Project.id=Run.pid ','Run.id'=>$v['pid']))->getField('Project.name');
	        $case_count=D('TaskCase')->where(array('tid'=>$v['id']))->count();
	        $str_total='<span style="background-color: #ccc">'.sprintf('%04s',$case_count).'</span>';;
	        foreach ($result_type as $key=>$vc){
	            $tmp=D('TaskCase')->where(array('tid'=>$v['id']))->where(array('result'=>$vc))->count();
	            if($vc=='pass')
	                $str_pass='<span style="background-color: #0a0">'.sprintf('%03s',$tmp).'</span>';
	            else if($vc=='fail'){
	                $str_fail='<span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
	            }
	            else if($vc=='timeout'){
	                $str_timeout='<span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
	            }else if($vc=='Not Run'){
	                $str_Notrun='<span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
	            }
	            else if($vc=='N/A'){
	                $str_NA='<span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
	            }
	        }
	        $list[$k]['total']=$str_total;
	        $list[$k]['pass']=$str_pass;
	        $list[$k]['fail']=$str_fail;
	        $list[$k]['timeout']=$str_timeout;
	        $list[$k]['NA']=$str_NA;
	        $list[$k]['Notrun']=$str_Notrun;
	        $list[$k]['progress']=sprintf('%.1f',(floatval(preg_replace('/\D/s', '', $str_pass))/floatval(preg_replace('/\D/s', '', $str_total)))*100).'%';
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
		//var_dump($data);
		ksort($cname_list);
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