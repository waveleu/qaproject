<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>QA Homepage</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/png" href="/Amaze/Public/assets/i/favicon.png">
    <link rel="stylesheet" href="/Amaze/Public/assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="/Amaze/Public/assets/css/app.css"/>
    <script type="text/javascript" src="/Amaze/Public/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Amaze/Public/assets/js/amazeui.js"></script>

    <style>
        .get {
            background: #1E5B94;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        .get-title {
            font-size: 200%;
            border: 2px solid #fff;
            padding: 20px;
            display: inline-block;
        }

        .get-btn {
            background: #fff;
        }

        .detail {
            background: #fff;
        }

        .detail-h2 {
            text-align: center;
            font-size: 150%;
            margin: 40px 0;
        }

        .detail-h3 {
            color: #1f8dd6;
        }

        .detail-p {
            color: #7f8c8d;
        }

        .detail-mb {
            margin-bottom: 30px;
        }

        .hope {
            background: #0bb59b;
            padding: 50px 0;
        }

        .hope-img {
            text-align: center;
        }

        .hope-hr {
            border-color: #149C88;
        }

        .hope-title {
            font-size: 140%;
        }

        .about {
            background: #fff;
            padding: 40px 0;
            color: #7f8c8d;
        }

        .about-color {
            color: #34495e;
        }

        .about-title {
            font-size: 180%;
            padding: 30px 0 50px 0;
            text-align: center;
        }

        .footer p {
            color: #7f8c8d;
            margin: 0;
            padding: 15px 0;
            text-align: center;
            background: #2d3e50;
        }
    </style>
</head>
<body>
<header class="am-topbar am-topbar-fixed-top">
    <div class="am-container">
        <h1 class="am-topbar-brand">
            <a href="#">QA Web</a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-secondary am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}"><span class="am-sr-only">导航切换</span> <span
                class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li class="am-active"><a href="#">首页</a></li>
                <li><a href="#">QA介绍</a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        硬件管理 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li class="am-dropdown-header">标题</li>
                        <li><a href= "<?php echo U('admin/testcase/index');?>">1. 主板管理</a></li>
                        <li><a href="#">2. OS管理 </a></li>
                        <li><a href="#">3. GPU管理</a></li>
                        <li><a href="<?php echo U('admin/login/check');?>">4. 平台管理</a></li>
                    </ul>
                </li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        硬件管理 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li class="am-dropdown-header">标题</li>
                        <li><a href="#">1. 主板管理</a></li>
                        <li><a href="#">2. OS管理 </a></li>
                        <li><a href="#">3. GPU管理</a></li>
                        <li><a href="<?php echo U('admin/login/check');?>">4. 平台管理</a></li>
                    </ul>
                </li>
            </ul>

            <div class="am-topbar-right">
                <button class="am-btn am-btn-secondary am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span> 注册</button>
            </div>

            <div class="am-topbar-right">
                <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> 登录</button>
            </div>
            <div class="am-topbar-right">
                <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm" data-am-offcanvas="{target: '#doc-oc-demo2', effect: 'push'}"><span class="am-icon-weibo"></span> 点击显示侧边栏</button>

            </div>
        </div>
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
<hr class="am-article-divider"/>
<div class="am-g am-g-fixed">
    <header class="am-g my-head">
        <div class="am-u-sm-12 am-article">
            <h1 class="am-article-title">Case信息</h1>
            <p class="am-article-meta">查看，修改，添加</p>
        </div>
    </header>
    <hr class="am-article-divider"/>

    <div class="am-u-md-12 ">
        <form class="am-form" action="<?php echo U('admin/Testcase/save');?>" method="post" enctype="multipart/form-data">
            <?php if(is_array($testcase_info)): foreach($testcase_info as $k=>$item): ?><div class="am-form-group am-form-horizontal am-form-error">
                <label for=<?php echo ($k); ?> class="am-u-sm-2 am-form-label"><?php echo ($k); ?></label>
                <div class="am-u-sm-10">
                    <input type="text" class="am-form-field " id=<?php echo ($k); ?> placeholder="请输入" value=<?php echo ($item); ?> >
                </div>
            </div><?php endforeach; endif; ?>
            <br>
            <div  class="am-form-group-inline am-form-horizontal am-cf ">
                <div class="am-u-sm-1 am-u-sm-offset-6 ">
                    <button class="am-btn am-btn-primary" type="submit">提交</button>
                </div>
                <div class="am-fl">
                    <button class="am-btn am-btn-danger" type="reset">重置</button>
                </div>
            </div>
        </form >

    </div>


</div>

<script>
    function iFrameHeight() {
        var ifm= document.getElementById("iframepage");
        var subWeb = document.frames ? document.frames["iframepage"].document : ifm.contentDocument;
        if(ifm != null && subWeb != null) {
            ifm.height = subWeb.body.scrollHeight;
        }
    }
</script>

<footer class="my-footer">
    <p>sidebar template<br><small>© Copyright ©2014-2016 GoCMS版权所有</small></p>
</footer>
</body>