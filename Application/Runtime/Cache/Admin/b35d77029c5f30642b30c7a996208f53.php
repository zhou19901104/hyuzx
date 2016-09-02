<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台角色管理-<?php echo (C("cms_name")); ?></title>
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

	<style>td{ height:22px; line-height:22px}</style>
</head>
<body>
	<div class="midder">

<table  cellpadding="0" cellspacing="0">
<tr>
            <td colspan="10" class="table_title">
               后台用户  <span class="fr">
                    <a href="<?php echo U('/Admin/Role/role_add');?>">添加角色</a>
                </span>
            </td>
</tr>
			<tr class="Toolbar_inbox ct">
				<td width="70" align='center'>ID</td>
				<td width="350" align='center'>角色名称</td>
				<td align='center'>角色描述</td>
				<td width="70" align='center'>状态</td>
				<td width="200" align='center'>管理操作</td>
			</tr>
	    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class='<?php if(($mod) == "1"): ?>ol<?php else: ?>od<?php endif; ?>'>
				<td align='center'><?php echo ($vo["id"]); ?></td>
				<td align='center'><?php echo ($vo["name"]); ?></td>
				<td align='center'><?php echo ($vo["remark"]); ?></td>
				<td align='center'>
					<?php if(($vo["status"]) == "1"): ?><font color="red">√</font>
						<?php else: ?>
							<font color="blue">×</font><?php endif; ?> 
				</td>
				<td align='center'>
					<a href="javascript:setting_access(<?php echo ($vo["id"]); ?>, '<?php echo ($vo["name"]); ?>')">权限设置</a> | <a href="<?php echo U('/Admin/Role/role_edit/',array('id'=>$vo['id']));?>">修改</a> 
					<?php if(($_SESSION['username']) == "hlbs"): ?>| <a href="<?php echo U('/Admin/Role/role_del/',array('id'=>$vo['id']));?>">删除</a><?php endif; ?>
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
		</table>
	</div>
</body>
<script type="text/javascript">
//权限设置
function setting_access(id, name) {
	window.top.art.dialog.open('<?php echo U('/Admin/Role/access/');?>'+'?roleid='+id,{title: name+'权限设置', width: 600, height: 500});
}
</script>
</html>