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
    </style>
</head>
<body>
<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Test Run List</strong> </div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span> new Test Run</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title"><a href="javascript:reorder('name');">Name</a></th>
                        <th class="table-title"><a href="javascript:reorder('progress');">Progress</a></th>
                        <th class="table-title"><a href="javascript:reorder('project');">Project</a></th>
                        <th class="table-title"><a href="javascript:reorder('start_time desc');">Start Time</a></th>
                        <th class="table-title"><a href="javascript:reorder('end_time desc');">End Time</a></th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                        <td><a href="javascript:editTask('<?php echo ($v[id]); ?>');"><?php echo ($v[name]); ?></a></td>
                        <td><?php echo ($v[progress]); ?></td>
                        <td><?php echo ($v[project]); ?></td>
                        <td><?php echo ($v[start_time]); ?></td>
                        <td><?php echo ($v[end_time]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" testrun_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" testrun_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
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


//add New Test Run
<div class="am-modal am-modal-confirm" tabindex="add_project_modal" id="add_project_modal" style="top:-20%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New/Edit Test Run </div>
        <div class="am-modal-bd">
          <label style="display:inline;">name:</label>
          <input type="text" class="am-modal-prompt-input" id="add_name" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
          <label style="display:inline;margin-left:-10px;">project:</label>
          <select data-am-selected="{btnWidth: '57.8%', btnStyle: 'secondary'}" class="" placeholder="Please select OS..." id="add_project" style="display:inline;">
              <option value=""></option>
              <?php if(is_array($project)): foreach($project as $key=>$vc): ?><option value=<?php echo ($vc['id']); ?>><?php echo ($vc['name']); ?></option><?php endforeach; endif; ?>
          </select><br /><br />
          <label style="display:inline;margin-left:-32px;">start_time:</label>
          <input type="text" class="am-modal-prompt-input" data-am-datepicker  id="add_start" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
          <label style="display:inline;margin-left:-28px;">end_time:</label>
          <input type="text" class="am-modal-prompt-input" data-am-datepicker id="add_end" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>

        </div>
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
        var id=$(obj).attr('testrun_id');
        var testrun_info=eval('<?php echo json_encode($list); ?>');
        $.each(testrun_info,function (k,v) {
            if(v.id==id){
                $("#add_name").val(v.name);
                var project=v.pid;
                $("select option[value='"+project+"']").attr("selected", "selected"); 
                $("#add_start").attr({value:v.start_time});
                $("#add_end").attr({value:v.end_time});
            }
        });
        $("#add_project_modal").modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Testrun/edit');?>",
                        {id:id,pid:$("#add_project").val(),name:e.data[0],start_time:e.data[1],end_time:e.data[2]},
                        function () {
                            window.location.reload();
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {
        var id=$(obj).attr('testrun_id');
        if(confirm('Delete This List ?')){
            $.post("<?php echo U('Admin/Testrun/del');?>",{id:id},function (data) {
                window.location.reload();
            })
        }
    }
    function add() {
        var start_time="<?php echo ($project_info[start_time]); ?>";
        var end_time="<?php echo ($project_info[end_time]); ?>";

        $("#add_name").val("");
        $("#add_start").attr({value:start_time});
        $("#add_end").attr({value:end_time});

        $('#add_project_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var pid="<?php echo ($project_info[id]); ?>";
                $.post("<?php echo U('Admin/Testrun/edit');?>",
                        {name:e.data[0],pid:$("#add_project").val(),start_time:e.data[1],end_time:e.data[2],pid:pid},
                        function (data) {
                            window.location.reload();
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }
    function editTask(id) {
        location.href=("<?php echo U('Admin/Task/index',array('pid'=>vid));?>").replace('vid',id);
    }
    function reorder(name) {
        location.href=("<?php echo U(Admin/Task/Index,array('pid'=>ppid,'sort'=>sort_rule));?>").replace('ppid',"<?php echo ($project_info[id]); ?>").replace('sort_rule',name);
    }

</script>
</body>
</html>