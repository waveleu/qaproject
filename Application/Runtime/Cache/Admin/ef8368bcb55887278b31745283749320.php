<?php if (!defined('THINK_PATH')) exit();?><style>
        /*.am-modal-bd{
            width:100%;
            margin:0 -15px;
            float:left;
          
        }
        .am-modal-bd label{
            width:130px;
            display:inline-block;
            text-align:right;
        }
        .am-modal-bd input{
            width:60%;

        }
        .search{
            width:200px;
            height:37px;
            display:inline;
            border:1px solid #9C9898;
            margin-left:-5px;
        }
</style>

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
            <div class="am-fl am-cf" id="html_title"><strong class="am-text-primary am-text-lg">Task Management</strong> </div><br/>
        </div><br/><br/>
            <div class='am-g am-cf'>
                <div class="am-form-group-inline" style="display:inline;">
                   <select data-am-selected="{btnWidth: '7%',btnStyle: 'secondary',searchBox: 1}"  class="am-u-md-3" placeholder="FPGA">
                        <option value=""></option>
                        <?php if(is_array($run_list)): foreach($run_list as $k=>$vc): ?><option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                    </select>
                    <input type="text" style="width:200px;height:37px;display:inline;border:1px solid #9C9898;margin-left:-5px;">&nbsp;&nbsp;
                    <button type='button' class='am-btn am-btn-default am-btn-xs am-text-secondary am-text-primary'> <span class='am-icon-search'></span> Search</button>
                </div>            
                <div class="am-form-group-inline am-cf am-fr" style="width:400px;display:inline;">
                    Test Run:
                    <select data-am-selected="{btnWidth: '50%', btnStyle: 'secondary',searchBox: 1}"  class="am-u-md-3" placeholder="Please select..."  onchange="project_check(this)" id="search_pid">
                        <option value=""></option>
                        <?php if(is_array($run_list)): foreach($run_list as $k=>$vc): ?><option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                    </select>
                    &nbsp;&nbsp;
                    <button type='button' class='am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger'  onclick='add()'> <span class='am-icon-pencil-square-o'></span>new Task</button>
                </div>
            </div>
        </div><br/>
    <div class="am-g">
        <div class="container" id="edit_page">
                <div class="am-g">
                    <div class="am-u-md-12">
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-title"><a href="javascript:reorder('name');">name</a></th>
                                <th class="table-title"><a href="javascript:reorder('pid');">Project</a></th>
                                <th class="table-title"><a href="javascript:reorder('pid');">Driver</a></th>
                                <th class="table-title"><a href="javascript:reorder('suit');">Suite</a></th>
                                <th class="table-title"><a href="javascript:reorder('board');">Board <div class="am-text-primary"></div></a></th>
                                <th class="table-title"><a href="javascript:reorder('owner');">owner</a></th>
                                <th class="table-title"><a href="javascript:reorder('start_time desc');">Start Date</a></th>
                                <th class="table-title"><a href="javascript:reorder('end_time desc');">End Date</a></th>
                                <th class="table-title"><a href="javascript:reorder('end_time desc');">Progress</a></th>
                                <th class="table-author am-hide-sm-only">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                                <td><a href="javascript:toTaskCase('<?php echo ($v[id]); ?>','<?php echo ($v[pid]); ?>');"><?php echo ($v[name]); ?></a></td>
                                <td><?php echo ($v[project_name]); ?></td>
                                <td><?php echo ($v[driver]); ?></td>
                                <td><?php echo ($v[suit]); ?></td>
                                <td><?php echo ($v[board_name]); ?></td>
                                <td><?php echo ($v[owner]); ?></td>
                                <td><?php echo ($v[start_time]); ?></td>
                                <td><?php echo ($v[end_time]); ?></td>
                                <td><?php echo ($v['progress']); ?></td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary" task_id=<?php echo ($v[id]); ?> onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" task_id=<?php echo ($v[id]); ?> onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="am-modal am-modal-confirm" id=<?php echo ($v[id]); ?> style="top:-20%;">
                                <div class="am-modal-dialog">
                                    <div class="am-modal-hd">Edit Task</div>
                                    <div class="am-modal-bd">
                                      <label style="display:inline;">Name:</label>
                                      <input type="text" class="am-modal-prompt-input" id="edit_name" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
                                      <label style="display:inline;">Driver:</label>
                                      <input type="text" class="am-modal-prompt-input" id="edit_driver" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
                                      <label style="display:inline;margin-left:10px;">Type:</label> 
                                      <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
                                            <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." ov_id=<?php echo ($v[id]); ?> onchange="edit_type(this)" id="edit_type" style="border:1px solid #9C9898;">
                                                <option value="CModel">CModel</option>
                                                <option value="Chip">Chip</option>
                                                <option value="FPGA">FPGA</option>
                                            </select>
                                      </div><br/><br/>
                                      <label style="display:inline;margin-left:-17px;">Test Run:</label> 
                                      <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
                                            <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." id="edit_pid" style="border:1px solid #9C9898;">
                                                <option value=""></option>
                                                <?php if(is_array($run_list)): foreach($run_list as $k=>$vc): ?><option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                                            </select>
                                      </div><br/><br/>
                                      <label style="display:inline;margin-left:-100px;" id="board">Board:</label>
                                      <div class="am-form-group-inline" style="display:inline;" id="Chip_selected">
                                          <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary',searchBox: 1}"   class="am-fr" placeholder="Please select..." id="edit_platform">
                                            <option value=""></option>
                                            <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): ?><option value=<?php echo ($vc['Name']); ?>><?php echo ($vc[Name]); ?></option><?php endforeach; endif; ?>
                                          </select>
                                          <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"  onchange="edit_os(this)" ov_id=<?php echo ($v[id]); ?> class="am-fr" placeholder="Please select OS..." id="edit_os">
                                            <option value=""></option>
                                            <?php if(is_array($os_list)): foreach($os_list as $key=>$vc): if($vc==$v[OS]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
                                            <?php else: ?>
                                            <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
                                        </select>
                                        <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"    class="am-fr" placeholder="Please select OS..." id="edit_version">
                                          <option value=""></option>
                                        </select>
                                        <br/><br/>
                                      </div>
                                      <div class="am-form-group-inline" style="display:none;text-align:center;" id="CModel_selected">
                                        <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary',searchBox: 1}"   class="am-fr" placeholder="Please select..." id="edit_platform2">
                                <option value=""></option>
                                <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): if($vc[Type]==CModel): ?><option value=<?php echo ($vc['Name']); ?>><?php echo ($vc[Name]); ?></option><?php endif; endforeach; endif; ?>
                              </select>
                            <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"    class="am-fr" placeholder="Please select OS..." id="edit_version2">
                              <option value=""></option>
                              <?php if(is_array($scm)): foreach($scm as $key=>$vscm): ?><option value=<?php echo ($vscm); ?>><?php echo ($vscm); ?></option><?php endforeach; endif; ?>
                            </select>
                            <br/><br/>
                                        </div>
                                        <label style="display:inline;">Owner:</label>
                                        <div class="am-form-group-inline" style="display:inline;">
                                            <select data-am-selected="{btnWidth: '58%', btnStyle: 'secondary'}" class="am-fr" placeholder="Please select..." id="edit_owner">
                                                <option value=""></option>
                                                <?php if(is_array($user_list)): foreach($user_list as $k=>$vc): ?><option value="<?php echo ($vc[username]); ?>"><?php echo ($vc[username]); ?></option><?php endforeach; endif; ?>
                                            </select>
                                        </div><br/><br/>
                                        <label style="display:inline;margin-left:-33px;">start_time:</label>
                                        <input type="text" class="am-modal-prompt-input" data-am-datepicker id="edit_start_time" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
                                        <label style="display:inline;margin-left:-5%;">end_time:</label>
                                        <input type="text" class="am-modal-prompt-input" data-am-datepicker id="edit_end_time" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">
                                    </div>

                                    <div class="am-modal-footer">
                                        <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
                                        <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;"">Cancel</span>
                                    </div>
                                </div>
                            </div>
                            <?php $tmp_list=json_encode($v);?>
                            <script language="JavaScript">
                                var tmp=<?php echo ($tmp_list); ?>;
                                $.each(tmp,function (k,v) {
                                    $("#"+tmp.id+" #edit_"+k).val(v);
                                });
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
<?php if(is_array($data)): foreach($data as $key=>$v): ?><div class="am-modal am-modal-confirm" id="add_task_modal" style="top:-20%;" tabindex="<?php echo ($v[id]); ?>">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Task</div>
        <div class="am-modal-bd">
         <label style="display:inline;">Name:</label>
          <input type="text" class="am-modal-prompt-input" id="add_name" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
          <label style="display:inline;">Driver:</label>
          <input type="text" class="am-modal-prompt-input" id="add_driver" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
          <label style="display:inline;margin-left:10px;">Type:</label>
          <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
              <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." onchange="add_type(this)" id="add_type" style="border:1px solid #9C9898;">
                  <option value="CModel">CModel</option>
                  <option value="Chip">Chip</option>
                  <option value="FPGA">FPGA</option>
              </select>
          </div><br/><br/>
          <label style="display:inline;margin-left:-17px;">Test Run:</label> 
          <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
             <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." id="add_pid" style="border:1px solid #9C9898;">
                <option value=""></option>
                <?php if(is_array($run_list)): foreach($run_list as $k=>$vc): ?><option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
             </select>
          </div><br/><br/>
          <label style="display:inline;margin-left:2px;">Board:</label>
          <div class="am-form-group-inline" style="display:inline;text-align:center;" id="Chip_selected_add">
              <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary',searchBox: 1}"   class="am-fr" placeholder="Please select..." id="add_platform">
                <option value=""></option>
                <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): ?><option value=<?php echo ($vc['Name']); ?>><?php echo ($vc[Name]); ?></option>
                {else if condition="$vc[Type]==CModel"}<?php endforeach; endif; ?>
             </select>
             <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"  onchange="add_os(this)" ov_id=<?php echo ($v[id]); ?> class="am-fr" placeholder="Please select OS..." id="add_os">
                  <option value=""></option>
                  <?php if(is_array($os_list)): foreach($os_list as $key=>$vc): if($vc==$v[OS]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
                  <?php else: ?>
                  <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
            </select>
            <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"    class="am-fr" placeholder="Please select OS..." id="add_version">
                  <option value=""></option>
            </select>
            <br/><br/>
            </div>
             <div class="am-form-group-inline" style="display:none;text-align:center;" id="CModel_selected_add">
             <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary',searchBox: 1}"   class="am-fr" placeholder="Please select..." id="add_platform2">
               <option value=""></option>
               <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): if($vc[Type]==CModel): ?><option value=<?php echo ($vc['Name']); ?>><?php echo ($vc[Name]); ?></option><?php endif; endforeach; endif; ?>
             </select>
          <select data-am-selected="{btnWidth: '18.7%', btnStyle: 'secondary'}"    class="am-fr" placeholder="Please select OS..." id="add_version2">
            <option value=""></option>
            <?php if(is_array($scm)): foreach($scm as $key=>$vscm): ?><option value=<?php echo ($vscm); ?>><?php echo ($vscm); ?></option><?php endforeach; endif; ?>
            </select>
            <br/><br/> 
            </div> 
            <label style="display:inline;margin-left:10px;">Suite:</label> 
            <div class="am-form-group-inline" style="width:71.5%;display:inline;text-align:center;">
            <select data-am-selected="{btnWidth: '57.5%', btnStyle: 'secondary'}" placeholder="Please select..." id="add_suit" style="border:1px solid #9C9898;">
                <option value=""></option>
                <?php if(is_array($suit_list)): foreach($suit_list as $key=>$vc): ?><option value="<?php echo ($vc); ?>"><?php echo ($vc); ?></option><?php endforeach; endif; ?>
            </select>
            </div><br/><br/>   
            <label style="display:inline;">Owner:</label>
            <div class="am-form-group-inline" style="display:inline;">
                <select data-am-selected="{btnWidth: '58%', btnStyle: 'secondary'}" class="am-fr" placeholder="Please select..." id="add_user">
                    <option value=""></option>
                    <?php if(is_array($user_list)): foreach($user_list as $k=>$vc): ?><option value="<?php echo ($vc[username]); ?>"><?php echo ($vc[username]); ?></option><?php endforeach; endif; ?>
                </select>
            </div><br/><br/>
            <label style="display:inline;margin-left:-33px;">start_time:</label>
            <input type="text" class="am-modal-prompt-input" data-am-datepicker id="add_start" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
            <label style="display:inline;margin-left:-5%;">end_time:</label>
            <input type="text" class="am-modal-prompt-input" data-am-datepicker id="add_end" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">
            </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #9C9898;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #9C9898;">Cancel</span>
        </div>
    </div>
</div><?php endforeach; endif; ?>
<script>
  $(document).ready(function(){
    var type=$("#edit_type").val();
        var type2=$("#add_type").val();
        if(type=="CModel"){
          $('#Chip_selected').css("display","none");
          $('#CModel_selected').css("display","inline");
        }else if(type!="CModel"){
          $('#Chip_selected').css("display","inline");
          $('#CModel_selected').css("display","none");
        }
        if(type=="CModel"){
          $('#Chip_selected_add').css("display","none");
          $('#CModel_selected_add').css("display","inline");
        }else if(type!="CModel"){
          $('#Chip_selected_add').css("display","inline");
          $('#CModel_selected_add').css("display","none");
        }
  });
    $(document).ready(function () {
        $("#search_pid").val("<?php echo ($run_info['id']); ?>");
    });
    function del(obj) {
        var id=$(obj).attr('task_id');
        if(confirm('Do you want delete this Task?')){
            $.post("<?php echo U('Admin/Task/del');?>",{id:id},function (data) {
                window.location.reload();
            });
        }
    }
    function edit(obj) {
        var id=$(obj).attr('task_id');
        $("#"+id).modal({
            relatedTarget:this,
            onConfirm:function(e){
              board_val=$("#"+id+" #edit_platform").val()?$("#"+id+" #edit_platform").val():$("#"+id+" #edit_platform2").val();
              version_val=$("#"+id+" #edit_version").val()?$("#"+id+" #edit_version").val():$("#"+id+" #edit_version2").val();
                var arr={id:id,name:e.data['0'],driver:e.data['1'],start_time:e.data['2'],end_time:e.data['3'],board:board_val,Type:$("#"+id+" #edit_type").val(),owner:$("#"+id+" #edit_owner").val(),pid:$("#"+id+" #edit_pid").val(),OS:$('#edit_os').val(),Version:version_val};
                $.post("<?php echo U('Admin/Task/add');?>",arr,function (data) {
                    window.location.reload();
                });
            },
            onCancel:function (e) {
                e.close()
            }
        });
    }
    function add() {
        var start_time="<?php echo ($run_info[start_time]); ?>";
        var end_time="<?php echo ($run_info[end_time]); ?>";
        $("#add_name").val("");
        $("#add_platform").val("");
        $("#add_user").val("");
        $("#add_suit").val('');
        $("#add_pid").val("");
        $("#add_type").val("");
        $("#add_os").val("");
        $("#add_version").val("");   
        $("#add_driver").val("");   
        $("#add_start").attr({value:start_time});
        $("#add_end").attr({value:end_time});
        $("#add_task_modal").modal({
            relatedTarget:this,
            onConfirm:function(e){
                var pid=$("#add_pid").val();
                board_val=$("#add_platform").val()?$("#add_platform").val():$("#add_platform2").val();
                version_val=$("#add_version").val()?$("#add_version").val():$("#add_version2").val();
                if(pid!=null&&pid!=""&&pid!=0){
                    var arr={name:e.data['0'],driver:e.data['1'],start_time:e.data['2'],end_time:e.data['3'],board:board_val,owner:$('#add_user').val(),Type:$('#add_type').val(),suit:$('#add_suit').val(),pid:$("#add_pid").val(),OS:$('#add_os').val(),Version:version_val};
                    $.post("<?php echo U('Admin/Task/add');?>",arr,function (data) {
                        location.href=("<?php echo U('Admin/Task/case_index',array('tid'=>ttid));?>").replace('ttid',data);
                    });
                }else{
                    alert('Please choose the Test Run');
                }

            },
            onCancel:function (e) {
                e.close()
            }
        });
    }
    function project_check(obj) {
        var id=$(obj).val();
        /*$.post("<?php echo U('Admin/Task/Index');?>",{ajax:true,pid:id},function (data) {
            $("#edit_page").empty().html(data);
        });*/
        location.href=("<?php echo U('Admin/Task/Index',array('pid'=>ppid));?>").replace('ppid',id);
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
        location.href=("<?php echo U(Admin/Task/Index,array('pid'=>ppid,'sort'=>sort_rule));?>").replace('ppid',$("#search_pid").val()).replace('sort_rule',name);
    }
    function edit_os(obj) {
      var id=$(obj).attr('ov_id');
        var os=$(obj).val();
        $.post("<?php echo U('Admin/Task/index');?>",{'OS':os,'seconglist':true},function (data) {
            $('#'+id+' #edit_version').empty();
            $('#'+id+' #edit_version').append("<option value=''></option>");
            $.each(data,function (k,v) {
                $('#'+id+' #edit_version').append("<option value="+v.Version+">"+v.Version+"</option>");
            });
        });
    }
    function add_os(obj) {
        var os=$(obj).val();
        $.post("<?php echo U('Admin/Task/index');?>",{'OS':os,'seconglist':true},function (data) {
            $("#add_version").empty();
            $("#add_version").append("<option value=''></option>");
            $.each(data,function (k,v) {
                $("#add_version").append("<option value="+v.Version+">"+v.Version+"</option>");
            });
        });
    }
    function edit_type(obj) {
        var type=$(obj).val();
        var id=$(obj).attr('ov_id');
        if(type=="CModel"){
          $('#'+id+' #Chip_selected').css("display","none");
          $('#'+id+' #CModel_selected').css("display","inline");
          $("#board").css("margin-left","-95px");
        }else if(type!="CModel"){
          $('#'+id+' #Chip_selected').css("display","inline");
          $('#'+id+' #CModel_selected').css("display","none");
          $("#board").css("margin-left","2px");
        }
    }
    function add_type(obj) {
        var type=$(obj).val();
        if(type=="CModel"){
          $('#Chip_selected_add').css("display","none");
          $('#CModel_selected_add').css("display","inline");
        }else if(type!="CModel"){
          $('#Chip_selected_add').css("display","inline");
          $('#CModel_selected_add').css("display","none");
        }
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