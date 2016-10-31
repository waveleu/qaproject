<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<HTML class="no-js">
<HEAD>
	<TITLE> ZTREE DEMO - awesome 风格</TITLE>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<!-- Include font-awesome here, CDN is ok, or locally installed by bower to your project -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="/ztree/Public/Css/demo.css" type="text/css">
	<link rel="stylesheet" href="/ztree/Public/Css/awesome.css" type="text/css">
	<script type="text/javascript" src="/Amaze/Public/assets/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/ztree/Public/Js/jquery.ztree.core.js"></script>
	<script type="text/javascript" src="/ztree/Public/Js/jquery.ztree.excheck.js"></script>
	<script type="text/javascript" src="/ztree/Public/Js/jquery.ztree.exedit.js"></script>

	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<link rel="icon" type="image/png" href="/Amaze/Public/assets/i/favicon.png">
	<link rel="apple-touch-icon-precomposed" href="/Amaze/Public/assets/i/app-icon72x72@2x.png">
	<link rel="stylesheet" href="/Amaze/Public/assets/css/amazeui.min.css"/>
	<link rel="stylesheet" href="/Amaze/Public/assets/css/admin.css">
	<SCRIPT type="text/javascript">
		//<!--
		var setting = {
			view: {
				addHoverDom: addHoverDom,
				removeHoverDom: removeHoverDom,
				selectedMulti: false
			},
			edit: {
				enable: true,
				editNameSelectAll: true,
				showRemoveBtn: showRemoveBtn,
				showRenameBtn: showRenameBtn
			},
			data: {
				simpleData: {
					enable: true
				}
			},
			callback: {
				beforeDrag: beforeDrag,
				beforeEditName: beforeEditName,
				beforeRemove: beforeRemove,
				beforeRename: beforeRename,
				onRemove: onRemove,
				onRename: onRename
			}
		};
		var filelist=<?php echo ($data); ?>;
		var zNodes =[
			{ id: 1, pId: 0, name: "  p1", open: true },
			{ id: 11, pId: 1, name: "  s1", open: true },
			{ id: 12, pId: 1, name: "  s2", open: false },
			{ id: 13, pId: 1, name: "  s3", open: false },
			{ id: 2, pId: 0, name: "  p2", open: true },
			{ id: 21, pId: 2, name: "  s1", open: false },
			{ id: 22, pId: 2, name: "  s2", open: false },
			{ id: 23, pId: 2, name: "  s3", open: false },
			{ id: 24, pId: 2, name: "  s4", open: false },
			{ id: 25, pId: 2, name: "  s5", open: false },
			{ id: 3, pId: 0, name: "  p3", open: true },
			{ id: 31, pId: 3, name: "  s1", open: false },
		];
		$.each(filelist,function(key,item){
			var UId=key.replace(/[^0-9]/ig,"");
			var count=1;
			$.each(item,function(zkey,zitem){
				var temp={id:UId*1000+count,pId:UId,name:""+zitem,open:true};
				count++;
				zNodes.push(temp);
			});
		});
		var log, className = "dark";
		function beforeDrag(treeId, treeNodes) {
			return false;
		}

		//编辑功能
		function beforeEditName(treeId, treeNode) {
			className = (className === "dark" ? "":"dark");
			showLog("[ "+getTime()+" beforeEditName ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.selectNode(treeNode);
			if(treeNode.id>100){
				 var CaseName=treeNode.name;
				 $.post("<?php echo U('admin/Read/edit');?>",{CaseName:CaseName},function(casedata){
					 $.each(casedata,function(key,i){
						 	$("input[name="+key+"]").attr({value:i});
					 })
				 });
			}
		}
		function beforeRemove(treeId, treeNode) {
			className = (className === "dark" ? "":"dark");
			showLog("[ "+getTime()+" beforeRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.selectNode(treeNode);
			alert(treeNode.id);
			return confirm("确认删除 节点 -- " + treeNode.name + " 吗？");
		}
		function onRemove(e, treeId, treeNode) {

			var CaseName=treeNode.name;
			$.post("<?php echo U('admin/Read/del');?>",{CaseName:CaseName},function(data){
				$.each(data,function(key,i){
					if(i=='ok'){
						showLog("[ "+getTime()+" onRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
						alert('数据删除成功！');
					}
					else{
						alert('数据删除失败！');
					}
				})
			});
		}
		function beforeRename(treeId, treeNode, newName, isCancel) {

			className = (className === "dark" ? "":"dark");
			showLog((isCancel ? "<span style='color:red'>":"") + "[ "+getTime()+" beforeRename ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name + (isCancel ? "</span>":""));
			if (newName.length == 0) {
				alert("节点名称不能为空.");
				var zTree = $.fn.zTree.getZTreeObj("treeDemo");
				setTimeout(function(){zTree.editName(treeNode)}, 10);
				return false;
			}
			return true;
		}
		function onRename(e, treeId, treeNode, isCancel) {
			//$(".list").append(treeNode.tId+"<li>函数onRename   可以添加li标签</li>");
			showLog((isCancel ? "<span style='color:red'>":"") + "[ "+getTime()+" onRename ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name + (isCancel ? "</span>":""));
		}
		function showRemoveBtn(treeId, treeNode) {
			return (treeNode.id>100);
		}
		function showRenameBtn(treeId, treeNode) {
			return (treeNode.id>100);
		}
		function showLog(str) {
			if (!log) log = $("#log");
			log.append("<li class='"+className+"'>"+str+"</li>");
			if(log.children("li").length > 8) {
				log.get(0).removeChild(log.children("li")[0]);
			}
		}
		function getTime() {
			var now= new Date(),
					h=now.getHours(),
					m=now.getMinutes(),
					s=now.getSeconds(),
					ms=now.getMilliseconds();
			return (h+":"+m+":"+s+ " " +ms);
		}

		var newCount = 1;
		function addHoverDom(treeId, treeNode) {
			var sObj = $("#" + treeNode.tId + "_span");
			if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0||treeNode.id>1000||treeNode.id<10) return;
			var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
					+ "' title='add node' onfocus='this.blur();'></span>";
			sObj.after(addStr);
			var btn = $("#addBtn_"+treeNode.tId);
			if (btn) btn.bind("click", function(){
				var zTree = $.fn.zTree.getZTreeObj("treeDemo");
				zTree.addNodes(treeNode, {id:(100 + newCount), pId:treeNode.id, name:"new node" + (newCount++)});
				return false;
			});
		};
		function removeHoverDom(treeId, treeNode) {
			$("#addBtn_"+treeNode.tId).unbind().remove();
		};
		function selectAll() {
			var zTree = $.fn.zTree.getZTreeObj("treeDemo");
			zTree.setting.edit.editNameSelectAll =  $("#selectAll").attr("checked");
		}

		$(document).ready(function(){
			$.fn.zTree.init($("#treeDemo"), setting, zNodes);
			$("#selectAll").bind("click", selectAll);
		});

	</SCRIPT>

</HEAD>

<BODY>
<div class="am-cf admin-main">
	<!-- content start -->
	<div class="admin-content">
		<div class="admin-content-body">
			<hr>
			<div class="am-g">
				<div class="container">
					<div class="my-head">
						<div class="am-u-sm-12 am-article">
							<h1 class="am-article-title">Case信息</h1>
							<p class="am-article-meta" align="center">查看，修改，添加</p>
						</div>
					</div>
				</div>
			</div>

			<div class="am-g">
				<div class="am-u-md-3 am-u-md-offset-1">
					<div class="container">
						<div class="zTreeDemoBackground left">
							<ul id="treeDemo" class="ztree" style="height: auto; border: hidden;overflow: auto;" ></ul>
						</div>
					</div>
				</div>

				<div class="am-u-md-6 am-u-md-pull-3">
					<div class="container" id="edit_page">
						<div class="am-g">
							<div class="am-u-md-12">
								<hr>
								<form class="am-form" action="<?php echo U('admin/Testcase/save');?>" method="post" enctype="multipart/form-data">
									<?php if(is_array($testcase_name_list)): foreach($testcase_name_list as $key=>$item): ?><div class="am-form-group am-form-horizontal am-form-error">
										<label for=<?php echo ($item); ?> class="am-u-sm-2 am-form-label"><?php echo ($item); ?></label>
										<div class="am-u-sm-8">
											<input type="text" class="am-form-field " id=<?php echo ($item); ?> name=<?php echo ($item); ?> value="" >
											<script>
												var temp="<?php echo ($new_ID); ?>";
												$("input[id='Case_ID']").attr({value:temp,disabled:true});
											</script>
										</div>
										<br>
									</div><?php endforeach; endif; ?>

									<div class="am-btn-group  am-u-md-offset-5 ">
										<button class="am-btn am-btn-primary am-radius" type="submit">提交</button>
										<button class="am-btn am-btn-danger am-radius" type="reset">重置</button>
									</div>
								</form >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- content end -->
</div>
<script>
		$("button[type='reset']").click(function () {
			$("input").attr({value:""});
		});
</script>

</BODY>
</HTML>