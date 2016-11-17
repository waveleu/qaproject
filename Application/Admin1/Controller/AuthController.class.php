<?php
namespace Admin\Controller;
use Think\Controller;
class AuthController extends Controller {

    public function _initialize(){
    	//parent::_initialize();
    	$auth=new \Think\Auth();
    	$rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
    	$result=$auth->check($rule_name,$_SESSION['user']['id']);
    	if(!$result){
    		$this->redirect('/Admin/Login/index');
    	}
    }
}