<?php
namespace Common\Model;
use Common\Model\BaseModel;
/**
 * task_case相关
 */
class BoardListModel extends BaseModel{
    public function getData($filter="id>0") {
        $data=$this->where($filter)->select();
        foreach ($data as $k=>$v){
            $id=$data[$k]['board_id'];           
            //$data[$k][info]=M('board')->where(array('id'=>$id))->find();
            $data[$k][info]=M('platform')->where(array('id'=>$id))->find();
        }
        $map['data']=$data;
        $board=M('board')->where('id>0')->select();
        foreach ($board as $k=>$v){
            $map['board_info'][$v['id']]=$v['Name'].'/'.$v['2D_Core'].'/'.$v['3D_Core'].'/'.$v['Customer'];
        }
        $platform=M('platform')->where('id>0')->select();
        foreach ($platform as $k=>$v){
            $map['platform_info'][$v['id']]=$v['name'];
        }
        $map['owner_list']=$this->table('go_auth_group_access as ga,go_users as user')->field('user.username')->where("user.id=ga.uid AND ga.group_id=20")->select();           
        $map['bsp_list']=M('bsp')->where('id>0')->getField('Name',true);
        $map['os_list']=M('os')->getField('OS',true); 
        $map['platform_list']=M('platform')->where('id>0')->order($order)->select();
        return $map;
    }
}