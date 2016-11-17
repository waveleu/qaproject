<?php
namespace Common\Model;
use Common\Model\BaseModel;
use Admin\Controller\ProjectController;
/**
 * task相关
 */
class TaskModel extends BaseModel{
		
	public function getData($filter=""){
		if($filter['pid']==0){
			unset($filter['pid']);
		}		
		$sort_rule='start_time desc';
		if($filter['sort']&&$filter['sort']!=null){
		      $sort_rule=$filter['sort'];
		      unset($filter['sort']);
		}
		
		
		$suit_list=M('task_shot')->getField('name',true);
		$platform_list=M('platform')->select();
		$uid_list=D('AuthGroupAccess')->where(array('group_id'=>'20'))->getField('uid',true);		
		$list = D('Task')->where($filter)->order($sort_rule)->select();	;
		$user_list=array();
		$result_type=M('result_type')->where('id>0')->getField('name',true);
		foreach ($uid_list as	 $k=>$v){
			$tmp=M('Users')->where(array('id'=>$v))->find();
			array_push($user_list, $tmp);
		}
		foreach ($list as $k=>$v){
			$tmp=M('board')->where(array('Name'=>$v['board']))->find();
			//$list[$k]['platform_name']=' '.$tmp['Board'].' '.'/'.' '.$tmp['BSP'].' '.' '.'/'.$tmp['OS'].$tmp['Version'];
			$list[$k]['board_name']=$tmp['Name'];
			$list[$k]['project_name']=D('Project')->table('go_project Project,go_test_run Run,go_task Task')->
			                                             where(array('Project.id=Run.pid ','Run.id'=>$v['pid']))->getField('Project.name');
			$case_count=D('TaskCase')->where(array('tid'=>$v['id']))->count();
			$str_total='total: '.sprintf('%04s',$case_count);
			foreach ($result_type as $key=>$vc){
			    $tmp=D('TaskCase')->where(array('tid'=>$v['id']))->where(array('result'=>$vc))->count();
			    switch ($vc){
			        case "pass":
			        $str_pass='pass: <span style="background-color: #0a0">'.sprintf('%03s',$tmp).'</span>';
			        break;
			        case "fail":
			        $str_fail='fail: <span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
			        break;
			        case "timeout":
			        $str_timeout='timeout: <span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
			        break;
			        case "Notrun":
			        $str_Notrun='Notrun: <span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
			        break;
			        case "N/A": 
			        $str_NA='N/A: <span style="background-color: #f44">'.sprintf('%03s',$tmp).'</span>';
			        break;
			    }
			}
			foreach (array(Waiting,Running,finished) as $key=>$vc){
			    $tmp=D('TaskCase')->where(array('tid'=>$v['id']))->where(array('Status'=>$vc))->count();
			    switch ($vc){
			        case "Waiting":
			            $str_Waiting=$tmp;
			            break;
			        case "Running":
			            $str_Running=$tmp;
			            break;
			        case "finished":
			            $str_finished=$tmp;
			            break;
			    }
			}
			$list[$k]['total']=$str_total;
			$list[$k]['pass']=$str_pass;
			$list[$k]['fail']=$str_fail;
			$list[$k]['timeout']=$str_timeout;
			$list[$k]['NA']=$str_NA;
			$list[$k]['Notrun']=$str_Notrun;
			//$list[$k]['progress']=sprintf('%.1f',(floatval(preg_replace('/\D/s', '', $str_pass))/floatval(preg_replace('/\D/s', '', $str_total)))*100).'%';
			$list[$k]['progress']=sprintf('%.1f',(1-floatval($str_Waiting)/floatval(preg_replace('/\D/s', '', $str_total)))*100).'%';
		}
		//var_dump($list);
		$run_info=D('TestRun')->where(array('id'=>$filter['pid']))->find();
		$run_list=D('TestRun')->where('id>0')->getField('id,name');
		
		$result=array(
				'list'=>$list,
				'suit_list'=>$suit_list,
				'platform_list'=>$platform_list,
				'user_list'=>$user_list,
				'run_info'=>$run_info,
		        'run_list'=>$run_list,
		);		
		return $result;
	}

	public function saveData($data){
		$id=$data['id'];		
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
	public function delData($id){
		$result=D('Task')->where(array('id'=>$id))->delete();
		$result=D('TaskCase')->where(array('tid'=>$id))->delete();
		return $result;
	}
	
}