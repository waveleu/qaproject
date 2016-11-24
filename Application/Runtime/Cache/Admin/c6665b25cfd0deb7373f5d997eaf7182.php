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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Branch</strong></div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span> new Branch</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">Branch</th><th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[Name]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" branch_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" branch_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" style="top:-30%;">
                        <div class="am-modal-dialog">
                            <div class="am-modal-hd">Edit Branch</div>
                            <div class="am-modal-bd">
                              <label style="display:inline;">Branch:</label>
                              <input type="text" value=<?php echo ($v[Name]); ?> class="am-modal-prompt-input" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">
                            </div>
                            <div class="am-modal-footer">
                              <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
                              <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;"">Cancel</span>
                            </div>
                    </div><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- content end -->


//add new project
<div class="am-modal am-modal-confirm" tabindex="add_branch_modal" id="add_branch_modal" style="top:-30%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Branch</div>
        <div class="am-modal-bd">
           <label style="display:inline;">Branch:</label>
           <input type="text" class="am-modal-prompt-input" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;">
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
        var id=$(obj).attr('branch_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Branch/edit');?>", {id:id,Name:e.data}, function (data) {
                            location.href="<?php echo U('Admin/Branch/index');?>";
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {
        var id=$(obj).attr('branch_id');
        if(confirm('Delete This Branch ?')){
            $.post("<?php echo U('Admin/Branch/del');?>",{id:id},function (data) {

                window.location.href="<?php echo U('Admin/Branch/index');?>";
            })
        }

    }
    function add() {
        $('#add_branch_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Branch/add');?>", {Name:e.data}, function (data) {
                            location.href="<?php echo U('Admin/Branch/index');?>";
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }
</script>
</body>
</html>