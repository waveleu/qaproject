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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Version</strong></div>

        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span>new Version</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">Name</th>
                        <th class="table-title">BuildNo</th>
                        <th class="table-title">BuildType</th>
                        <th class="table-title">Compile</th>
                        <th class="table-title">Time</th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[name]); ?></td>
                        <td><?php echo ($v[BuildNo]); ?></td>
                        <td><?php echo ($v[BuildType]); ?></td>
                        <td><?php echo ($v[Compile]); ?></td>
                        <td><?php echo ($v[time]); ?></td>
                        <td >
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" version_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>

                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" version_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
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


//add new board
<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_modal" style="top:-15%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Version</div>
        <div class="am-modal-bd">
          <table style="width:100%;margin:5px auto;">
            <tr>
              <td style="text-align:right;"><label>Name:&nbsp;</label></td>
              <td><input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="name"></td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="padding-top:10px;">BuildNo:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="BuildNo">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="padding-top:10px;">BuildType:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="BuildType">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">Compile:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" id="Compile">
              </td>
            </tr>
            <tr>
              <td style="text-align:right;">
                <label style="text-align:right;padding-top:10px;">Time:&nbsp;</label>
              </td>
              <td style="text-align:left;padding-top:10px;">
                <input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:80%;border:1px solid #9C9898;" data-am-datepicker id="start_time">
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
<?php $arr=json_encode($data);?>
<script>
    function edit(obj) {
        var id=$(obj).attr('version_id');
        $.each(<?php echo ($arr); ?>,function (k,v) {
            if(v.id==id){
                $("#name").val(v.name);
                $("#BuildNo").val(v.BuildNo);
                $("#BuildType").val(v.BuildType);
                $("#Compile").val(v.Compile);
                //$("#start_time").val(v.time);
            }
        });

        $("#add_modal").modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Version/save');?>",
                        {id:id,name:e.data[0],BuildNo:e.data[1],BuildType:e.data[2],Compile:e.data[3],time:e.data[4]},function () {
                            window.location.reload();
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {

        var id=$(obj).attr('version_id');
        if(confirm('Delete This Version ?')){
            $.post("<?php echo U('Admin/Version/del');?>",{id:id},function (data) {
                window.location.reload();
            })
        }

    }
    function add() {
        $("#name").val("");
        $("#BuildNo").val("");
        $("#BuildType").val("");
        $("#Compile").val("");
        //$("#time").val("");
        $('#add_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Version/save');?>",
                        {name:e.data[0],BuildNo:e.data[1],BuildType:e.data[2],Compile:e.data[3],time:e.data[4]},function () {
                            window.location.reload();
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