<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8"/>
	<title>菜单管理 - bjyadmin</title>
	<bootstrapcss />
</head>
<body>
<!-- 导航栏开始 -->
<form action="<?php echo U('Admin/Nav/order');?>" method="post">
			<table class="table ">
				<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
						<td><?php echo ($v['name']); ?>  :  </td>
						<td><?php echo ($v['mca']); ?></td>
					</tr><?php endforeach; endif; ?>
			</table>
</form>

</body>
</html>