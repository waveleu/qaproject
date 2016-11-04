<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<HTML>
<HEAD>
	<TITLE> TestCase Index</TITLE>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!-- Include font-awesome here, CDN is ok, or locally installed by bower to your project -->

	<link rel="stylesheet" href="/qaweb/Public/ztree/css/demo.css" type="text/css">
	<link rel="stylesheet" href="/qaweb/Public/ztree/css/awesomeStyle/awesome.css" type="text/css">
	<script type="text/javascript" src="/qaweb/Public/assets/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.core.js"></script>
	<script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.excheck.js"></script>
	<script type="text/javascript" src="/qaweb/Public/ztree/js/jquery.ztree.exedit.js"></script>
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="icon" type="image/png" href="/qaweb/Public/assets/i/favicon.png">
	<link rel="stylesheet" href="/qaweb/Public/assets/css/amazeui.min.css"/>
	<link rel="stylesheet" href="/qaweb/Public/assets/css/admin.css">
	<SCRIPT type="text/javascript">
		var setting = {
			view: {
				dblClickExpand: true
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
				beforeDrag: beforeDrag,
				onRightClick: OnRightClick,
				beforeEditName: beforeEditName,
				beforeRemove: beforeRemove,
				onDrop:onDrop,
				onClick:onClick,
			}
		};

		var zNodes =[{id:0,pId:0,name:'root',open:true,isParent:true}];
		$.each(<?php echo ($class); ?>,function (k,v) {
			if(v.id<10)
				var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:true,isParent:true};
			else if(v.id>999&&v.id<10000)
				var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:false,isParent:true};
			else
				var temp={id:v.id,pId:v.pid,name:""+v.name+"("+v.count+")",open:false,isParent:true};
			zNodes.push(temp);
		});
		$.each(<?php echo ($data); ?>,function (k,v) {
			var temp={id:v.id+1000-1000,pId:v.pid,name:""+v.CaseName,open:true,isParent:false};
			zNodes.push(temp);
		});

		function beforeDrag(treeId, treeNodes) {
			return true;
		}
		function onDrop(event, treeId, treeNodes, targetNode, moveType, isCopy) {
			$.post("<?php echo U('Admin/Class/drop_edit');?>", {pid:targetNode,id:treeNodes}, function (data) {
				location.reload()
			});
		}
		function beforeEditName(treeId, treeNode) {
			var id=treeNode.id/10000;
			var str=("<?php echo U('Admin/Testcase/edit',array('id'=>vid,'flag'=>true));?>").replace('vid',id);
				$("#edit_page").empty().append('<iframe name="right-content" src='+str+' id="iframepage"  width="100%"  height="800px" align="left" style="margin-top: 0px;padding-top: 0px"></iframe>');
			return false;
		}
		function beforeRemove(treeId, treeNode) {
			var isDel=false;
			$("#del_modal").modal({
				relatedTarget:this,
				onConfirm:function () {
					$.post("<?php echo U('Admin/testcase/del');?>",{id:treeNode.id/10000},function (data) {
						location.reload();
					})
				},
				onCancel:function (e) {
					e.close();
				}
			});
			return isDel;
		}
		function showRemoveBtn(treeId, treeNode) {
			return (treeNode.id>10000);
		}
		function showRenameBtn(treeId, treeNode) {
			return (treeNode.id>10000);
		}

		//右击菜单及取消
		function OnRightClick(event, treeId, treeNode) {
			if(treeNode.isParent==true){
				if (!treeNode && event.target.tagName.toLowerCase() != "button" && $(event.target).parents("a").length == 0) {
					zTree.cancelSelectedNode();
					showRMenu("root", event.clientX, event.clientY);
				} else if (treeNode && !treeNode.noR) {
					zTree.selectNode(treeNode);
					showRMenu("node", event.clientX, event.clientY);
				}
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
		function onClick(event, treeId, treeNode) {
			if(treeNode.id>10000) {
				$.post("<?php echo U('Admin/Testcase/edit');?>",{id:treeNode.id/10000},function (data) {
					$("#edit_page").empty().append('<table class="am-table" id="show_table">').append('</table>');
					$.each(data,function (k,v) {
						$("#show_table").append('<tr style="height: 40px"><td style="width: 200px">'+k+'</td><td>'+v+'</td></tr>');
					});
				});
			}
		}
		
		//对应功能区
		function add_class() {

			$("#edit_add_class").modal({
				relatedTarget:this,
				onConfirm:function (e) {
					var nodes=zTree.getSelectedNodes()[0];
					$.post("<?php echo U('Admin/Class/add');?>", {pid:nodes.id,name:e.data}, function (data) {
						location.reload();
					});
				},
				onCancel:function (e) {
					e.close();
				}
			});
			rMenu.css({"visibility" : "hidden"});
		}
		function edit_class() {
			var n=zTree.getSelectedNodes()[0];
			var str=n.name.split('(');
			//$("#edit_add_class .am-modal-bd").append('Input Classfication Name<input type="text" class="am-modal-prompt-input" value='+str[0]+'>');
			$("#edit_add_class").modal({
				relatedTarget:this,
				onConfirm:function (e) {
					var nodes=zTree.getSelectedNodes()[0];
					$("#class_name").val('dfd');
					$.post("<?php echo U('Admin/class/edit');?>", {id:nodes.id,name:e.data},function () {
						window.location.reload();
					});
				},
				onCancel:function (e) {
					e.close();
				}
			});
			rMenu.css({"visibility" : "hidden"});
		}
		function del_class() {
			$("#del_class").modal({
				relatedTarget:this,
				onConfirm:function (e) {
					var node=zTree.getSelectedNodes()[0];
					$.post("<?php echo U('Admin/class/del');?>", {class_id:get_class_id(node).join(","),case_id:get_case_id(node).join(",")}, function (data) {
						location.reload();
						$("#edit_page").empty().html(data);
					});
				},
				onCancel:function (e) {
					e.close();
				}
			});
			rMenu.css({"visibility" : "hidden"});
		}

		//辅助函数，求某个class下的子case
		function get_case_id(e) {
			var case_id=new Array();
			$.each(e.children,function (k,v) {
				if(v.id>10000)
					case_id.push(v.id/10000);
				else if(v.children!=null){
					case_id.push(get_case_id(v));
				}
			});
			return case_id;
		}
		//辅助函数，求某个class下的子class
		function get_class_id(e) {
			var class_id=new Array();
			class_id.push(e.id);
			if(e.children!=null)
				$.each(e.children,function (k,v) {
					if(v.id<10000){
						class_id.push(get_class_id(v));
					}
				});
			return class_id;
		}

		function add_case() {
			var node=zTree.getSelectedNodes()[0].id;
			if(node<10000){
				var str=("<?php echo U('Admin/Testcase/add',array('pid'=>ppid));?>").replace('ppid',node);
				$("#edit_page").empty().append('<iframe name="right-content" src='+str+' id="iframepage"  width="1000px"  height="800px" align="left" style="margin-top: 0px;padding-top: 0px"></iframe>');

			}
			rMenu.css({"visibility" : "hidden"});
		}
		function reset() {
			$(':input','#post-form')
					.not(':button, :submit, :reset, :hidden')
					.val('');
			//

		}

		var zTree, rMenu;
		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
			zTree = $.fn.zTree.getZTreeObj("treeDemo");
			rMenu = $("#rMenu");
		});

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
<div class="am-cf admin-main am-padding-top-0">
	<!-- content start -->

	<div class="admin-content">
		<div class="am-cf am-padding am-padding-bottom-0" id="content-body">
			<div class="am-fl am-cf" id="html_title"><strong class="am-text-primary am-text-lg">TestCase</strong></div>
		</div>
			<br>

			<div class="am-g">
				<div class="am-u-md-3" style="width:22%;">
					<div class="container" style="width:100%;">
						<div class="zTreeDemoBackground left" style="width:100%;">
							<ul id="treeDemo" class="ztree" style="width:100%;height: auto; border: hidden;overflow: auto;" ></ul>
						</div>
					</div>
				</div>
				<div class="am-u-md-6 am-u-md-pull-3">
					<div class="container" id="edit_page">

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content end -->
</div>

