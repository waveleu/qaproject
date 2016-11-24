<?php
namespace Admin\Controller;
use Think\Controller;
class BspController extends AuthController {
	public function _empty($action='index')
	{
		$data=M('bsp')->where('id>0')->select();
		$customer_list=M('customer')->where('id>0')->getField('Name',true);
		$data=array(
				'data'=>$data,
				'customer_list'=>$customer_list,
		        
		);
		
		$this->assign($data);
		$this->display("Public/bsp_index");
	}
	public function edit(){
		$map=I('post.');
		$id['id']=$map['id'];
		unset($map['id']);
		$result=M('bsp')->where($id)->save($map);
		$this->ajaxReturn($result,'json');
	}
	public function add(){
		$map=I('post.');
		$result=M('bsp')->add($map);
		$this->ajaxReturn($result,'json');
	}
	public function del(){
		$id=I('id');
		$result=M('bsp')->where(array('id'=>$id))->delete();
		$this->ajaxReturn($result,'json');
	}
}























