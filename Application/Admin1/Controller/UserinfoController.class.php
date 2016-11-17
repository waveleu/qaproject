<?php
namespace Admin\Controller;
use Think\Controller;

class UserinfoController extends AuthController {
    public function index() {
        $uid=$_SESSION['user']['id'];
        $userinfo=M('users')->where(array('id'=>$uid))->find();
        $this->assign($userinfo);
        $this->display('Public/personal_info');
    }
    public function edit() {
        $uid=$_SESSION['user']['id'];
        $userinfo=M('users')->where(array('id'=>$uid))->find();
        $this->assign($userinfo);
        $this->display('Public/password_reset');
    }
    public function save(){
        $uid=$_SESSION['user']['id'];    
        $pass=I('new_pass');
        $info=M('users')->where(array('id'=>$uid))->save(array('password'=>$pass));
        $this->index();
    }
}