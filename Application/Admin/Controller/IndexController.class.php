<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends AuthController {
    public function index(){
    	$nav_data=D('AdminNav')->getTreeData('level','order_number,id');
    	sort($nav_data);
    	sort($nav_data['0']['_data']);
    	$assign=array(
    			'data'=>$nav_data
    	);
    	$this->assign($assign);
    	$this->display(':index');
    }
}