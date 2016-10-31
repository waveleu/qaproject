<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html  class="no-js">
<head>
    <meta charset="utf-8">
    <title>Amaze UI Admin table Examples</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/Amaze/Public/assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/Amaze/Public/assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/Amaze/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Amaze/Public/assets/css/admin.css">
    <script src="/Amaze/Public/assets/js/amazeui.min.js"></script>
    <script src="/Amaze/Public/assets/js/app.js"></script>
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<header class="am-topbar am-topbar-inverse admin-header">
    <div class="am-topbar-brand">
        <strong>Amaze UI<a href=<?php echo U('admin/testcase/index');?>></a></strong> <small><a href=<?php echo U('admin/testcase/index');?>></a>后台管理模板</small>
    </div>
    <!--<div class="am-topbar-btn">
        <button class="am-btn am-btn-primary" data-am-offcanvas="{target: '#admin-offcanvas', effect: 'push'}">点击显示侧边栏</button>
    </div>-->

    <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only" data-am-collapse="{target: '#topbar-collapse'}"><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

    <div class="am-collapse am-topbar-collapse" id="topbar-collapse">

        <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list">
            <li><a href="javascript:;"><span class="am-icon-envelope-o"></span> 收件箱 <span class="am-badge am-badge-warning">5</span></a></li>
            <li><a href="<?php echo U('admin/ExpAndImp/ExpTestcase');?>"><span class="am-icon-envelope-o"></span> 导出 <span class="am-badge am-badge-warning">5</span></a></li>

            <li class="am-dropdown" data-am-dropdown>
                <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                    <span class="am-icon-users"></span> 管理员 <span class="am-icon-caret-down"></span>
                </a>
                <ul class="am-dropdown-content">
                    <li><a href="#"><span class="am-icon-user"></span> 资料</a></li>
                    <li><a href="#"><span class="am-icon-cog"></span> 设置</a></li>
                    <li><a href="#"><span class="am-icon-power-off"></span> 退出</a></li>
                </ul>
            </li>
            <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
        </ul>
    </div>
</header>

<body >
<style>
    @media only screen and (min-width: 641px) {
        .am-offcanvas {
            display: block;
            position: relative;
            background: none;
        }

        .am-offcanvas-bar {
            position: relative;
            width: auto;
            background: none;
            -webkit-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }
        .am-offcanvas-bar:after {
            content: none;
        }

    }

    @media only screen and (max-width: 640px) {
        .am-offcanvas-bar .am-nav>li>a {
            color:#ccc;
            border-radius: 0;
            border-top: 1px solid rgba(0,0,0,.3);
            box-shadow: inset 0 1px 0 rgba(255,255,255,.05)
        }

        .am-offcanvas-bar .am-nav>li>a:hover {
            background: #404040;
            color: #fff
        }

        .am-offcanvas-bar .am-nav>li.am-nav-header {
            color: #777;
            background: #404040;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.05);
            text-shadow: 0 1px 0 rgba(0,0,0,.5);
            border-top: 1px solid rgba(0,0,0,.3);
            font-weight: 400;
            font-size: 75%
        }

        .am-offcanvas-bar .am-nav>li.am-active>a {
            background: #1a1a1a;
            color: #fff;
            box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
        }

        .am-offcanvas-bar .am-nav>li+li {
            margin-top: 0;
        }
    }

    .my-head {
        margin-top: 10px;
        text-align: center;
    }

    .my-button {
        position: fixed;
        top: 0;
        right: 0;
        border-radius: 0;
    }
    .my-sidebar {
        right: 1300px;
        padding-right: 0;
        border-right: 1px solid #eeeeee;

    }

    .my-footer {
        border-top: 1px solid #eeeeee;
        padding: 10px 0;
        margin-top: 10px;
        text-align: center;
    }
</style>
<div class="admin-content">
    <div class="admin-content-body">
        <div class="container">
            <div class="am-g">
                <header class="am-g my-head">
                    <div class="am-u-md-9 am-article">
                        <hr>
                        <h1 class="am-article-title">Case信息</h1>
                        <p class="am-article-meta">查看，修改，添加</p>
                    </div>
                </header>
                <hr class="am-article-divider"/>

                <div class="am-u-md-4">
                    <form action="<?php echo U('ExpAndImp/upload');?>" method="post" enctype="multipart/form-data">
                        <div class="am-form-inline  am-u-md-offset-4 ">
                            <input type="file" class="am-form-field" name="excelData" >
                            <button class="am-btn am-btn-primary am-radius" type="submit">提交</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


﻿
<!-- 脚部 start -->
    <div class="footer">
        <p>© 2016 <a href="http://www.verisilicon.com/" target="_blank">VeriSilicon, Inc.</a>Copyright ©2014-2016 芯原版权所有</p>
    </div>
    <!-- 脚部 end -->
  </body>
</html>