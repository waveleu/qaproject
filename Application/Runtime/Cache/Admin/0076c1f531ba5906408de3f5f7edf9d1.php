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
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
        <div class="am-offcanvas-bar admin-offcanvas-bar">
            <ul class="am-list admin-sidebar-list">
                <li><a href="admin-index.html"><span class="am-icon-home"></span> 首页</a></li>
                <li class="admin-parent">
                    <a class="am-cf" data-am-collapse="{target: '#collapse-nav'}"><span class="am-icon-file"></span> 页面模块 <span class="am-icon-angle-right am-fr am-margin-right"></span></a>
                    <ul class="am-list am-collapse admin-sidebar-sub am-in" id="collapse-nav">
                        <li><a href="admin-user.html" class="am-cf"><span class="am-icon-check"></span> 个人资料<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                        <li><a href="admin-help.html"><span class="am-icon-puzzle-piece"></span> 帮助页</a></li>
                        <li><a href="admin-gallery.html"><span class="am-icon-th"></span> 相册页面<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                        <li><a href="admin-log.html"><span class="am-icon-calendar"></span> 系统日志</a></li>
                        <li><a href="admin-404.html"><span class="am-icon-bug"></span> 404</a></li>
                    </ul>
                </li>
                <li><a href="admin-table.html"><span class="am-icon-table"></span> 表格</a></li>
                <li><a href="admin-form.html"><span class="am-icon-pencil-square-o"></span> 表单</a></li>
                <li><a href="#"><span class="am-icon-sign-out"></span> 注销</a></li>
            </ul>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-bookmark"></span> 公告</p>
                    <p>Verisilicon</p>
                </div>
            </div>

            <div class="am-panel am-panel-default admin-sidebar-panel">
                <div class="am-panel-bd">
                    <p><span class="am-icon-tag"></span> wiki</p>
                    <p>Welcome to the Amaze UI wiki!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- sidebar end -->

    <!-- content start -->
    <div class="admin-content">
        <div class="admin-content-body">
            <div class="am-cf am-padding am-padding-bottom-0">
                <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
            </div>

            <hr>

            <div class="am-g">
                <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <button type="button" onclick="window.location.href='<?php echo U('admin/Testcase/add');?>'" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
                            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
                            <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
                        </div>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-form-group">
                        <select id="js-select" placeholder="请选择OS" data-am-selected="{btnSize: 'sm'}">
                            <option selected value=""></option>
                            <option value="option2">所有类别</option>
                            <?php if(is_array($OS_list)): foreach($OS_list as $key=>$vo): ?><option value=<?php echo ($vo); ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-input-group am-input-group-sm">
                        <input type="text" class="am-form-field">
                        <span class="am-input-group-btn">
                            <button class="am-btn am-btn-default" type="button">搜索</button>
                        </span>
                    </div>
                </div>
            </div>

            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main" >
                            <thead>
                            <tr>
                                <th class="table-check"><input type="checkbox"/></th><?php if(is_array($testcase_name_list)): foreach($testcase_name_list as $key=>$vo): ?><th class=<?php echo ($vo); ?>><?php echo ($vo); ?></th><?php endforeach; endif; ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($testcase_list)): foreach($testcase_list as $key=>$vo): ?><tr>
                                <td class="table-check"><input type="checkbox"/></td>
                                <?php if(is_array($vo)): foreach($vo as $value=>$vosub): ?><td  id=<?php echo ($value); ?>   title="字段详细信息"  onmouseover="mOver(this)"><?php echo ($vosub); ?></td>
                                <script>function mOver(obj){
                                    if(obj.id=="OS")
                                    {
                                        $.post("<?php echo U('admin/testcase/ossearch');?>",{OS:obj.innerHTML},function(OS_list){
                                            var str=new Array(3);
                                            var i=0;
                                            $.each(OS_list,function(key,item){
                                                str[i++]=key+" ： "+item;
                                            });
                                            obj.title=str.join("\n");
                                        });
                                    }
                                }</script><?php endforeach; endif; ?>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="button_edit()"><span class="am-icon-pencil-square-o" ></span> 编辑</button>
                                            <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button>
                                            <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                                        </div>
                                    </div>
                                </td>
                            </tr><?php endforeach; endif; ?>

                            </tbody>
                        </table>
                        <div class="am-cf">
                            <a href="/ExpAndImp/index.php/admin/Testcase/edit/Case_ID/1">共 15 条记录</a>
                            <div class="am-fr">
                                <ul class="am-pagination">
                                    <li class="am-disabled"><a href="<?php echo U('admin/Testcase/edit?Case_ID=1');?>">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>
                        <hr />
                        <p>注：.....</p>
                    </form>
                </div>

            </div>
        </div>

        <footer class="admin-content-footer">
            <hr>
            <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
        </footer>

    </div>
    <!-- content end -->
</div>




<script>
    $(function () {

        //分级下拉菜单跳转
        $("#js-select").change(function () {
            var os_selected=$(this).find('option:selected').text();
            if(os_selected=='所有类别')
            {
                window.location.href="<?php echo U('admin/Testcase/index');?>";
            }
            else
            {
                var str=("<?php echo U('admin/Testcase/index?search_OS=os_selected');?>").replace('os_selected',os_selected);
                window.location.href=str;
            }

        });

        //跳转新增页面
        $("#add_new").onclick(function () {

        });
    });
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