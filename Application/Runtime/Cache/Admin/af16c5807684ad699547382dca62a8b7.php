<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($tpltitle); ?>菜单(节点)</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="/Public/css/style.css?333"/>
<script src="/Public/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="/Public/js/function.js"></script>
<script type="text/javascript" src="/Public/js/artDialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="/Public/js/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="/Public/js/jquery.js"></script>
<script type="text/javascript" src="/Public/js/common.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/js/ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/js/ue/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/Public/js/ue/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
		<?php if(($info["id"]) > "0"): ?><form action="<?php echo U('/Admin/Node/edit');?>" method="post" name="form" id="myform">
			<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
		<?php else: ?>
			<form action="<?php echo U('/Admin/Node/add');?>" method="post" name="form" id="myform"><?php endif; ?>
			<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">

				<tr class="table_title">
					<td colspan="4"><?php echo ($tpltitle); ?>菜单(节点)</td>
				</tr>
				<tr class="tr rt">
					<td width="100">上级菜单：</td>
					<td colspan="3" class="lt">
						<select name="pid">
							<?php echo ($select_categorys); ?>
						</select>
					</td>
				</tr>
				<tr class="tr rt">
					<td width="100">菜单名称：</td>
					<td colspan="3" class="lt">
						<input type="text" name="title" id="title" style="width:200px" value="<?php echo ($info["title"]); ?>">
					</td>
				</tr>
				<tr class="tr rt">
					<td >菜单类型：</td>
					<td colspan="3" class="lt">
						<select name="display">
							<option value="1" <?php if(($info["display"]) == "1"): ?>selected=""<?php endif; ?> >主菜单</option>
							<option value="2" <?php if(($info["display"]) == "2"): ?>selected=""<?php endif; ?> >子菜单</option>
							<option value="0" <?php if(($info["display"]) == "0"): ?>selected=""<?php endif; ?> >不显示</option>
						</select>
					</td>
				</tr>
				<tr class="tr rt">
					<td width="100">节点类型：</td>
					<td colspan="3" class="lt">
						<select name="level">
							<!--option value="1">应用级</option-->
							<option value="2" <?php if(($info["level"]) == "2"): ?>selected=""<?php endif; ?> >模块</option>
							<option value="3" <?php if(($info["level"]) == "3"): ?>selected=""<?php endif; ?> >方法</option>
							<option value="0" <?php if(($info["level"]) == "0"): ?>selected=""<?php endif; ?> >非节点</option>
						</select>
					</td>
				</tr>
				<tr class="tr rt">
					<td width="100">节点名称：</td>
					<td colspan="3" class="lt">
						<input type="text" name="name" id="name" style="width:200px" value="<?php echo ($info["name"]); ?>">
					</td>
				</tr>
				<tr class="tr rt">
					<td >链接参数：</td>
					<td colspan="3" class="lt">
						<input type="text" name="data" id="data" style="width:400px" value="<?php echo ($info["data"]); ?>">
					</td>
				</tr>
				<tr class="tr rt">
					<td >节点状态：</td>
					<td colspan="3" class="lt">
						<input type="radio" class="radio" value="1" name="status" <?php if(($info["status"] == 1) OR ($info['status'] == '') ): ?>checked=""<?php endif; ?> >
							启用
							<input type="radio" class="radio" value="0" name="status" <?php if(($info["status"]) == "0"): ?>checked=""<?php endif; ?> >
							关闭
					</td>
				</tr>
				<tr class="tr rt">
					<td >备注说明：</td>
					<td colspan="3" class="lt">
						<input type="text" name="remark" id="remark" style="width:400px" value="<?php echo ($info["remark"]); ?>">
					</td>
				</tr>
	<tr class="tr lt">
		<td colspan="4">
			<?php if(($info["id"]) > "0"): ?><input class="bginput" type="submit" name="dosubmit" value="修 改" >
				<?php else: ?>
				<input class="bginput" type="submit" name="dosubmit" value="添 加"><?php endif; ?>
			&nbsp;
			<input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
	</tr>
</table>
</form>
</body>
</html>