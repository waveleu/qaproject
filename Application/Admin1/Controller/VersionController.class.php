<?php
namespace Admin\Controller;
use Think\Controller;
class VersionController extends Controller {
    public function index(){
        $data=M('version')->select();
        $this->assign('data',$data);
        $this->display('Public/Version_index');
    }
    public function save(){
        $data=I('post.');
        foreach ($data as $k=>$v){
            if($v==null||$v=='')
                unset($data[$k]);
        }
        if(isset($data['id'])){
            $id=$data['id'];
            unset($data['id']);
            $result=M('version')->where(array('id'=>$id))->save($data);
        }else 
            $result=M('version')->add($data);
        $this->ajaxReturn($result);
    }
    public function del() {
        $id['id']=I('id');
        $result=M('version')->where($id)->delete();
    }
}