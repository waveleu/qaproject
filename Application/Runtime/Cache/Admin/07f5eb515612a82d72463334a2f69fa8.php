<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/qaweb/Public/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
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
		.line a:hover{
			text-decoration:underline;
		}
    </style>
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Project</strong> </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span> new Project</button>
                <table class="am-table am-table-striped am-table-hover table-main line">
                    <thead>
                    <tr>
                        <th class="table-title"><a href="javascript:reorder('name');">Name</a></th>
                        <th class="table-title"><a href="javascript:reorder('Version');">Version</a></th>
                        <th class="table-title"><a href="javascript:reorder('Branch');">Branch</a></th>
                        <th class="table-title"><a href="javascript:reorder('Build_Location');">Build_Location</a></th>
                        <th class="table-title"><a href="javascript:reorder('First_Build_No');">First_Build_No</a></th>
                        <th class="table-title"><a href="javascript:reorder('Release_Build_No');">Release_Build_No</a></th>
                        <th class="table-title"><a href="javascript:reorder('start_time desc');">Start Date</a></th>
                        <th class="table-title"><a href="javascript:reorder('end_time desc');">End Date</a></th>
                        <th class="table-title"><a href="javascript:reorder('status');">Status</a></th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($project_list)): foreach($project_list as $key=>$v): ?><tr>
                        <td><a href="javascript:editTask('<?php echo ($v[id]); ?>');"><?php echo ($v[name]); ?></a></td>
                        <td><?php echo ($v[Version]); ?></td>
                        <td><?php echo ($v[Branch]); ?></td>
                        <td><?php echo ($v[Build_Location]); ?></td>
                        <td><?php echo ($v[First_Build_No]); ?></td>
                        <td><?php echo ($v[Release_Build_No]); ?></td>
                        <td><?php echo ($v[start_time]); ?></td>
                        <td><?php echo ($v[end_time]); ?></td>
                        <td><?php echo ($v[Status]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" project_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" project_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- content end -->


//add new project
<div class="am-modal am-modal-confirm" tabindex="add_project_modal" id="add_project_modal" style="top:-10%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New/Edit Project</div>
        <div class="am-modal-bd">
          <table style="width:100%;margin:5px auto;">
            <tr>
              <td style="width:20px;text-align:right;"><label>name:&nbsp;</label></td>
              <td><input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="add_name"></td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="padding-top:10px;">Version:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <div class="am-form-group-inline" style="width:80%;">
                  <select data-am-selected="{btnWidth: '100%', btnStyle: 'secondary'}"  id="add_version" class="am-fr" placeholder="Please select...">
                    <option value=""></option>
                    <?php if(is_array($version_list)): foreach($version_list as $key=>$vc): ?><option value="<?php echo ($vc); ?>"><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">Branch:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <div class="am-form-group-inline" style="width:80%;">
                <select data-am-selected="{btnWidth: '100%', btnStyle: 'secondary'}"  onchange="add_os(this)" class="am-fr" placeholder="Please select OS..." id="add_branch" style="display:inline;">
                    <option value=""></option>
                    <?php if(is_array($branch_list)): foreach($branch_list as $key=>$vc): ?><option value="<?php echo ($vc); ?>"><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                </select>
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">Status:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
               <div class="am-form-group-inline" style="width:80%;">
                <select data-am-selected="{btnWidth: '100%', btnStyle: 'secondary'}"  onchange="add_os(this)" class="am-fr" placeholder="Please select..." id="add_status" style="display:inline;">
                  <option value=""></option>           
                  <option value="Ongoing" >Ongoing</option>
                  <option value="Finished">Finished</option>
                </select>
                </div>
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">Build_Location:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="add_build">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">First_Build_No:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="add_firstb">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">Release_Build_No:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="add_release">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">start_time:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="add_start" data-am-datepicker="{format: 'yyyy-mm-dd'}">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">end_time:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="add_end" data-am-datepicker="{format: 'yyyy-mm-dd'}">
              </td>
            </tr>
          </table>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>

        </div>      
    </div>
</div>





<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/qaweb/Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/qaweb/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>
<script src="/qaweb/Public/assets/js/app.js"></script>
<script>

    function edit(obj) {
        var id=$(obj).attr('project_id');
        var project_info=eval('<?php echo json_encode($project_list); ?>');
        $.each(project_info,function (k,v) {
            if(v.id==id){
                $("#add_name").val(v.name);
                //$("#add_version").val(v.Version);
                $("#add_version").find('option[value="'+v.Version+'"]').attr('selected',true);
                $("#add_branch").find('option[value="'+v.Branch+'"]').attr('selected',true);
                $("#add_branch").val(v.Branch);
                $("#add_status").val(v['Status']);
                $("#add_build").val(v.Build_Location);
                $("#add_firstb").val(v.First_Build_No);
                $("#add_release").val(v.Release_Build_No);
                $("#add_start").attr({value:v.start_time});
                $("#add_end").attr({value:v.end_time});
            }
        });
        $("#add_project_modal").modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Project/edit');?>",
                        {id:id,name:e.data[0],Version:$("#add_version").val(),Branch:$("#add_branch").val(),Status:$("#add_status").val(),Build_Location:e.data[1],First_Build_No:e.data[2],Release_Build_No:e.data[3],start_time:e.data[4],end_time:e.data[5]},
                        function () {
                            location.href="<?php echo U('Admin/Project/index');?>";
                            window.location.reload();
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {
        var id=$(obj).attr('project_id');
        if(confirm('Delete This Project？')){
            $.post("<?php echo U('Admin/project/del');?>",{id:id},function (data) {
                window.location.href="<?php echo U('Admin/Project/index');?>";
            })
        }
    }
    function add() {
        $("#add_name").val("");
        $("#add_version").val("");
        $("#add_branch").val("");
        $("#add_status").val("");
        $("#add_build").val("");
        $("#add_firstb").val("");
        $("#add_release").val("");
        $("#add_start").attr({value:""});
        $("#add_end").attr({value:""});
        $('#add_project_modal').modal({

            relatedTarget: this,
            onConfirm:function (e) {
                var branch=$('#add_project_modal option:selected').val();
                $.post("<?php echo U('Admin/Project/add');?>",
                        {name:e.data[0],Version:$("#add_version").val(),Branch:$("#add_branch").val(),Status:$("#add_status").val(),Build_Location:e.data[1],First_Build_No:e.data[2],Release_Build_No:e.data[3],start_time:e.data[4],end_time:e.data[5]},
                        function (data) {
                            location.href="<?php echo U('Admin/Project/index');?>";
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }
    function editTask(id) {
        location.href=("<?php echo U('Admin/Testrun/index',array('pid'=>vid));?>").replace('vid',id);
    }
    function reorder(name) {
        location.href=("<?php echo U(Admin/Project/Index,array('sort'=>sort_rule));?>").replace('sort_rule',name);
    }


</script>
</body>
</html>