<div class="am-modal am-modal-confirm" tabindex="edit_add_class" id="edit_add_class" style="top:-30%;">
	<div class="am-modal-dialog">
		<div class="am-modal-hd">Class Add/Edit</div>
		<div class="am-modal-bd">
			<label>Input Classfication Name</label>
            <input type="text" class="am-modal-prompt-input" id="class_name" style="width:300px;border:1px solid #9C9898;">
		</div>
		<div class="am-modal-footer">
			<span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
			<span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
		</div>
	</div>
</div>
<div class="am-modal am-modal-confirm" tabindex="del_class" id="del_class" style="top:-30%;">
	<div class="am-modal-dialog">
		<div class="am-modal-bd">
			<label>Delete This folder and SubCase ?</label>
		</div>
		<div class="am-modal-footer">
			<span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
			<span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
		</div>
	</div>
</div>
<div class="am-modal am-modal-confirm" tabindex="del_class" id="del_modal" style="top:-30%;">
	<div class="am-modal-dialog">

		<div class="am-modal-bd">
			<label>Delete This Case ?</label>
		</div>
		<div class="am-modal-footer">
			<span class="am-modal-btn" data-am-modal-confirm style="width: 50%;border:1px solid #cccccc;">OK</span>
			<span class="am-modal-btn" data-am-modal-cancel style="width: 50%;border:1px solid #cccccc;">Cancel</span>
		</div>
	</div>
</div>


<div id="rMenu">
	<ul>
		<li id="m_add" onclick="add_class();">Add subfolder</li>
		<li id="m_del" onclick="del_class();">Delete folder</li>
		<li id="m_check" onclick="edit_class();">Edit folder</li>
		<li id="m_unCheck" onclick="add_case();">Add Case</li>
	</ul>
</div>

<script src="/qaweb/Public/assets/js/amazeui.min.js"></script>
<script>
	function test() {
		alert($("#Project").val());
	}
</script>
</BODY>
</HTML>