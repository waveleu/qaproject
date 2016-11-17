<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    //后台登录页面
    public function index()
    {
    	$this->display(':login');
    }
    public function check(){
    	if(IS_POST){
    		// 做一个简单的登录 组合where数组条件
    		$map['username']=I('username');
    		$map['password']=I('password');
    		$data=M('Users')->where($map)->find();
    		if(empty(M('Users')->where(array('username'=>$map['username']))->find()))
    		  $this->ajaxReturn("Can't find this user!"); 	    		
    		else if (empty($data)) {
    			$this->ajaxReturn("Username or password is wrong!");
    		}else{
    			$_SESSION['user']=array(
    					'id'=>$data['id'],
    					'username'=>$data['username'],
    					'avatar'=>$data['avatar']
    			);   			
    			$this->ajaxReturn('success');
    		}
    	}
    }

    public function send_email(){
    	$email=I('post.email');
    	$info=M('users')->where(array('email'=>$email))->find();
    	$content="<h1>Hello</h1>Your Username is ".$info['username']."<br>Your Password is ".$info['password'];
    	$title="Password Recovery";
    	$result=sendMail2($email,$title,$content);
    
    } 
    public function logout(){
    	session('user',null);
    	$this->redirect('Index/index');
    	//$this->success('退出成功、前往登录页面',U('Admin/Login/index'));
    }

}