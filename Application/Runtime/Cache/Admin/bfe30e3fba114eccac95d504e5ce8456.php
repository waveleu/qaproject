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
				<div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">Auth Group</strong> </div>

			</div>
			<div class="am-g">
				<div class="am-u-sm-12">
					<form class="am-form">
						<div class="am-fr am-cf"><button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger" ruleId="<?php echo ($v['id']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="add_group()">
							<span class="am-icon-pencil-square-o"></span> New Group</button></div>
						<table class="am-table am-table-striped am-table-hover table-main">
							<thead>
							<tr>
								<th class="table-title">Group Name</th><th class="table-author am-hide-sm-only am-fr">Operation</th>
							</tr>
							</thead>
							<tbody>
							</tr>
							<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
								<td><?php echo ($v['title']); ?></td>
								<td>
									<div class="am-btn-toolbar am-fr">
									<div class="am-btn-group am-btn-group-xs">
									<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" ruleId="<?php echo ($v['id']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="rename(this)">
										<span class="am-icon-pencil-square-o"></span> Rename</button>

										<div class="am-modal am-modal-prompt" tabindex="-1" id="<?php echo ($v['id']); ?>" style="top:-30%;">
											<div class="am-modal-dialog">
												<div class="am-modal-hd">Rename</div>
												<div class="am-modal-bd">
													<label>Please Input new Group Name</label>
													<input type="text" class="am-modal-prompt-input" value="<?php echo ($v['title']); ?>" style="width:400px;color:#000;border:1px solid #9C9898;">
												</div>
												<div class="am-modal-footer">
													<span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
													<span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
												</div>
											</div>
										</div>

									<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger" ruleId="<?php echo ($v['id']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="del(this)">
										<span class="am-icon-trash-o"></span> Delete</button>

									<div class="am-dropdown" data-am-dropdown >
									 <button class="am-btn  am-btn-default am-btn-xs am-text-secondary am-text-danger am-dropdown-toggle" data-am-dropdown-toggle><span class="am-icon-pencil-square"></span> Edit Rules <span class="am-icon-caret-down"></span></button>
									  <ul class="am-dropdown-content" style="width:800px;" id=<?php echo ($v['title']); ?>>
										    <li class="am-dropdown-header" style="text-align: center;font-size:20px;">Title</li>
										    <li>
											    <table style="width:700px;margin:12px auto;margin-left:60px;">
													<?php if(is_array($v['titles'])): $k = 0; $__LIST__ = $v['titles'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($k % 2 );++$k; if($k%5==1): ?><tr><?php endif; ?>
															<?php if($vsub['flag']==1): ?><td><label class="am-checkbox"><input type="checkbox" data-am-ucheck checked value=<?php echo ($vsub[id]); ?>><?php echo ($vsub[name]); ?></label></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<?php else: ?>
																<td><label class="am-checkbox"><input type="checkbox" data-am-ucheck value=<?php echo ($vsub[id]); ?>><?php echo ($vsub[name]); ?></label></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
														<?php if($k%7==7): ?></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
												</table>
												<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" ruleId="<?php echo ($v['id']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="edit(this)" style="margin:0 0 10px 47%;">
													<span class="am-icon-pencil-square-o"></span> OK</button>
												<!--<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary am-text-danger" ruleId="<?php echo ($v['id']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="">
													<span class="am-icon-trash-o"></span>Cancel</button>-->
											</li>
										</ul>
									</div>
									<div class="am-modal am-modal-prompt" tabindex="-1" id="<?php echo ($v['name']); ?>" >
										<div class="am-modal-dialog">
											<div class="am-modal-hd">New Group</div>
											<div class="am-modal-bd">
												<div class="am-form-group ">
													<label >Choose</label>
													<table>
														<?php if(is_array($group_info)): $k = 0; $__LIST__ = $group_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($k % 2 );++$k; if($k%4==1): ?><tr><?php endif; ?>
																<?php if(in_array(($vs['id']), is_array($v['uids'])?$v['uids']:explode(',',$v['uids']))): ?><td><label class="am-checkbox"><input type="checkbox" value="<?php echo ($vs['id']); ?>" data-am-ucheck checked><?php echo ($vs[username]); ?></label></td>
																<?php else: ?>
																	<td><label class="am-checkbox"><input type="checkbox" value="<?php echo ($vs['id']); ?>" data-am-ucheck><?php echo ($vs[username]); ?></label></td><?php endif; ?>
															<?php if($k%4==4): ?></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
													</table>
												</div>
											</div>
											<div class="am-modal-footer">
												<span class="am-modal-btn" data-am-modal-confirm style="width: 50%">OK</span>
												<span class="am-modal-btn" data-am-modal-cancel style="width: 50%">Cancel</span>
											</div>
										</div>
									</div>
									</div>
									</div>
								</td>
							</tr><?php endforeach; endif; ?>

							</tbody>
						</table>
					</form>
					<div class="am-modal am-modal-prompt" tabindex="-1" id="add_group" style="top:-20%;">
						<div class="am-modal-dialog">
							<div class="am-modal-hd">New Group</div>
							<div class="am-modal-bd">
								<label>Please Input new Group Name</label>
								<input type="text" class="am-modal-prompt-input" value="" style="width:400px;color:#000;border:1px solid #9C9898;"><br/>

								<div class="am-form-group ">
									<label >Choose</label>
									<table style="width:80%;margin:12px auto;">
										<?php if(is_array($rule_info)): $k = 0; $__LIST__ = $rule_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vsub): $mod = ($k % 2 );++$k; if($k%4==1): ?><tr><?php endif; ?>
												<td align="left"><label class="am-checkbox" style="text-align:left;"><input type="checkbox" value=<?php echo ($vsub['id']); ?> data-am-ucheck style="text-align:left;"><?php echo ($vsub[title]); ?></label></td>
											<?php if($k%4==4): ?></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
									</table>
								</div>
							</div>
                            <div class="am-modal-footer">
                                <span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">Ok</span>
                                <span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
                            </div>
						</div>
					</div>
				</div>
			</div>
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

	//修改权限组拥有权限
	function edit(obj) {
		var str=$(obj).attr('ruletitle');
		var rules=$("#"+str+' input[type=checkbox]:checked').map(function(){return this.value}).get().join(',');
		$.post("<?php echo U('Admin/rule/edit_group');?>",{rules:rules,id:$(obj).attr('ruleId')},function (rule_data) {
			location.href="<?php echo U('Admin/Rule/group');?>";
		})

	}

	//删除权限组
	function del(obj) {
		var id=$(obj).attr('ruleId');
		if(confirm('Delete This Group ?'))
			location.href=("<?php echo U('Admin/Rule/delete_group',array('id'=>vid));?>").replace('vid',id);
	}

	// 添加菜单
	function add_member(obj){
		var ruleId=$(obj).attr('ruleId');
		var ruleName="#"+$(obj).attr('ruleTitle');
		$(ruleName).modal({
			relatedTarget: this,
			onConfirm: function(e) {
					var uids=$(ruleName+' input[type=checkbox]:checked').map(function(){return this.value}).get().join(',');
					$.post("<?php echo U('Admin/Rule/group_re_assign');?>",{group_id:ruleId,uids:uids},function (data) {
						$.each(data,function (key,value) {
							alert(value);
						})
						location.href="<?php echo U('Admin/Rule/group');?>";
					});

			},
			onCancel: function(e) {
				e.close();
			}
	});


}

	// 修改权限名
	function rename(obj){
	var ruleId=$(obj).attr('ruleId');
	var ruletitle=$(obj).attr('ruletitle');
	var str=("#a").replace('a',ruleId);
	$(str).modal({
		relatedTarget: this,
		onConfirm: function(e) {
			var tmp="<?php echo U('admin/rule/edit_group',array(title=>title_name,'id'=>vid));?>";
			tmp=tmp.replace('title_name',e.data).replace('vid',ruleId);
			window.location.href=tmp;
		},
		onCancel: function(e) {
			e.close();
		}
	});

	}

	//新增权限组
	function add_group(){
		$("#add_group").modal({
			relatedTarget: this,
			onConfirm: function(e) {
				var rules=$("#add_group input[type=checkbox]:checked").map(function(){return this.value}).get().join(',');
				var title=e.data;
				if(rules==""||title==""){
					alert("请输入完整信息");
				}
				else{
					$.post("<?php echo U('Admin/Rule/add_group');?>",{title:title,rules:rules},function (data) {
						location.href="<?php echo U('Admin/Rule/group');?>";
					});
				}
			},
			onCancel: function(e) {
				e.close();
			}
		});
	}

	//
</script>
</body>
</html>