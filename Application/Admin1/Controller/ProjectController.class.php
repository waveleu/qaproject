<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台权限管理
 */
class ProjectController extends AuthController{
	public function _empty($action='index')
	{
	    $order='id';
	    if(I('sort')!=null)
	        $order=I('sort');
		$project_list=M('project')->where('id>0')->order($order)->select();
		$branch_list=M('branch')->where('id>0')->getField('Name',true);
		$version_list=M('version')->where('id>0')->getField('name',true);
		$data=array(
			'project_list'=>$project_list,
			'branch_list'=>$branch_list,
		    'version_list'=>$version_list
		);
		$this->assign($data);
		$this->display('Public/project_index');
	}
	
	public function edit(){
		$data=I('post.');
		$id['id']=$data['id'];
		unset($data['id']);
		foreach ($data as $k=>$v){
		    if($v==null||$v=='')
		        unset($data[$k]);
		}
		$result=M('project')->where($id)->save($data);
		$this->ajaxReturn($result,'json');
	}
		
	public function add(){
		$map=I('post.');
		$result=M('project')->add($map);
		$this->ajaxReturn($result,'json');
	}
	
	
	public function del(){
		$id=I('id');
		$result=M('project')->where(array('id'=>$id))->delete();
		$this->ajaxReturn($result,'json');
	}
	
	public function branch_index(){
		$data=M('branch')->where('id>0')->select();
		$this->assign('data',$data);
		$this->display('Public/branch_index');
	}
	public function bedit(){
		$data=I('post.');
		$id['id']=$data['id'];
		unset($data['id']);
		$result=M('branch')->where($id)->save($data);
		$this->ajaxReturn($result,'json');
	}
	
	
	public function badd(){
		$map=I('post.');
		$result=M('branch')->add($map);
		$this->ajaxReturn($result,'json');
	}
	
	
	public function bdel(){
		$id=I('id');
		$result=M('branch')->delete($id);
		$this->ajaxReturn($result,'json');
	}
	
}