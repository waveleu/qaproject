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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Board List</strong></div>
        </div>
        <div class="am-g">
            <div class="am-u-sm-12">
                <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="add()"><span class="am-icon-pencil-square-o"></span>new Board</button>
                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-title">Host</th>
                        <th class="table-title">Alias</th>
                        <th class="table-title">Platform</th>
                        <th class="table-title">Owner</th>
                        <th class="table-author am-hide-sm-only am-fr">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                        <td><?php echo ($v[host]); ?></td>
                        <td>name</td>
                        <td><?php echo ($v[info][name]); ?></td>
                        <td><?php echo ($v[owner]); ?></td>
                        <td>
                            <div class="am-btn-toolbar am-fr">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" board_id="<?php echo ($v[id]); ?>" onclick="edit(this)"><span class="am-icon-pencil-square"></span> Edit</button>
                                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" board_id="<?php echo ($v[id]); ?>" onclick="del(this)"><span class="am-icon-trash-o" ></span> Delete</button>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <div class="am-modal am-modal-confirm" tabindex=<?php echo ($v[id]); ?> style="top:-22%;">
                        <div class="am-modal-dialog">
                            <div class="am-modal-hd">Edit Board</div>
                            <div class="am-modal-bd">
                              <label style="display:inline;">host:</label>
                              <input type="text" class="am-modal-prompt-input" value=<?php echo ($v[host]); ?> style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>
                              <label style="display:inline;">Alias:</label>
                              <input type="text" class="am-modal-prompt-input" style="width:300px;text-align:left;display:inline;border:1px solid #9C9898;"><br/><br/>                             
                              <label style="display:inline;margin-left:-6%;">Platform:</label>
                              <div class="am-form-group-inline" style="display:inline;">
                                  <select data-am-selected="{btnWidth: '58%', btnStyle: 'secondary'}" placeholder="Please select..." id="a_board" style="border:1px solid #9C9898;">
                                        <option value=""></option>
                                        <?php if(is_array($platform_info)): foreach($platform_info as $k=>$vc): if($k==$v[board_id]): ?><option value=<?php echo ($k); ?> selected><?php echo ($vc); ?></option>
                                            <?php else: ?>
                                                <option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endif; endforeach; endif; ?>
                                    </select>
                                </div><br/><br/>
                                <label style="display:inline;margin-left:-4%;">Owner:</label>
                                <div class="am-form-group-inline" style="display:inline;">
                                  <select data-am-selected="{btnWidth: '58%', btnStyle: 'secondary'}" placeholder="Please select..." id="a_owner" style="border:1px solid #9C9898;">
                                        <option value=""></option>
                                        <?php if(is_array($owner_list)): foreach($owner_list as $k=>$vc): if($vc[username]==$v[owner]): ?><option value=<?php echo ($vc[username]); ?> selected><?php echo ($vc[username]); ?></option>
                                            <?php else: ?>
                                            <option value=<?php echo ($vc[username]); ?>><?php echo ($vc[username]); ?></option><?php endif; endforeach; endif; ?>
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


<div class="am-modal am-modal-confirm" tabindex="add_board_modal" id="add_board_modal" style="top:-22%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New Board</div>
        <div class="am-modal-bd">
        <table style="width:100%;margin:5px auto;">
        <tr style="margin:10px auto;">
          <td style="text-align:right;"><label>host:&nbsp;</label></td>
          <td><input type="text" id="Name" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:71.5%;border:1px solid #9C9898;"></td>
        </tr>
        <tr>
          <td style="text-align:right;"><label>Alias:&nbsp;</label></td>
          <td><input type="text" class="am-modal-prompt-input" style="text-align:left;margin-left:0px;width:71.5%;border:1px solid #9C9898;"></td>
        </tr>
        <tr>
          <td style="text-align:right;">
            <label style="padding-top:10px;">Platform:&nbsp;</label>
          </td>
          <td style="text-align:left;padding-top:10px;">
            <div class="am-form-group-inline" style="width:71.5%;">
             <select data-am-selected="{btnWidth: '100%', btnStyle: 'secondary'}"  placeholder="Please select..." class="am-fl" id="e_board">
                <option value=""></option>
                <?php if(is_array($platform_info)): foreach($platform_info as $k=>$vc): ?><option value=<?php echo ($k); ?>><?php echo ($vc); ?></option><?php endforeach; endif; ?>
             </select>
            </div>
          </td>
        </tr>
        <tr>
          <td style="text-align:right;">
            <label style="text-align:right;padding-top:10px;">Owner:&nbsp;</label>
          </td>
          <td style="text-align:left;padding-top:10px;">
            <div class="am-form-group-inline" style="width:71.5%;">
             <select data-am-selected="{btnWidth: '100%', btnStyle: 'secondary'}"  placeholder="Please select..." id="e_owner">
                <option value=""></option>
                <?php if(is_array($owner_list)): foreach($owner_list as $k=>$vc): ?><option value=<?php echo ($vc[username]); ?>><?php echo ($vc[username]); ?></option><?php endforeach; endif; ?>
             </select>
            </div>
          </td>
        </tr>
      </table>
      </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;"">Cancel</span>
        </div>
    </div>
</div>

<div class="am-modal am-modal-confirm" tabindex="del_class" id="del_modal" style="top:-30%;">
    <div class="am-modal-dialog">
        <div class="am-modal-bd">
            <label>Delete This Board?</label>
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
        var id=$(obj).attr('board_id');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var board_id=$(str+' #a_board').val();
                var OS=$(str+' #a_os').val();
                var BSP=$(str+' #a_bsp').val();
                var owner=$(str+' #a_owner').val();
                $.post("<?php echo U('Admin/Boardlist/edit');?>",
                        //{id:id,host:e.data,board_id:board_id,OS:OS,BSP:BSP,owner:owner},
                        {id:id,host:e.data,board_id:board_id,owner:owner},
                        function (data) {
                            location.reload();
                        });
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function del(obj) {
        var id=$(obj).attr('board_id');
        $("#del_modal").modal({
            relatedTarget:this,
            onConfirm:function (e) {
                $.post("<?php echo U('Admin/Boardlist/del');?>",{id:id},function (data) {
                    window.location.reload();
                })
            },
            onCancel:function (e) {
                e.close();
            }
        });

    }
    function add() {
        $('#add_board_modal').modal({
            relatedTarget: this,
            onConfirm:function (e) {
                var board_id=$('#add_board_modal #e_board').val();
                //var OS=$('#add_board_modal #e_os').val();
                //var BSP=$('#add_board_modal #e_bsp').val();
                var owner=$('#add_board_modal #e_owner').val();
                $.post("<?php echo U('Admin/Boardlist/add');?>",
                        //{host:e.data,board_id:board_id,OS:OS,BSP:BSP,owner:owner},
                        {host:e.data,board_id:board_id,owner:owner},
                        function (data) {
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
</html>').val();
                //var OS=$('#add_board_modal #e_os').val();
                //var BSP=$('#add_board_modal #e_bsp').val();
                var owner=$('#add_board_modal #e_owner').val();
                $.post("<?php echo U('Admin/Boardlist/add');?>",
                        //{host:e.data,board_id:board_id,OS:OS,BSP:BSP,owner:owner},
                        {host:e.data,board_id:board_id,owner:owner},
                        function (data) {
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