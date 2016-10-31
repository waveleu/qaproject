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

<div class="am-cf admin-main am-padding-top-0">


	<!-- content start -->
	<div class="admin-content">
		<div class="admin-content-body">
			<div class="am-cf am-padding am-padding-bottom-0">
				<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
			</div>
			<div class="am-g">
				<div class="am-u-sm-12">
					<form class="am-form">
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
							<tr>
								<th class="table-check"><input type="checkbox" /></th><th class="table-title">id</th></th><th class="table-title">pid</th></th><th class="table-title">权限名</th><th class="table-type">权限</th><th class="table-author am-hide-sm-only">操作</th>
							</tr>
							</thead>
							<tbody>
							<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
								<td><input type="checkbox" /></td>
								<td><?php echo ($v[id]); ?></td>
								<td><?php echo ($v[pid]); ?></td>
								<td><?php echo ($v['title']); ?></td>
								<td><?php echo ($v['name']); ?></td>
								<td>
									<div class="am-btn-toolbar">
										<div class="am-btn-group am-btn-group-xs">
											<button class="am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 添加子权限</button>
											<button class="am-btn am-btn-default am-btn-xs am-hide-sm-only"><span class="am-icon-copy" ></span> 修改</button>
											<button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
										</div>
									</div>
								</td>
							</tr><?php endforeach; endif; ?>
							</tbody>
						</table>

					</form>
				</div>

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