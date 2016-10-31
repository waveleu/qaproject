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


<div class="am-cf admin-main">
    <!-- sidebar start -->
    <div class="admin-sidebar am-offcanvas" id="admin-offcanvas">
    <div class="am-offcanvas-bar admin-offcanvas-bar" >
        <ul class="am-list admin-sidebar-list">
            <li><a href="<?php echo U('admin/testcase/index');?>"><span class="am-icon-home"></span> 首页</a></li>

            <li class="am-panel">
                <a data-am-collapse="{parent: '#collapase-nav-1', target: '#company-nav1'}">
                    <i class="am-icon-table am-margin-left-sm"></i> Case管理 <i class="am-icon-angle-right am-fr am-margin-right"></i>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub" id="company-nav1">
                    <li><a href="index.html" class="am-cf"><span class="am-icon-check"></span> Case列表</a></li>
                    <li><a href="admin-help.html"><span class="am-icon-puzzle-piece"></span> Case树形结构<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="admin-gallery.html"><span class="am-icon-th"></span> 分级管理<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                </ul>
            </li>
            <li class="am-panel">
                <a data-am-collapse="{parent: '#collapase-nav-1', target: '#company-nav2'}">
                    <i class="am-icon-table am-margin-left-sm"></i> 系统管理 <i class="am-icon-angle-right am-fr am-margin-right"></i>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub" id="company-nav2">
                    <li><a href="admin-user.html" class="am-cf"><span class="am-icon-check"></span> OS列表<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="admin-help.html"><span class="am-icon-puzzle-piece"></span> Version列表</a></li>
                    <li><a href="admin-gallery.html"><span class="am-icon-th"></span> BSP列表<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                    <li><a href="admin-gallery.html"><span class="am-icon-th"></span> OS_Version_ID管理<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                </ul>
            </li>
            <li class="am-panel">
                <a data-am-collapse="{parent: '#collapase-nav-1', target: '#company-nav3'}">
                    <i class="am-icon-table am-margin-left-sm"></i> 硬件管理 <i class="am-icon-angle-right am-fr am-margin-right"></i>
                </a>
                <ul class="am-list am-collapse admin-sidebar-sub" id="company-nav3">
                    <li><a href="admin-user.html" class="am-cf"><span class="am-icon-check"></span> 主板管理<span class="am-icon-star am-fr am-margin-right admin-icon-yellow"></span></a></li>
                    <li><a href="admin-help.html"><span class="am-icon-puzzle-piece"></span> 平台管理</a></li>
                    <li><a href="admin-gallery.html"><span class="am-icon-th"></span> Build管理<span class="am-badge am-badge-secondary am-margin-right am-fr">24</span></a></li>
                </ul>
            </li>
        </ul>

        <div class="am-panel am-panel-default admin-sidebar-panel">
            <div class="am-panel-bd">
                <p><span class="am-icon-bookmark"></span> 公告</p>
                <p>时光静好，与君语；细水流年，与君同。—— Amaze UI</p>
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
                            <button type="button" onclick="window.location.href='<?php echo U('admin/Testcase/add');?>'" class="am-btn am-btn-primary"><span class="am-icon-plus"></span> 新增</button>
                            <button type="button" class="am-btn am-btn-default"><span class="am-icon-save"></span> 保存</button>
                            <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
                        </div>
                    </div>
                </div>
                <div class="am-u-sm-12 am-u-md-3">
                    <div class="am-form-group">
                        <select id="js-select" placeholder="请选择OS" data-am-selected="{btnSize: 'sm'}" id="js-select">
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
                                <?php if(is_array($vo)): foreach($vo as $value=>$vosub): ?><td  id=<?php echo ($value); ?>   title="字段详细信息"  onmouseover="mOver(this)"><?php echo ($vosub); ?></td><?php endforeach; endif; ?>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" onclick="edit_btn('<?php echo ($vo[Case_ID]); ?>')" ><span class="am-icon-pencil-square-o" ></span> 编辑</button>
                                            <button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy"></span> 复制</button>
                                            <button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only" onclick="del_btn('<?php echo ($vo[Case_ID]); ?>')"><span class="am-icon-trash-o"></span> 删除</button>
                                        </div>
                                    </div>
                                </td>

                            </tr><?php endforeach; endif; ?>

                            </tbody>
                        </table>
                        <div><?php echo ($page); ?></div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© 2014 AllMobilize, Inc. Licensed under MIT license.</p>
</footer>

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

    function mOver(obj){
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
    }

    //编辑功能
    function edit_btn(casevalue) {

        var url=("<?php echo U('admin/Testcase/edit?Case_ID=value');?>").replace('value',casevalue);
        window.location.href=url;
    }
    //删除功能
    function del_btn(casevalue) {
        var url=("<?php echo U('admin/Testcase/del?Case_ID=value');?>").replace('value',casevalue);
        window.location.href=url;
    }

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
</body>
</html>