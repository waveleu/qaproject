<?php
namespace Admin\Controller;
use Think\Controller;

class TestcaseController extends AuthController {

	public function index()
	{
		$map=$this->getTree();
		$this->assign($map);
		$this->display();
	}
	public function tree()
	{
		$map=$this->getTree();
		$this->assign($map);
		$this->display();
	}

    //添加类别
    public function add()
    {
        $customer_list=M('customer')->select();
        $project_list=M('project')->select();
        $board_list=M('board')->select();
        $os_list=M('os')->select();
        $from_list=M('from')->select();
        $edata['pid']=I('pid');
        $map=array(
            'edata'=>$edata,
            'customer_list'=>$customer_list,
            'project_list'=>$project_list,
            'board_list'=>$board_list,
            'os_list'=>$os_list,
            'from_list'=>$from_list
        );
        $this->assign($map);
	    $this->display('edit'); 
    	
    }

    //编辑类别
    public function edit()
    {
        
    	$id['id']=I('id');
    	$data=M('testcase')->where($id)->find();
    	if(I('flag')!=true)
    	   $this->ajaxReturn($data);
    	else{
	       $customer_list=M('customer')->select();
	       $project_list=M('project')->select();
	       $board_list=M('board')->select();
	       $os_list=M('os')->select();
	       $from_list=M('from')->where('id>0')->getField('name',true);
    	   $data['Project']=explode(',',$data['Project'] );
    	   $data['Board']=explode(',',$data['Board'] );
    	   $data['OS']=explode(',',$data['OS'] );
    	   $map=array(
    	         'data'=>$data,
    	         'customer_list'=>$customer_list,
    	         'project_list'=>$project_list,
    	         'board_list'=>$board_list,
    	         'os_list'=>$os_list,
    	         'from_list'=>$from_list
    	     );
    	     
    	     $this->assign($map);
    	     $this->display();  
    	}    	
    }

    //保存数据
    public function save()
    {
    	$map=I('post.');
    	$map['Project']=implode(',', $map['Project']);
    	$map['Board']=implode(',', $map['Board']);
    	$map['OS']=implode(',', $map['OS']);
    	foreach ($map as $k=>$v){
    	    if($v==null)
    	        unset($map[$k]);
    	    else if($v['From']!='Customer Case'&&$v['From']!='Customer Issue')
    	        $v['Customer']=null;
    	}
    	  if($map['id']!=null&&$map['id']!=""){
    		$result=M('testcase')->where(array('id'=>$map['id']))->save($map);
    	}else {
    		$result=M('testcase')->add($map); 
    	}	  
	}

    public function del()
    {
        $id=I('id');
        $result = M('testcase')->where(array('id'=>$id))->delete();
       	$this->ajaxReturn($result,'json');
    }

	public function getCount($id=''){
		$count=0;
		$count+=M('testcase')->where(array('pid'=>$id))->count();
		$sub_dir=M('class')->where(array('pid'=>$id))->getField('id',true);
		if(count($sub_dir)){
			foreach ($sub_dir as $k=>$v){
				$count+=$this->getCount($v);
			}
		}
		return $count;
	}
	public function getTree(){
		$class=M('class')->select();
		$customer_list=M('customer')->select();
		$project_list=M('project')->select();
		$board_list=M('board')->select();
		$os_list=M('os')->select();
		foreach($class as $k=>$v){
			$class[$k]['count']=$this->getCount($v['id']);
		}
		$data=M('testcase')->select();
		$map=array(
				'class'=>json_encode($class),
				'data'=>json_encode($data),
				'customer_list'=>$customer_list,
				'os_list'=>$os_list,
				'board_list'=>$board_list,
				'project_list'=>$project_list
		);
		return $map;
	}
	

}
	
