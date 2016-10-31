<?php
namespace Admin\Controller;
use Think\Controller;
class TestrunController extends AuthController {
    public function index() {
        $filter=I('param.');
        if($filter['ajax']==true){
            unset($filter['ajax']);
        }else{
            $data=D('TestRun')->getData($filter);
        }
        $this->assign($data);
        $this->display("Public/testrun_index");
    }
    public function edit() {
        $data=I('post.');
        $result=D('TestRun')->saveData($data);
        $this->ajaxReturn($result);
    }
    
    public function del(){
        $id=I('id');
        $result=D('TestRun')->delData($id);
        $this->ajaxReturn($result);
    }
}