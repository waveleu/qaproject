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
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Report Format</strong></div>
        </div>
        <div class="am-g">

            <div class="am-u-sm-12">
               <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">Class</th><th class="table-title">format</th><th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[path]); ?></td>
                        <td><?php echo ($v[format]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" class_id="<?php echo ($v[id]); ?>"  onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit Version</button>
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
<div class="am-modal am-modal-confirm" id="edit" style="top:-20%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Edit Version</div>
        <div class="am-modal-bd">
            Please input new Version
            <table style="width:60%;margin:12px auto;">
                <tr><td><label class="am-checkbox" style="text-align:left;"><input type="checkbox" value="score" data-am-ucheck style="text-align:left;"> score</label></td>
                    <td><label class="am-checkbox" style="text-align:left;"><input type="checkbox" value="choose1" data-am-ucheck style="text-align:left;"> choose1</label></td>
                    <td><label class="am-checkbox" style="text-align:left;"><input type="checkbox" value="choose2" data-am-ucheck style="text-align:left;"> choose2</label></td>
                </tr>
            </table>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">Ok</span>
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
        var id=$(obj).attr('class_id');
        $("#edit").modal({
            relatedTarget: this,
            onConfirm:function () {
                var format=$("#edit input[type=checkbox]:checked").map(function(){return this.value}).get().join(',');
                $.post("<?php echo U('Admin/Class/edit');?>",{id:id,format:format},function (data) {
                    location.reload();
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