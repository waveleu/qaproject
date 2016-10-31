<?php
namespace Admin\Controller;
use Think\Controller;
class BoardController extends AuthController {
	public function _empty($action='index')
	{
		$data=M('board')->where('id>0')->select();
		$customer_list=M('customer')->where('id>0')->getField('Name',true);
		$data=array(
				'data'=>$data,
				'customer_list'=>$customer_list
		);
		$this->assign($data);
		$this->display("Public/board_index");
	}
	public function edit(){
		$map=I('post.');
		$id=$map['id'];
		//unset($map['id']);
		//$result=M('board')->where(array('id'=>$id))->save($map);
		if($map['Type']=="Chip"){$map['Bitfile']="null";$map['CMpdel_Location-Build']="null";$map['CModel_Location-P4']="null";}
		if($map['Type']=="FPGA"){$map['2D_Core']="null";$map['3D_Core']="null";$map['2D_VG_Core']="null";$map['CMpdel_Location-Build']="null";$map['CModel_Location-P4']="null";}
		if($map['Type']=="CModel"){$map['2D_Core']="null";$map['3D_Core']="null";$map['2D_VG_Core']="null";$map['Bitfile']="null";}
		$result=M('board')->where("id=$id")->save($map);
		$this->ajaxReturn($result,'json');
	}
	public function add(){
		$map=I('post.');
		if($map['Type']=="Chip"){$map['Bitfile']="null";$map['CMpdel_Location-Build']="null";$map['CModel_Location-P4']="null";}
		if($map['Type']=="FPGA"){$map['2D_Core']="null";$map['3D_Core']="null";$map['2D_VG_Core']="null";$map['CMpdel_Location-Build']="null";$map['CModel_Location-P4']="null";}
		if($map['Type']=="CModel"){$map['2D_Core']="null";$map['3D_Core']="null";$map['2D_VG_Core']="null";$map['Bitfile']="null";}
		 if($map['Name']!=null&&$map['Name']!=""){
			$result=M('board')->add($map);
		}
		else{
			$result='null name';
		} 
		$this->ajaxReturn($result,'json');
	}
	public function del(){
		$id=I('id');
		$result=M('board')->where("id=$id")->delete();
		$this->ajaxReturn($result,'json');
	}
}
