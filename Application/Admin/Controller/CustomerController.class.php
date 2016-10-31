<?php
namespace Admin\Controller;
use Think\Controller;
class CustomerController extends AuthController {
	public function _empty($action='index')
	{
		$data=M('customer')->where('id>0')->select();
		$data=array(
				'data'=>$data
		);
		$this->assign($data);
		$this->display("Public/customer_index");
	}
	public function edit(){
		$map=I('post.');
		$id['id']=$map['id'];
		unset($map['id']);
		$result=M('customer')->where($id)->save($map);
		$this->ajaxReturn($result,'json');
	}
	public function add(){
		$map=I('post.');
		$result=M('customer')->add($map);
		$this->ajaxReturn($result,'json');
	}
	public function del(){
		$id=I('id');
		$result=M('customer')->delete($id);
		$this->ajaxReturn($result,'json');
	}
}

