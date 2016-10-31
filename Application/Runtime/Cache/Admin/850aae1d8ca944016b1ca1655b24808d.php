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
    <style type="text/css">
        td{text-align: center}
    </style>
</head>
<body>


<!-- content start -->
<div class="admin-content">
    <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Personal Information</strong></div>
            <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger am-fr"  onclick="edit()">
                <span class="am-icon-pencil-square-o"></span>Reset Password</button>
        </div>
        <br>
        <div class="am-g">
            <div class="am-u-sm-6 am-u-sm-offset-3" >
                <form  class="am-form" name="pass" data-am-validator action="<?php echo U('Admin/Userinfo/save');?>">
                    <fieldset>
                        <legend>Password Reset</legend>
                        <div class="am-form-group">
                            <label for="doc-vld-name-2">Old Password：</label>
                            <input type="password" id="doc-vld-name-2" placeholder="Please input...." name="old_pass"required/>
                        </div>
                        <div class="am-form-group">
                            <label for="doc-vld-pwd-1">New Password：</label>
                            <input type="password" id="doc-vld-pwd-1" placeholder="Please input...." name="new_pass" required/>
                        </div>

                        <div class="am-form-group">
                            <label for="doc-vld-pwd-2">Confirm Password：</label>
                            <input type="password" id="doc-vld-pwd-2" placeholder="Please input...." data-equal-to="#doc-vld-pwd-1" required/>
                        </div>

                        <button class="am-btn am-btn-secondary" type="button" onclick="update()">提交</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- content end -->



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
    function update() {
        var old_pass=$("#doc-vld-name-2").val();
        if(old_pass=="<?php echo ($password); ?>"){
            document.pass.submit();

        }else
            alert('Old password is wrong');
    }
</script>
</body>
</html>