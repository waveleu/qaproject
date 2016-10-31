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
    <link rel="icon" type="image/png" href="/Amaze/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/Amaze/Public/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Amaze/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Amaze/Public/assets/css/admin.css">
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Table</strong> / <small>OS_Version</small></div>
            <div class="am-u-sm-offset-6 am-cf"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger"  onclick="add()">
                <span class="am-icon-pencil-square-o"></span>new Board</button></div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-7">
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">id</th><th class="table-title">Board_Name</th><th class="table-title">Customer</th><th class="table-title">Chip_info</th>
                        <th class="table-title">2D_Core</th><th class="table-title">3D_Core</th><th class="table-title">2D_VG_Core</th>
                        <th class="table-author am-hide-sm-only">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[id]); ?></td>
                        <td><?php echo ($v[Name]); ?></td>
                        <td><?php echo ($v[Customer]); ?></td>
                        <td><?php echo ($v[Chip_Info]); ?></td>
                        <td><?php echo ($v['2D_Core']); ?></td>
                        <td><?php echo ($v['3D_Core']); ?></td>
                        <td><?php echo ($v['2D_VG_Core']); ?></td>
                        <td>
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" board_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                    <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" >
                                        <div class="am-modal-dialog">
                                            <div class="am-modal-hd">Edit Board</div>
                                            <div class="am-modal-bd">
                                                <?php if(is_array($v)): $i = 0; $__LIST__ = $v;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($i % 2 );++$i; if($key!=id): echo ($key); ?><input type="text" class="am-modal-prompt-input" value="<?php echo ($vsub); ?>"><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                            </div>
                                            <div class="am-modal-footer">
                                                <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
                                                <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" board_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
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
//add_version modal
<div class="am-modal am-modal-confirm" tabindex="add_version_modal" id="add_version_modal" >
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Add Version</div>
        <div class="am-modal-bd">
            Please input new Version
            <input type="text" class="am-modal-prompt-input" >
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
        </div>
    </div>
</div>

//rename_os_modal
<div class="am-modal am-modal-confirm" tabindex="add_version_modal" id="rename_os_modal" >
    <div class="am-modal-dialog">
        <div class="am-modal-hd">Rename OS</div>
        <div class="am-modal-bd">
            Please input
            <input type="text" class="am-modal-prompt-input" >
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
        </div>
    </div>
</div>

//add new board
<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_board_modal" >
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Board</div>
        <div class="am-modal-bd">
            Name<input type="text" class="am-modal-prompt-input" id="Name">
            Customer<input type="text" class="am-modal-prompt-input" >
            Chip_Info<input type="text" class="am-modal-prompt-input" >
            2D_Core<input type="text" class="am-modal-prompt-input" >
            3D_Core<input type="text" class="am-modal-prompt-input" >
            2D_VG_Core<input type="text" class="am-modal-prompt-input" >
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
        </div>
    </div>
</div>
</div>




<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="/Amaze/Public/assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/Amaze/Public/assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="/Amaze/Public/assets/js/amazeui.min.js"></script>
<script src="/Amaze/Public/assets/js/app.js"></script>
<script>
    function edit(obj) {
        var id=$(obj).attr('board_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
                 $.post("<?php echo U('Admin/Board/edit');?>",
                        {id:id,Name:e.data[0],Customer:e.data[1],Chip_Info:e.data[2],'2D_Core':e.data[3],'3D_Core':e.data[4],'2D_VG_Core':e.data[5]},
                        function () {
                            location.href="<?php echo U('Admin/Board/index');?>";
                });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {
        var id=$(obj).attr('board_id');
        if(confirm('确定删除？')){
            $.post("<?php echo U('Admin/Board/del');?>",{id:id},function (data) {
                window.location.href="<?php echo U('Admin/Board/index');?>";
            })
        }

    }
    function add() {
        $('#add_board_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Board/add');?>",
                        {Name:e.data[0],Customer:e.data[1],Chip_Info:e.data[2],'2D_Core':e.data[3],'3D_Core':e.data[4],'2D_VG_Core':e.data[5]},
                        function () {
                            location.href="<?php echo U('Admin/Board/index');?>";
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