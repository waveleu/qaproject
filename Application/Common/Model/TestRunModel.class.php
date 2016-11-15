<?php
namespace Common\Model;
use Think\Model;

class TestRunModel extends BaseModel{
    public function getData($filter='id>0'){
        
        //排序规则      
        $progress=false;
        $sort_rule='start_time desc';
        if($filter['sort']&&$filter['sort']!=null){
            if($filter['sort']!='progress')
                $sort_rule=$filter['sort'];
            else
                $progress=true;
        }
        unset($filter['sort']);
        $data=$this->getPage('TestRun',20,$filter,$sort_rule);
        
        foreach ($data['list'] as $k=>$v){
            $total=$this->table('go_task Task,go_task_case TaskCase')->where(array('TaskCase.tid=Task.id ','Task.pid'=>$v['id']))->count();
            $pass_count=$this->table('go_task Task,go_task_case TaskCase')->where(array('TaskCase.tid=Task.id ','Task.pid'=>$v['id'],'TaskCase.result'=>'pass'))->count();
            $data['list'][$k]['progress']=sprintf('%.1f',($pass_count/$total)*100).'%';
            $temp=M('project')->where(array('id'=>$v['pid']))->find();
            $data['list'][$k]['project']=$temp['name'];
        }
        if($progress){
            usort($data['list'], function ($a,$b){
                if($a['progress']==$b['progress'])
                    return 0;
                else
                    return  $a['progress']<$b['progress']?-1:1;
            });
            
        }
        //var_dump($data['list']);
        $data['project_info']=D('Project')->where(array('id'=>$filter['pid'])) ->find();    
        return $data;
    }
    
    public function saveData($data){
        $id=$data['id'];       
        if($data['id']!=null&&$data['id']!=""){
            unset($data['id']);
            $result=$this->where(array('id'=>$id))->save($data);
        }else{
            $result=$this->add($data); 
        }
    }
    
    public function delData($id) {
        $task_id=D('Task')->where(array('pid'=>$id))->getField('id',true);
        foreach ($task_id as $v) {
            D('Task')->delData($v);
        }
        $result=$this->where(array('id'=>$id))->delete();
        return $result;
    }
}