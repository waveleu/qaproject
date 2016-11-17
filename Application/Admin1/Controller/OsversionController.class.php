<?php
namespace Admin\Controller;
use Think\Controller;

class OsversionController extends AuthController {

	public function _empty($action='index')
	{
		$data_os=M('os')->where('id>0')->select();
		$data_OSVersion=array();
		foreach ($data_os as $k=>$v){
			$data_OSVersion[$k]['id']=$v['id'];
			$data_OSVersion[$k]['OS']=$v['OS'];
			$data_OSVersion[$k]['version_list']=$data_os=M('os_version')->where(array('OS'=>$v['OS']))->getField('Version',true);
			$data_OSVersion[$k]['Version']=implode(', ', $data_OSVersion[$k]['version_list']);
		}
		$data=array(
			'os'=>$data_os,
			'OS_Version'=>$data_OSVersion	
		);
		$this->assign($data);
		$this->display("Public/osversion_index");		
	}
	public function  edit(){
		$new_os=I('newos','');
		if($new_os!=null&&$new_os!=""){
			$OS=I('OS');
			$result=M('os_version')->where(array('OS'=>$OS))->save(array('OS'=>$new_os));
			$result=M('os')->where(array('OS'=>$OS))->save(array('OS'=>$new_os));
			
		}elseif(I('add')==true){
			//$result=I('OS').' : '.I('Version');
			$result=M('os_version')->add(array('OS'=>I('OS'),'Version'=>I('Version')));
		}else{
			$OS=I('OS');
			$version_list=explode(',', I('Version'));
			foreach ($version_list as $k=>$v){
				$result=M('os_version')->where(array('OS'=>$OS,'Version'=>$v))->delete();
			}	
		}
		$this->ajaxReturn($result,'json');
	}
	public function del(){
		$map=I('post.');
		$result=M('os_version')->where($map)->delete();
		$result=M('os')->where($map)->delete();
		$this->ajaxReturn($result,'json');
	}
	public function add(){
		$map=I('post.');
		if(!M('os_version')->where($map)->select())
		      $result=M('os_version')->add($map);
		if(!M('os')->where(array('OS'=>$map['OS']))->select())
		      $result=M('os')->add(array('OS'=>$map['OS']));
		$this->ajaxReturn($result,'json');
	}
}