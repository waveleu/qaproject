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

<div class="am-cf admin-main">


    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-6">
                    <div id="haha">
                        <div class="am-dropdown" id="aha">
                            <button class="am-btn am-btn-default am-text-secondary am-dropdown-toggle am-text-danger" ><span class="am-icon-pencil-square-o"></span>添加权限 <span class="am-icon-caret-down"></span></button>
                            <div class="am-dropdown-content">
                                <li class="am-dropdown-header">添加权限</li>
                                <li ><input type="checkbox" /> 选项1 <input type="checkbox" /> 选项2 <input type="checkbox" /> 选项3 </li>
                                <li><input type="checkbox" /> 选项1 <input type="checkbox" /> 选项2 <input type="checkbox" /> 选项3 </li>
                                <li><input type="checkbox" /> 选项1 <input type="checkbox" /> 选项2 <input type="checkbox" /> 选项3 </li>
                            </div>
                        </div>
                    </div>
                    <div class="am-dropdown" data-am-dropdown>
                        <button class="am-btn am-btn-primary am-dropdown-toggle" data-am-dropdown-toggle>下拉列表 <span class="am-icon-caret-down"></span></button>
                        <ul class="am-dropdown-content">
                            <li class="am-dropdown-header">标题</li>
                            <li><a href="#">快乐的方式不只一种</a></li>
                            <li class="am-active"><a href="#">最荣幸是</a></li>
                            <li><a href="#">谁都是造物者的光荣</a></li>
                            <li class="am-disabled"><a href="#">就站在光明的角落</a></li>
                            <li class="am-divider"></li>
                            <li><a href="#">天空海阔 要做最坚强的泡沫</a></li>
                        </ul>
                    </div>
                </div>

                <script>
                    (function () {
                        $("#aha").dropdown({justify:"#haha"});
                    });
                </script>
            </div>
        </div>
    </div>
    <!-- content end -->
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


</body>
</html>