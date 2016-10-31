<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE> ZTREE DEMO - awesome 风格</TITLE>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!-- Include font-awesome here, CDN is ok, or locally installed by bower to your project -->

	<link rel="stylesheet" href="/Amaze/Public/ztree/css/demo.css" type="text/css">
	<link rel="stylesheet" href="/Amaze/Public/ztree/css/awesomeStyle/awesome.css" type="text/css">
	<script type="text/javascript" src="/Amaze/Public/assets/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Amaze/Public/ztree/js/jquery.ztree.core.js"></script>
	<script type="text/javascript" src="/Amaze/Public/ztree/js/jquery.ztree.excheck.js"></script>
	<script type="text/javascript" src="/Amaze/Public/ztree/js/jquery.ztree.exedit.js"></script>
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="icon" type="image/png" href="/Amaze/Public/assets/i/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="/Amaze/Public/assets/i/app-icon72x72@2x.png">
	<link rel="stylesheet" href="/Amaze/Public/assets/css/amazeui.min.css"/>
	<link rel="stylesheet" href="/Amaze/Public/assets/css/admin.css">
	<SCRIPT type="text/javascript">
		<!--
		var setting = {
			view: {
				dblClickExpand: false
			},
			check: {
				enable: true
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			edit: {
				enable: true,
				showRemoveBtn: showRemoveBtn,
				showRenameBtn: showRenameBtn
			},
			callback: {
				onRightClick: OnRightClick,
				beforeEditName: beforeEditName,
				beforeRemove: beforeRemove,
			}
		};

		var zNodes =[];
		$.each(<?php echo ($class); ?>,function (k,v) {
			if(v.id<10)
				var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:true,isParent:true};
			else
				var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:false,isParent:true};
			zNodes.push(temp);
		})
		$.each(<?php echo ($data); ?>,function (k,v) {
			var temp={id:10000+v.id,pId:v.pid,name:""+v.CaseName,open:false};
			zNodes.push(temp);
		})

		function beforeEditName(treeId, treeNode) {
			$("#edit_add_class").modal({
				relatedTarget:this,
				onConfirm:function (e) {
					$.post("<?php echo U('Admin/class/edit');?>",
							{id:treeNode.id,name:e.data},
							function () {
								location.href="<?php echo U('Admin/testcase/index');?>";
							});
				},
				onCancel:function (e) {
					e.close();
				}
			});
		}
		function beforeRemove(treeId, treeNode) {
			className = (className === "dark" ? "":"dark");
			showLog("[ "+getTime()+" beforeRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.selectNode(treeNode);
			alert(treeNode.id);
			return confirm("确认删除 节点 -- " + treeNode.name + " 吗？");
		}
		function showRemoveBtn(treeId, treeNode) {
			return true;
		}
		function showRenameBtn(treeId, treeNode) {
			return true;
		}

		function OnRightClick(event, treeId, treeNode) {
			if (!treeNode && event.target.tagName.toLowerCase() != "button" && $(event.target).parents("a").length == 0) {
				zTree.cancelSelectedNode();
				showRMenu("root", event.clientX, event.clientY);
			} else if (treeNode && !treeNode.noR) {
				zTree.selectNode(treeNode);
				showRMenu("node", event.clientX, event.clientY);
			}
		}

		function showRMenu(type, x, y) {
			$("#rMenu ul").show();
			if (type=="root") {
				$("#m_del").hide();
				$("#m_check").hide();
				$("#m_unCheck").hide();
			} else {
				$("#m_del").show();
				$("#m_check").show();
				$("#m_unCheck").show();
			}
			rMenu.css({"top":y+"px", "left":x+"px", "visibility":"visible"});

			$("body").bind("mousedown", onBodyMouseDown);
		}
		function hideRMenu() {
			if (rMenu) rMenu.css({"visibility": "hidden"});
			$("body").unbind("mousedown", onBodyMouseDown);
		}
		function onBodyMouseDown(event){
			if (!(event.target.id == "rMenu" || $(event.target).parents("#rMenu").length>0)) {
				rMenu.css({"visibility" : "hidden"});
			}
		}


		var zTree, rMenu;
		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
			zTree = $.fn.zTree.getZTreeObj("treeDemo");
			rMenu = $("#rMenu");
		});
		//-->
	</SCRIPT>
	<style type="text/css">
		div#rMenu {position:absolute; visibility:hidden; top:0;text-align: left;padding: 2px;}
		div#rMenu ul li{
			margin: 1px 0;
			padding: 0 5px;
			cursor: pointer;
			list-style: none outside none;
			background-color: #DFDFDF;
		}
	</style>
</HEAD>

<BODY>
<h1>右键菜单的实现</h1>
<h6>[ 文件路径: super/rightClickMenu.html ]</h6>
<div class="content_wrap">
	<div class="zTreeDemoBackground left">
		<ul id="treeDemo" class="ztree"></ul>
	</div>
	<div class="right">
		<ul class="info">
			<li class="title"><h2>实现方法说明</h2>
				<ul class="list">
					<li>利用 beforeRightClick / onRightClick 事件回调函数简单实现的右键菜单</li>
					<li class="highlight_red">Demo 中的菜单比较简陋，你完全可以配合其他自定义样式的菜单图层混合使用</li>
				</ul>
			</li>
		</ul>
	</div>
</div>
<div id="rMenu">
	<ul>
		<li id="m_add" onclick="add_class();">Add subfolder</li>
		<li id="m_del" onclick="del_class();">Delete folder</li>
		<li id="m_check" onclick="edit_class();">Edit folder</li>
		<li id="m_unCheck" onclick="add_case();">Add Case</li>
		<li id="m_reset" onclick="assign_task();">Assign Task</li>
	</ul>
</div>
</BODY>
</HTML>