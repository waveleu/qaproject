<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<HTML>
<HEAD>
    <TITLE> Case</TITLE>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
    <link rel="stylesheet" href="/qaweb/Public/assets/css/case_index-table.css">
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
        div#rMenu {position:absolute; visibility:hidden; top:0;text-align: left;padding: 2px;}
        div#rMenu ul li{
            margin: 1px 0;
            padding: 0 5px;
            cursor: pointer;
            list-style: none outside none;
            background-color: #DFDFDF;
        }
        .am-modal-bd{
            width:90%;
            margin:0 auto;
        }
        .am-modal-bd label{
            width:20%;
            display:inline-block;
            text-align:right;
        }
        .am-modal-bd input{
            width:60%;
        }
    </style>
    <script type="text/javascript">
        var setting = {
            view: {
                dblClickExpand: false,
                showTitle:true
            },
            check: {
                enable: true,
                checkboxType:{ "Y" : "s", "N" : "ps" }
            },
            data: {
                simpleData: {
                    enable: true
                }
            },

            callback: {
                onClick:onClick,
                onRightClick: OnRightClick,
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
        $.each(<?php echo ($tree_data); ?>,function (k,v) {
            var temp={id:v.id+1000-1000,pId:v.pid,name:""+v.CaseName,open:false,isParent:false};
            zNodes.push(temp);
        });

        function OnRightClick(event, treeId, treeNode) {

            if (!treeNode && event.target.tagName.toLowerCase() != "button" && $(event.target).parents("a").length == 0) {
                    zTree.cancelSelectedNode();
                    showRMenu("root", event.clientX, event.clientY);
                } else if (treeNode && !treeNode.noR) {
                    zTree.selectNode(treeNode);
                    showRMenu("node", event.clientX, event.clientY);
                }


        }
        function showRMenu(type, x, y) {
            $("#rMenu ul").show();
            if (type=="root") {
                $("#m_del").hide();
                $("#m_check").hide();
                $("#m_unCheck").hide();
            } else {
                $("#m_del").show();
                $("#m_check").show();
                $("#m_unCheck").show();
            }
            rMenu.css({"top":y+"px", "left":x+"px", "visibility":"visible"});

            $("body").bind("mousedown", onBodyMouseDown);
        }
        function hideRMenu() {
            if (rMenu) rMenu.css({"visibility": "hidden"});
            $("body").unbind("mousedown", onBodyMouseDown);
        }
        function onBodyMouseDown(event){
            if (!(event.target.id == "rMenu" || $(event.target).parents("#rMenu").length>0)) {
                rMenu.css({"visibility" : "hidden"});
            }
        }
        function onClick(event, treeId, treeNode) {
            if(treeNode.checked==false)
                zTree.checkNode(treeNode,true,true);
            else
                zTree.checkNode(treeNode,false,true);
        }
        var zTree, rMenu;
        $(document).ready(function(){
            $.fn.zTree.init($("#treeDemo"), setting, zNodes);
            zTree = $.fn.zTree.getZTreeObj("treeDemo");
            rMenu = $("#rMenu");
        });
        function reassign(){
            var tid=$("#search_tid").val();
            if(tid==""||tid==null){
                alert("There is no explicit task!");
            }else{
                var nodes=zTree.getCheckedNodes();
                var arr=new Array();
                $.each(nodes,function (k,v) {
                    if(v.id>10000)
                        arr.push(v.id/10000);
                });
                var cids=arr.join(',');
                $.post("<?php echo U('Admin/Task/case_reassign');?>",{cids:cids,tid:tid},function (data) {
                    $.post("<?php echo U('Admin/Task/case_index');?>",{ajax:true,tid:tid},function (data) {
                        $("#edit_page").empty().html(data);
                        tree_fresh();
                    });
                })
            }
        }
        var taskcase_info =eval('<?php echo json_encode($list);?>');
    </script>

</HEAD>
<body>
<div class="am-cf admin-main am-padding-top-0">
    <!-- content start -->
    <div class="admin-content" id="content">
        <div class="am-cf am-padding am-padding-bottom-0" id="content-body">
            <div class="am-g">
                <div class="am-fl am-cf" id="html_title"><strong class="am-text-primary am-text-lg">Task</strong> / <?php echo ($task_info[name]); ?></div><br/>
            </div>
        </div>
        <br/>
        <!--Task case--->
        <div class="am-g" style="padding-left:10px;">
           <div class="container" id="edit_page">
              <div class="am-g">
                <div class="am-u-md-12">   
                         <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-title"><a href="javascript:reorder('name');">TaskName</a></th>
                                <th class="table-title"><a href="javascript:reorder('pid');">Project</a></th>
                                <th class="table-title"><a href="javascript:reorder('suit');">Board</a></th>
                                <th class="table-title"><a href="javascript:reorder('platform');">Progress</a></th>
                                <th class="table-title"><a href="javascript:reorder('owner');">Pass</a></th>
                                <th class="table-title"><a href="javascript:reorder('start_time desc');">Fail</a></th>
                                <th class="table-title"><a href="javascript:reorder('end_time desc');">N/A</a></th>
                                <th class="table-title"><a href="javascript:reorder('end_time desc');">Timeout</a></th>
                                <th class="table-title"><a href="javascript:reorder('end_time desc');">Not Run</a></th>
                                <th class="table-title"><a href="javascript:reorder('end_time desc');">Total</a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): foreach($list as $key=>$v): if($key==0): ?><tr>
                                <td><?php echo ($v[taskname]); ?></td>
                                <td><?php echo ($v[project_name]); ?></td>
                                <td><?php echo ($v[board_name]); ?></td>
                                <td><?php echo ($v['progress']); ?></td>
                                <td><?php echo ($v['pass']); ?></td>
                                <td><?php echo ($v['fail']); ?></td>
                                <td><?php echo ($v['NA']); ?></td> 
                                <td><?php echo ($v['timeout']); ?></td>
                                <td><?php echo ($v['Notrun']); ?></td>
                                <td><?php echo ($v['total']); ?></td>
                            </tr><?php endif; endforeach; endif; ?>
                            </tbody>
                        </table>
                       
                        <div class="am-u-md-12" id="edit_table">
                            <div class="am-tabs am-margin" data-am-tabs>
                                <ul class="am-tabs-nav am-nav am-nav-tabs">
                                    <?php if(is_array($cname_list)): $i = 0; $__LIST__ = $cname_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="<?php echo '#'.$v; ?>"><?php echo ($v); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                                <?php if(is_array($data)): foreach($data as $class_name=>$v_list): ?><div class="am-tabs-bd">
                                    <div class="am-tab-panel am-fade am-in am-active" id="<?php echo ($class_name); ?>">
                                       <table class="am-table am-table-striped am-table-hover table-main am-table-compact am-table-bordered line">
                                            <thead>
                                            <tr>
                                                <th class="table-title"><a href="javascript:reorder('casename');">CaseName</a></th>
                                                <th class="table-title"><a href="javascript:reorder('result');">Result</a></th>
                                                <th class="table-title"><a href="javascript:reorder('BugID');">BugID</a></th>
                                                <th class="table-title"><a href="javascript:reorder('driver');">Driver</a></th>
                                                <th class="table-title"><a href="#">Status</a></th>
                                                <th class="table-title"><a href="javascript:reorder('comments');">Comments</a></th>
                                                <th class="table-title"><a href="#">item_name</a></th>
                                                <th class="table-title"><a href="#">item_unit</a></th>
                                                <th class="table-author am-hide-sm-only"></span>Operation</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(is_array($v_list)): foreach($v_list as $k=>$v): if(is_array($case)): foreach($case as $key=>$vc): if($v[id]==$vc[group]): ?><tr ov_id=<?php echo ($k); ?>>
                                                <td title=<?php echo ($v[info]); ?>><?php echo ($v[casename]); ?></td>
                                                <?php
 echo "<td>".$v['result']."</td>"; ?>
                                                <td><?php echo ($v[BugID]); ?></td>
                                                <td><?php echo ($v[driver]); ?></td>
                                                <td><?php echo ($v[Status]); ?></td>
                                                <td><?php echo ($v[comments]); ?></td>
                                                <td><a href="javascript:toCaseItem('<?php echo ($v[id]); ?>');"><?php echo ($vc[name]); ?></a></td>
                                                <td><a href="javascript:toCaseItem('<?php echo ($v[id]); ?>');"><?php echo ($vc[item]); ?></a></td>
                                                <td>
                                                    <div class="am-btn-toolbar">
                                                        <div class="am-btn-group am-btn-group-xs">
                                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary" task_id=<?php echo ($v[id]); ?>   onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" task_id=<?php echo ($v[id]); ?> onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr><?php endif; endforeach; endif; endforeach; endif; ?>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                </div><?php endforeach; endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




<div class="am-modal am-modal-confirm" id="edit_case_modal" style="top:-20%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Edit TaskCase</div>
        <div class="am-modal-bd">
            <label>Result:</label>
            <div class="am-form-group-inline" style="display:inline;margin-left:5px;">
                <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary',searchBox: 1}" placeholder="Please select..." id="edit_result" style="border:1px solid #9C9898;">
                    <option value=""></option>
                    <?php if(is_array($result_list)): foreach($result_list as $key=>$v): ?><option value=<?php echo ($v); ?>><?php echo ($v); ?></option><?php endforeach; endif; ?>
                </select>
            </div><br/><br/>
            <label>BugID:</label>
            <input type="text" class="am-modal-prompt-input" id="edit_BugID" style="display:inline;border:1px solid #9C9898;"><br/><br/>
            <label>Driver:</label>
            <input type="text" class="am-modal-prompt-input" id="edit_driver" style="display:inline;border:1px solid #9C9898;"><br/><br/>
            <label>Status:</label>
            <input type="text" class="am-modal-prompt-input" id="edit_driver" style="display:inline;border:1px solid #9C9898;"><br/><br/>
            <label>Comments:</label>
            <input type="text" class="am-modal-prompt-input"  id="edit_comments" style="display:inline;border:1px solid #9C9898;"><br/><br/>
            <label>Item:</label>
            <input type="text" class="am-modal-prompt-input"  id="edit_item" style="display:inline;border:1px solid #9C9898;"><br/><br/>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
        </div>
</div>
<!-- content end -->

<script >
    window.onload=function () {
        tree_fresh();
        var arr=window.location.href.split("/");
        $("#search_tid").find("option[value="+arr[arr.indexOf("tid")+1]+"]").attr('selected', true);
        var result_id=arr.indexOf("result");
        if(result_id!=-1)
            $("#search_result").find("option[value="+arr[result_id+1]+"]").attr('selected', true);

        $("#search_result").attr("onchange","task_show(this)");
    }

    function del(obj) {
        var id=$(obj).attr('task_id');
        if(confirm('Do you want delete this TaskCase ?')){
            $.post("<?php echo U('Admin/Task/case_del');?>",{id:id},function () {
                location.reload();
            });
        }
    }

    //编辑相应taskcase
    function edit(obj) {
        var id=$(obj).attr('task_id');

        $("#edit_case_modal").modal({
            relatedTarget:this,
            onConfirm:function(e){
                var arr={id:id,driver:e.data['1'],BugID:e.data['0'],Status:e.data['2'],comments:e.data['3'],item:e.data['4'],result:$("#edit_result").val()};
                $.post("<?php echo U('Admin/Task/case_edit');?>",arr,function (data) {
                    location.reload();
                    //task_show($("#search_tid"));
                });
            },
            onCancel:function (e) {
                e.close()
            }
        });
    }

    //task下拉菜单 切换查看task
    function task_show(obj) {
        var tid=$("#search_tid").val();
        var result=$("#search_result").val();
        if(tid!=null&&tid!="") {
            location.href=("<?php echo U('Admin/Task/case_index',array('tid'=>vid,'result'=>'nowresult'));?>").replace('vid',tid).replace('nowresult',result);
            if(result==0){
                location.href=("<?php echo U('Admin/Task/case_index',array('tid'=>vid));?>").replace('vid',tid);
            }
        }
        else
            location.reload();
    }

    //search按钮
    function search() {
    	var search_type=$("#search_type").val();
    	var search_tid=$("#search_tid").val();
    	var search_name=$("#search_name").val();
    	//var arr=("{ajax:true,tid:search_tid,BugID:search_name}").replace("BugID",search_type).replace("search_tid",search_tid).replace("search_name",search_name);
    	if(search_type=='BugID')
        	var arr={ajax:true,tid:$("#search_tid").val(),BugID:$("#search_name").val()};
    	else if(search_type=='result')
            var arr={ajax:true,tid:$("#search_tid").val(),result:$("#search_name").val()};
    	else if(search_type=='Status')
            var arr={ajax:true,tid:$("#search_tid").val(),Status:$("#search_name").val()};
    	else if(search_type=='CaseName')
            var arr={ajax:true,tid:$("#search_tid").val(),CaseName:$("#search_name").val()};
    	else var arr={ajax:true,tid:$("#search_tid").val(),driver:$("#search_name").val()};
         $.post("<?php echo U('Admin/Task/case_index');?>",arr,function (data) {
            page_fresh(data);
        });
    }

    function cancel() {
        zTree.checkAllNodes(false);
        $.each(taskcase_info,function (k,v) {
            var node=zTree.getNodesByParam('id',v['cid']+"0000");
            zTree.checkNode(node['0'],true,true);
        });
    }

    function reorder(name) {
        var arr={ajax:true,tid:$("#search_tid").val(),BugID:$("#search_name").val(),sort:name};
        $.post("<?php echo U('Admin/Task/case_index');?>",arr,function (data) {
            //location.reload();
            page_fresh(data);
        });
    }

    //异步刷新页面
    function page_fresh(data) {
        $("#edit_table").empty().html(data);
        //tree_fresh();
    }
    function toCaseItem(id) {
        var str=("<?php echo U('Admin/Task/case_index',array('case_item'=>'true','id'=>taskcase_id));?>").replace('taskcase_id',id);
        location.href=str;
    }
    
    /* $(document).ready(function(){
    	var max_id=$("#edit_table tbody tr:last").attr('ov_id');
    	var rows;
    	console.log(max_id);
    	for(var i=0;i<max_id-0+1;i++){
    		rows=$("#edit_table tbody tr[ov_id="+i+"]").length;
    		console.log(rows);
    		$("#edit_table tbody tr[ov_id="+i+"]").each(function(index,element){
   				if(index==0){
   				$(this).find('td:lt(6)').attr("rowspan",rows);
   				}else if(index>0){$(this).find('td:lt(6)').remove();}
   			});
    	}
 	 }); */
</script>

<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>


</body>
</HTML>