<?php
namespace Admin\Controller;
use Think\Controller;

class BoardlistController extends AuthController {
    public function index(){
       $data=D('BoardList')->getData();   
       $this->assign($data);
       //var_dump($data['owner_list']);
       $this->display('Public/board_list_index');
    }
    public function add() {
        $data=I('post.');
        $result=D('BoardList')->add($data);
        if($result!=0)
            $this->ajaxReturn('success');
        else
            $this->ajaxReturn('error');
    }
    public function edit() {
        $data=I('post.');
        $id=$data['id'];
        unset($data['id']);
        $result=D('BoardList')->where(array('id'=>$id))->save($data);
        if($result!=false)
            $this->ajaxReturn('success');
        else
            $this->ajaxReturn('error');
    }
    public function del(){
        $id=I('id');
        $result=D('BoardList')->where(array('id'=>$id))->delete();
        if($result!=0)
            $this->ajaxReturn('success');
        else
            $this->ajaxReturn('error');
    }
}