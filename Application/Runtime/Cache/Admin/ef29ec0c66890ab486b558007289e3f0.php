<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html  class="no-js">
<head>
    <meta charset="utf-8">
    <title>QA WEB System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/qaweb/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/qaweb/Public/assets/css/admin.css">
</head>
<style>
</style>
<body>
<header class="am-topbar am-topbar-inverse admin-header" style="background-color: #BF2126">
    <div class="am-topbar-brand" style="background-color: white" >
        <img src="/qaweb/Public/Images/logo.png" style="height: 64%;">
    </div>
    <div class="am-topbar-brand"  >
        <strong><a href=<?php echo U('admin/Index/index');?>>QA Web System</a></strong> <small><a href=<?php echo U('admin/testcase/index');?>></a></small>
    </div>
    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="<?php echo U('admin/ExpAndImp/ExpTestcase');?>"><span class="am-icon-download"></span> Export </a></li>
            <li><a href="<?php echo U('Admin/Login/logout');?>"><span class="am-icon-power-off"></span> Logout</a></li>
            <li><a href="<?php echo U('Admin/Userinfo/index');?>" target="right-content"><span class="am-icon-users"></span> Personal Info</a></li>
        </ul>
    </div>
</header>


<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas" style="width:17%;">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <?php if(is_array($data)): foreach($data as $key=>$v): if(empty($v['_data'])): ?><li><a href="<?php echo U($v['mca']);?>" class="am-cf" target="right-content" title=<?php echo ($v['mca']); ?>><span class=<?php echo ($v[ico]); ?>></span> <?php echo ($v['name']); ?></a></li>
                <?php else: ?>
                <?php $tmp= "{target:"."'#".$v['id']."'}"; ?>
                <li class="admin-parent"><a data-am-collapse=<?php echo ($tmp); ?>  title=<?php echo ($v['mca']); ?>>
                    <span class=<?php echo ($v['ico']); ?>></span> <?php echo ($v['name']); ?> <span class="am-icon-angle-right am-fr"></span></a>
                    <ul id=<?php echo ($v['id']); ?> class="am-list am-collapse admin-sidebar-sub " >
                        <?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): if(empty($n['_data'])): ?><li><a href="<?php echo U($n['mca']);?>" class="am-cf" target="right-content" title=<?php echo ($n['mca']); ?>><span class=<?php echo ($n['ico']); ?>></span> <?php echo ($n['name']); ?></a></li>
                        <?php else: ?>
                        <?php $tmpp= "{target:"."'#".$n['id']."'}"; ?>
                        <li class="admin-parent"><a data-am-collapse=<?php echo ($tmpp); ?>  title=<?php echo ($n['mca']); ?>>
                            <span class=<?php echo ($n['ico']); ?>></span> <?php echo ($n['name']); ?> <span class="am-icon-angle-right am-fr"></span></a>
                            <ul id=<?php echo ($n['id']); ?> class="am-list am-collapse admin-sidebar-sub" >
                                <?php if(is_array($n['_data'])): foreach($n['_data'] as $key=>$nsub): ?><li><a href="<?php echo U($nsub['mca']);?>" class="am-cf" target="right-content" title=<?php echo ($nsub['mca']); ?>><span class=<?php echo ($nsub[ico]); ?>></span> <?php echo ($nsub['name']); ?></a></li><?php endforeach; endif; ?>
                            </ul>
                        </li><?php endif; endforeach; endif; ?>
                    </ul>
                </li><?php endif; endforeach; endif; ?>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> Notice</p>
                    <p>
                        Welcome to QA Web!
                    </p>
                </div>
            </div>

        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <iframe name="right-content" src="" id="iframepage" width="100%"  height="900px" align="left" style="overflow-x:auto;margin-top:0px;padding-top: 0px"></iframe>
        </div>
    </div>
    <!-- content end -->
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
/*$(document).ready(function(){
   	$(".am-icon-angle-right").click(function(){
	   $(this).addClass("am-icon-angle-down").siblings().removeClass("am-icon-angle-right");	
	})
})*/
</script>
</body>
</html>