<?php
namespace Admin\Controller;
use Think\Controller;
class FromAndResultController extends Controller {
    public function result_index(){
        $data=M('result_type')->select();
        $this->assign('data',$data);
        $this->display('Public/result_type_index');
    }
    public function result_add() {
        $data=I('post.');
        $result=M('result_type')->add($data);
    }
    public function result_del() {
        $data=I('post.');
        $result=M('result_type')->where($data)->delete();
    }
    public function from_index(){
        $data=M('from')->select();
        $this->assign('data',$data);
        $this->display('Public/from_index');
    }
    public function from_add() {
        $data=I('post.');
        $from=M('from')->add($data);
    }
    public function from_del() {
        $data=I('post.');
        $from=M('from')->where($data)->delete();
    }
}