<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE> ZTREE DEMO - awesome 风格</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Include font-awesome here, CDN is ok, or locally installed by bower to your project -->

    <link rel="stylesheet" href="/qaweb/Public/ztree/css/demo.css" type="text/css">
    <link rel="stylesheet" href="/qaweb/Public/ztree/css/awesomeStyle/awesome.css" type="text/css">
    <script type="text/javascript" src="/qaweb/Public/assets/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.core.js"></script>
    <script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.excheck.js"></script>
    <script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.exedit.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/qaweb/Public/assets/i/app-icon72x72@2x.png">
    <link rel="stylesheet" href="/qaweb/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/qaweb/Public/assets/css/admin.css">
    <style>
    .am-form-group{
        display: block;
        margin: 5px auto 0 auto;
        border-radius: 0;
        padding: 5px;
        line-height: 1.8rem;
        width: 80%;
        border: 1px solid #dedede;
        -webkit-appearance: none;
        -moz-appearance: none;
        -ms-appearance: none;
        appearance: none;
    }
    </style>
    <SCRIPT type="text/javascript">

        var setting = {
            view: {
                dblClickExpand: false
            },
            check: {
             enable: true,
             chkboxType:{ "Y" : "s", "N" : "ps" }
             },
            data: {
                simpleData: {
                    enable: true
                }
            },

            callback: {
                onClick:onClick,
            }
        };

        var zNodes =[{id:0,pId:0,name:'root',open:true,isParent:true}];
        $.each(<?php echo ($class); ?>,function (k,v) {
            if(v.id<10)
                var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:true,isParent:true};
            else
                var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:false,isParent:true};
            zNodes.push(temp);
        })
        $.each(<?php echo ($data); ?>,function (k,v) {
            var temp={id:v.id+1000-1000,pId:v.pid,name:""+v.CaseName,open:false,isParent:false};
            zNodes.push(temp);
        })

        function onClick(event, treeId, treeNode) {
            zTree.checkNode(treeNode,true);
        }
        var zTree, rMenu;
        $(document).ready(function(){
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            zTree = $.fn.zTree.getZTreeObj("treeDemo");
            rMenu = $("#rMenu");
        });

    </SCRIPT>
    <style type="text/css">
        div#rMenu {position:absolute; visibility:hidden; top:0;text-align: left;padding: 2px;}
        div#rMenu ul li{
            margin: 1px 0;
            padding: 0 5px;
            cursor: pointer;
            list-style: none outside none;
            background-color: #DFDFDF;
        }
    </style>
</HEAD>
<BODY>
<div class="am-cf admin-main am-padding-top-0">
    <!-- content start -->
