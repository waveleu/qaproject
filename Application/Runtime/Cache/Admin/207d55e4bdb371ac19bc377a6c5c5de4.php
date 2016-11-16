<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
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

<div class="am-cf admin-main am-padding-top-0">
    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0 ">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">User</strong></div>

            </div>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <button class="am-btn am-btn-default am-btn-xs am-text-danger am-fr" onclick="add_user(this)"><span class="am-icon-pencil-square-o"></span> New User/Admin</button>
                        <table class="am-table am-table-striped am-table-hover table-main">
                            <thead>
                            <tr>
                                <th class="table-title">Username</th><th class="table-title">Email</th><th class="table-type">Auth Group</th>
                                <th class="table-author am-hide-sm-only am-fr">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                                <td><?php echo ($v[username]); ?></td>
                                <td><?php echo ($v[email]); ?></td>
                                <td><?php echo ($v[title]); ?></td>
                                <td>
                                    <div class="am-btn-toolbar am-fr">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary" uid="<?php echo ($v[id]); ?>" onclick="edit_user(this)"><span class="am-icon-pencil-square-o" ></span> Edit</button>
                                                <div class="am-modal am-modal-confirm" tabindex="<?php echo ($v[id]); ?>" style="top:-15%;">
                                                    <div class="am-modal-dialog">
                                                        <div class="am-modal-hd">Edit User Info</div>
                                                        <div class="am-modal-bd">
                                                           <label style="display:inline;">Username:</label>
                                                           <input type="text" value="" class="am-modal-prompt-input" style="width:60%;display:inline;border:1px solid #9C9898;" value=<?php echo ($v[username]); ?>><br/><br/>
                                                           <label style="display:inline;">Password:</label>
                                                           <input type="password" class="am-modal-prompt-input" style="width:60%;display:inline;border:1px solid #9C9898;" value=<?php echo ($v[password]); ?>><br/><br/>
                                                           <label style="display:inline;margin-left:27px;">Email:</label>
                                                           <input type="email" value="" class="am-modal-prompt-input" style="width:60%;display:inline;border:1px solid #9C9898;" value=<?php echo ($v[email]); ?>><br/><br/>

                                                           <label>Auth Group</label> 
                                                                 <table style="width:60%;margin:12px auto;">
                                                                     <tr>
                                                                         <?php if(is_array($group_info)): $k = 0; $__LIST__ = $group_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($k % 2 );++$k; if(in_array(($vsub['title']), is_array($v[title])?$v[title]:explode(',',$v[title]))): ?><td align="left"><label class="am-checkbox" style="text-align:left;"><input type="checkbox" style="text-align:left;" data-am-ucheck checked value="<?php echo ($vsub['id']); ?>"><?php echo ($vsub['title']); ?></label></td>
                                                                         <?php else: ?>
                                                                             <td align="left"><label class="am-checkbox" style="text-align:left;"><input type="checkbox" style="text-align:left;" data-am-ucheck value="<?php echo ($vsub['id']); ?>"><?php echo ($vsub['title']); ?></label></td><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                                                     </tr>
                                                                 </table>
                                                        </div>
                                                        <div class="am-modal-footer">
                                                            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">OK</span>
                                                            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">Cancel</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" ruleId="<?php echo ($v[id]); ?>" onclick="delete_user(this)"><span class="am-icon-trash-o"></span> Delete</button>
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
</div>
<div class="am-modal am-modal-confirm" tabindex="add_user" id="add_user" style="top:-15%;">
    <div class="am-modal-dialog">
        <div class="am-modal-hd">New User/Admin</div>
        <div class="am-modal-bd">
           <label style="display:inline;">Username:</label>
           <input type="text" value="" class="am-modal-prompt-input" style="width:60%;display:inline;border:1px solid #9C9898;"><br/><br/>
           <label style="display:inline;">Password:</label>
           <input type="password" class="am-modal-prompt-input" style="width:60%;display:inline;border:1px solid #9C9898;"><br/><br/>
           <label style="display:inline;margin-left:27px;">Email:</label>
           <input type="email" value="" class="am-modal-prompt-input" style="width:60%;display:inline;border:1px solid #9C9898;"><br/><br/>         
            <label>Select Auth Group</label>
            <table style="width:60%;margin:12px auto;">
                <tr>
                    <?php if(is_array($group_info)): $k = 0; $__LIST__ = $group_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($k % 2 );++$k;?><td align="left"><label class="am-checkbox" style="text-align:left;"><input type="checkbox"  data-am-ucheck value="<?php echo ($vsub['id']); ?>" style="text-align:left;"><?php echo ($vsub['title']); ?></label></td><?php endforeach; endif; else: echo "" ;endif; ?>
                </tr>
            </table>
        </div>
        <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">OK</span>
            <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">Cancel</span>
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

    //新增权限组
    function edit_user(obj){
        var id=$(obj).attr('uid');
        var str=(".am-modal[tabindex='id']").replace("id",id);
        $(str).modal({
            relatedTarget: this,
            onConfirm: function(e) {
                var username=e.data['0'];
                var password=e.data['1'];
                var email=   e.data['2'];
                var group_ids=$(str+" input[type=checkbox]:checked").map(function(){return this.value}).get().join(',');
                $.post("<?php echo U('Admin/Rule/edit_user');?>",{id:id,username:username,email:email,group_ids:group_ids,password:password},function () {
                    window.location.href="<?php echo U('Admin/Rule/admin_user_list');?>";
                    });
            },
            onCancel: function(e) {
                e.close();
            }
        });

    }

    function add_user(obj){

        $("#add_user").modal({
            relatedTarget: this,
            onConfirm: function(e) {
                var group_ids=$("#add_user input[type=checkbox]:checked").map(function(){return this.value}).get().join(',');
                var username=e.data['0'];
                var password=e.data['1'];
                var email=   e.data['2'];
                $.post("<?php echo U('Admin/Rule/add_user');?>",{username:username,email:email,group_ids:group_ids,password:password},function (data) {
                    window.location.href="<?php echo U('Admin/Rule/admin_user_list');?>";
                });
            },
            onCancel: function(e) {
                e.close();
            }
        });

    }

    //删除用户并解绑
    function delete_user(obj) {
        var id=$(obj).attr('ruleId');
        if(confirm('Delete This User ?')){
            $.post("<?php echo U('Admin/Rule/delete_user');?>",{id:id},function (data) {
                window.location.href="<?php echo U('Admin/Rule/admin_user_list');?>";
            })
        }
    }

</script>
</body>
</html>