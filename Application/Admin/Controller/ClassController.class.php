<?php
namespace Admin\Controller;
use Think\Controller;
class ClassController extends AuthController {
	var $aa;
	public function drop_edit(){
		$sNodes=I('id');
		$pNode=I('pid');
		if($pNode['isParent']!='true'){
			$result=false;
		}else{
			foreach ($sNodes as $k=>$v){
				if($v['isParent']=='true'){
					M('class')->where(array('id'=>$v['id']))->save(array('pid'=>$pNode['id']));
				}else{
					M('testcase')->where(array('id'=>floor($v['id']/10000000)))->save(array('pid'=>$pNode['id']));
					$result="".floor($v['id']/10000000).":".$pNode['id'];
				}
			}//$result=true;			
		}
		$this->ajaxReturn($result);
	}
	public function edit(){
		$map=I('post.');
		$id=$map['id'];
		unset($map['id']);
		$result=M('class')->where(array('id'=>$id))->save($map);
		$this->ajaxReturn($result,'json');
	}
	public function add(){
		$map=I('post.');
		 if($map['pid']!=null&&$map['pid']!=""){
			$result=M('class')->add($map);
		}
		else{
			$result='null name';
		} 
		$this->ajaxReturn($result,'json');
	}
	public function del(){
		$data=I('nodes');
		$class_id= I('class_id');
		M('class')->where("id in "."(".$class_id.")")->delete();
		//foreach ($class_id as $k=>$v)
		      //M('class')->delete($v);
		//$case_id=explode(",", I('case_id'));
		$case_id=I('case_id');
		//foreach ($case_id as $k=>$v)
		  //  M('testcase')->where('id = $v')->delete();
		M('testcase')->where("id in "."(".$case_id.")")->delete();
		$this->ajaxReturn($class_id);
	}
	public function format_index(){
	    $data=M('class')->select();
	    foreach($data as $k=>$v){
	        $tmp=$v['name'];
	        $pid=$v['pid'];
	        while($pid!=0){
	            $pclass=M('class')->where(array('id'=>$pid))->find();
	            $tmp=$pclass['name'].'-'.$tmp;
	            $pid=$pclass['pid'];
	        }
	        $data[$k]['path']=$tmp;
	    }
	    $this->assign('data',$data);
	    $this->display('Public/format_index');
	}
	
}
