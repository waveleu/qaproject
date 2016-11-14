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
        .am-modal-bd{
            width:90%;
            margin:0 auto;
            text-align: left;
        }
        .am-modal-bd label{
            width:150px;
            display:inline-block;
            text-align:right;
            padding:0px;
        }
        .am-modal-bd input{
            width:60%;

        }
    </style>
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Platform</strong></div>

        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span>new Platform</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">Name</th>
                        <th class="table-title">Board Type</th>
                        <th class="table-title">x86 / x64</th>
                        <th class="table-title">OS_Version</th>
                        <th class="table-title">BSP</th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[name]); ?></td>
                        <td><?php echo ($v[Board]); ?></td>
                        <td><?php echo ($v['x86x64']); ?></td>
                        <td><?php echo ($v[OS]); echo ($v[Version]); ?></td>
                        <td><?php echo ($v[BSP]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs ">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" platform_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>

                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" platform_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                        <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" style="top:-15%;">
                        <div class="am-modal-dialog">
                            <div class="am-modal-hd">Edit Platform</div>
                            <div class="am-modal-bd">
                               <label>name:</label>
                               <input type="text" class="am-modal-prompt-input" value="<?php echo ($v[name]); ?>" style="display:inline;border:1px solid #9C9898;"><br/><br/>
                                <label>Board:</label> 
                                <div class="am-form-group-inline" style="display:inline;">
                                    <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary'}" class="am-fr" placeholder="Please select..." id='edit_board'>
                                        <!-- <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): if(explode(',',$vc)[0]==Chip): if($vc==$v[Board]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
		                                        <?php else: ?>
		                                        <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endif; endforeach; endif; ?> -->
                                        <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): if($vc==$v[Board]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
		                                        <?php else: ?>
		                                        <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
                                    </select>
                                </div><br/><br/>
                                <label>x86 / x64:</label> 
                                <div class="am-form-group-inline" style="display:inline;">
                                    <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary'}" class="am-fr" placeholder="Please select..." id="edit_bit">
                                        <option value='x86' selected>x86</option>
                     					<option value='x64'>x64</option>
                                    </select>
                                </div><br/><br/>
                                <label>OS_Version:</label>
                                <div class="am-form-group-inline" style="display:inline;">
                                    <select data-am-selected="{btnWidth: '29%', btnStyle: 'secondary'}"  onchange="add_os1(this)" ov_id=<?php echo ($v[id]); ?> class="am-fr" placeholder="Please select OS..." id="edit_os" style="display:inline;">
                                        <option value=""></option>
                                        <?php if(is_array($os_list)): foreach($os_list as $key=>$vc): if($vc==$v[OS]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
                                        <?php else: ?>
                                        <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
                                    </select>
                                    <select data-am-selected="{btnWidth: '30%', btnStyle: 'secondary'}" class="am-fr" placeholder="Please select OS..." id="edit_version" style="display:inline;">
                                        <option value=""></option>
                                        <?php if(is_array($v[ov_list])): foreach($v[ov_list] as $key=>$vc): if($vc==$v[Version]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
                                        <?php else: ?>
                                        <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
                                    </select>
                                </div><br/><br/>
                                <label>BSP:</label>
                                <div class="am-form-group-inline" style="display:inline;">
                                    <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary'}"  id="edit_bsp" class="am-fr" placeholder="Please select...">
                                        <option value="" ></option>
                                        <?php if(is_array($bsp_list)): foreach($bsp_list as $key=>$vc): if($vc==$v[BSP]): ?><option value=<?php echo ($vc); ?> selected><?php echo ($vc); ?></option>
                                        <?php else: ?>
                                        <option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="am-modal-footer">
                                <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
                                <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>

                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- content end -->


//add new platform
<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_board_modal" style="top:-15%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Platform</div>
        <div class="am-modal-bd">
           <label>name:</label>
           <input type="text" class="am-modal-prompt-input" value="<?php echo ($v[name]); ?>" style="display:inline;border:1px solid #9C9898;"><br/><br/>
            <label>Board:</label> 
            <div class="am-form-group-inline" style="display:inline;">
                <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary'}" placeholder="Please select..." id='add_board'>
                    <option value=""></option>
                    <?php if(is_array($board_list)): foreach($board_list as $key=>$vc): ?><option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                </select>
            </div><br/><br/>
            <label>x86 / x64:</label> 
            <div class="am-form-group-inline" style="display:inline;">
                <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary'}" placeholder="Please select..." id="add_bit">
                     <option value='x86'>x86</option>
                     <option value='x64'>x64</option>
                </select>
            </div><br/><br/>
            <label>OS_Version:</label>
            <div class="am-form-group-inline" style="display:inline;">
                <select data-am-selected="{btnWidth: '29.5%', btnStyle: 'secondary'}"  onchange="add_os(this)" ov_id=<?php echo ($v[id]); ?> class="am-fr" placeholder="Please select OS..." id="os_add" style="display:inline;">
                    <option value=""></option>
                    <?php if(is_array($os_list)): foreach($os_list as $key=>$vc): ?><option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                </select>
                <select data-am-selected="{btnWidth: '29.5%', btnStyle: 'secondary'}"  id="add_version" class="am-fr" placeholder="Please select...">
                </select>
            </div><br/><br/>
            <label>BSP:</label>
            <div class="am-form-group-inline" style="display:inline;">
                <select data-am-selected="{btnWidth: '60%', btnStyle: 'secondary'}"  id="add_bsp" class="am-fr" placeholder="Please select...">
                    <option value=""></option>
                    <?php if(is_array($bsp_list)): foreach($bsp_list as $key=>$vc): ?><option value=<?php echo ($vc); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
                </select>
            </div>
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
        var id=$(obj).attr('platform_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
            	var bit=$(str+" #edit_bit option:selected").val();
                var os=$(str+" #edit_os option:selected").val();
                var version=$(str+" #edit_version option:selected").val();
                var bsp=$(str+" #edit_bsp option:selected").val();
                var board=$(str+" #edit_board option:selected").val();
                console.log(bit);
                console.log(board);
                $.post("<?php echo U('Admin/Platform/edit');?>",
                        {id:id,OS:os,Version:version,BSP:bsp,Board:board,name:e.data,'x86x64':bit},
                        function () {
                            location.href="<?php echo U('Admin/Platform/index');?>";
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }
    function del(obj) {
        var id=$(obj).attr('platform_id');
        if(confirm('Delete This Platform？')){
            $.post("<?php echo U('Admin/Platform/del');?>",{id:id},function (data) {
                window.location.reload();
            })
        }
    }
    function add() {
        $('#add_board_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
            	var bit=$("#add_bit option:selected").val();
                var os=$("#os_add option:selected").val();
                var version=$("#add_version option:selected").val();
                var bsp=$("#add_bsp option:selected").val();
                var board=$("#add_board option:selected").val();
                $.post("<?php echo U('Admin/Platform/add');?>",
                        {Board:board,BSP:bsp,OS:os,Version:version,name:e.data,'x86x64':bit},
                        function (data) {
                            window.location.reload();
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });
    }
    function add_os(obj) {
        var os=$(obj).val();
        $.post("<?php echo U('Admin/Platform/check_version');?>",{'OS':os},function (data) {
            $("#add_version").empty();
            $("#add_version").append("<option value=''></option>");
            $.each(data,function (k,v) {
                $("#add_version").append("<option value="+v.Version+">"+v.Version+"</option>");
            });
        });
    }
    function add_os1(obj) {
        var os=$(obj).val();
        var id=$(obj).attr('ov_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $.post("<?php echo U('Admin/Platform/check_version');?>",{'OS':os},function (data) {
            $(str+" #edit_version").empty();
            $(str+" #edit_version").append("<option value=''></option>");
            $.each(data,function (k,v) {
                $(str+" #edit_version").append("<option value="+v.Version+">"+v.Version+"</option>");
            });
        });
    }
</script>
</body>
</html>