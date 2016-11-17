<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台权限管理
 */
class BranchController extends AuthController{
	
	public function index(){
		$data=M('branch')->where('id>0')->select();
		$this->assign('data',$data);
		$this->display('Public/branch_index');
	}
	public function edit(){
		$data=I('post.');
		$id['id']=$data['id'];
		unset($data['id']);
		$result=M('branch')->where($id)->save($data);
		$this->ajaxReturn($result,'json');
	}
	

	public function add(){
		$map=I('post.');
		$result=M('branch')->add($map);
		$this->ajaxReturn($result,'json');
	}
	
	
	public function del(){
		$id=I('id');
		$result=M('branch')->delete($id);
		$this->ajaxReturn($result,'json');
	}
	
}