<div class="admin-content">
    <div class="am-cf am-padding am-padding-bottom-0" id="content-body">
        <div class="am-g">
            <div class="am-fl am-cf" id="html_title"><strong class="am-text-primary am-text-lg"> Task List </strong></div><br/>
        </div>

    </div>
    <div class="am-g">
        <div class="container" id="edit_page">
            <div class="am-g">
                <div class="am-u-md-12">
                    <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-title"><a href="javascript:reorder('name');">Name</a></th>
                            <th class="table-title"><a href="javascript:reorder('pid');">Project</a></th>
                            <th class="table-title"><a href="javascript:reorder('suit');">Suit</a></th>
                            <th class="table-title"><a href="javascript:reorder('platform');">Board</a></th>
                            <th class="table-title"><a href="javascript:reorder('owner');">Owner</a></th>
                            <th class="table-title"><a href="javascript:reorder('start_time desc');">Start Date</a></th>
                            <th class="table-title"><a href="javascript:reorder('end_time desc');">End Date</a></th>
                            <th class="table-title">Progress</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                            <td><a href="javascript:toTaskCase('<?php echo ($v[id]); ?>','<?php echo ($v[pid]); ?>');"><?php echo ($v[name]); ?></a></td>
                            <td><?php echo ($v[project_name]); ?></td>
                            <td><?php echo ($v[suit]); ?></td>
                            <td><?php echo ($v[platform_name]); ?></td>
                            <td><?php echo ($v[owner]); ?></td>
                            <td><?php echo ($v[start_time]); ?></td>
                            <td><?php echo ($v[end_time]); ?></td>
                            <td><?php echo ($v[progress]); ?></td>
                           <!-- <td>
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button class="am-btn am-btn-default am-btn-xs am-text-secondary" task_id=<?php echo ($v[id]); ?> onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                        <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" task_id=<?php echo ($v[id]); ?> onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                    </div>
                                </div>
                            </td>-->
                        </tr>
                        <div class="am-modal am-modal-confirm" id=<?php echo ($v[id]); ?> >
                            <div class="am-modal-dialog">
                                <div class="am-modal-hd">New Task</div>
                                <div class="am-modal-bd">
                                    Name<input type="text" class="am-modal-prompt-input" id="add_name">
                                    Test Run
                                    <div class="am-form-group-inline  am-cf" >
                                        <select data-am-selected="{searchBox: 1}"  class="am-u-md-3" placeholder="Please select..."  id="add_pid">
                                            <option value=""></option>
                                            <?php if(is_array($run_list)): foreach($run_list as $k=>$vc): ?><option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    Platform
                                    <div class="am-form-group-inline  am-cf" >
                                        <select data-am-selected="{searchBox: 1,btnWidth:'60%'}"  class="am-u-sm-offset-3" placeholder="Board/BSP/OS_Version"  id="add_platform">
                                            <option value=""></option>
                                            <?php if(is_array($platform_list)): foreach($platform_list as $key=>$vc): ?><option value=<?php echo ($vc['id']); ?>><?php echo ($vc[Board]); ?>/<?php echo ($vc[BSP]); ?>/<?php echo ($vc[OS]); echo ($vc[Version]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    Suit
                                    <div class="am-form-group-inline  am-cf" >
                                        <select data-am-selected="{searchBox: 1,btnWidth:'60%'}"  class="am-u-sm-offset-3" placeholder="Please choose..." id="add_suit" >
                                            <option value=""></option>
                                            <?php if(is_array($suit_list)): foreach($suit_list as $key=>$vc): ?><option value="<?php echo ($vc); ?>"><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    Owner
                                    <div class="am-form-group-inline  am-cf" >
                                        <select data-am-selected="{searchBox: 1}"  class="am-u-md-3" placeholder="Please select..." id="add_owner" >
                                            <option value=""></option>
                                            <?php if(is_array($user_list)): foreach($user_list as $k=>$vc): ?><option value="<?php echo ($vc[username]); ?>"><?php echo ($vc[username]); ?></option><?php endforeach; endif; ?>
                                        </select>
                                    </div>
                                    start_time<input type="text" class="am-modal-prompt-input" data-am-datepicker id="add_start_time">
                                    end_time<input type="text" class="am-modal-prompt-input" data-am-datepicker id="add_end_time">
                                </div>

                                <div class="am-modal-footer">
                                    <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
                                    <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
                                </div>
                            </div>
                        </div>
                        <?php $tmp_list=json_encode($v);?>
                        <script language="JavaScript">
                            var tmp=<?php echo ($tmp_list); ?>;
                            $.each(tmp,function (k,v) {
                                $("#"+tmp.id+" #add_"+k).val(v);
                            })
                        </script><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                    <?php echo ($page); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content end -->


<script>
    function del(obj) {
        var id=$(obj).attr('task_id');
        if(confirm('Do you want delete this Task')){
            $.post("<?php echo U('Admin/Task/del');?>",{id:id},function (data) {
                window.location.reload();
            });
        }
    }

    function edit(obj) {
        var id=$(obj).attr('task_id');
        var str="#"+id+" #add_";
        $("#"+id).modal({
            relatedTarget:this,
            onConfirm:function(e){
                var arr={id:id,name:e.data['0'],start_time:e.data['1'],end_time:e.data['2'],platform:$(str+"platform").val(),owner:$(str+"owner").val()};
                $.post("<?php echo U('Admin/Task/add');?>",arr,function (data) {
                    window.location.reload();
                });
            },
            onCancel:function (e) {
                $("#add_suit").show();
                e.close()
            }
        });


    }

    function search() {
        $.post("<?php echo U('Admin/Task/Index');?>",{ajax:true,pid:$("#search_pid").val(),name:$("#search_name").val()},function (data) {
            $("#edit_page").empty().html(data);
        });
    }
    function toTaskCase(tid,pid) {
        var str=("<?php echo U('Admin/Task/case_index',array('pid'=>ppid,'tid'=>ttid));?>").replace('ppid',pid).replace('ttid',tid);
        location.href=str;
    }
    function reorder(name) {
        location.href=("<?php echo U(Admin/Task/mytask,array('sort'=>sort_rule));?>").replace('sort_rule',name);
    }

</script>

<div class="am-modal am-modal-confirm" tabindex="edit_add_class" id="edit_add_class">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Class Add/Edit</div>
        <div class="am-modal-bd">
            Input Classfication Name<input type="text" class="am-modal-prompt-input" >
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
        </div>
    </div>
</div>
<div class="am-modal am-modal-confirm" tabindex="del_class" id="del_class">
    <div class="am-modal-dialog">
        <div class="am-modal-bd">
            是否删除该分类及子Case
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
        </div>
    </div>
</div>
<div class="am-modal am-modal-confirm" tabindex="del_class" id="del_modal">
    <div class="am-modal-dialog">

        <div class="am-modal-bd">
            是否删除该Case
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
        </div>
    </div>
</div>


<div id="rMenu">
    <ul>
        <li id="m_add" onclick="add_class();">Add subfolder</li>
        <li id="m_del" onclick="del_class();">Delete folder</li>
        <li id="m_check" onclick="edit_class();">Edit folder</li>
        <li id="m_unCheck" onclick="add_case();">Add Case</li>
    </ul>
</div>

<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>

</BODY>
</HTML>