<?php
namespace Admin\Controller;
use Think\Controller;
class PlatformController extends AuthController {
	public function _empty($action='index')
	{
		$data=M('platform')->where('id>0')->select();
		$board_list=M('board')->where('id>0')->getField('id,Type,Name',',',true);
		$bsp_list=M('bsp')->where('id>0')->getField('Name',true);
		$os_list=M('os')->where('id>0')->getField('OS',true);
		$osversion_list=M('os_version')->select();
		foreach ($data as $k=>$v){
			$data[$k]['ov_list']=M('os_version')->where(array('OS'=>$v['OS']))->getField('Version',true);
		}
		$data=array(
				'data'=>$data,
				'os_list'=>$os_list,
				'board_list'=>$board_list,
				'osversion_list'=>$osversion_list,
				'bsp_list'=>$bsp_list
				
		);
		$this->assign($data);
		$this->display("Public/platform_index");
	}
	
	//二级联动辅助
	public function check_version(){
		$map['OS']=I('OS');
		$result=M('os_version')->where($map)->select();
		$this->ajaxReturn($result,'json');
	}
	
	public function edit(){
		$map=I('post.');
		$id=$map['id'];
		unset($map['id']);
		$result=M('platform')->where(array('id'=>$id))->save($map);
		$this->ajaxReturn($result,'json');
	}
	public function add(){
		$map=I('post.');
		$result=M('platform')->add($map);
		$this->ajaxReturn($map,'json');
	}
	public function del(){
		$id=I('id');
		$result=M('platform')->where(array('id'=>$id))->delete();
		$this->ajaxReturn($result,'json');
	}
}
