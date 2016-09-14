<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Copyright" content="<?php echo ($ikphp["ikphp_site_name"]); ?>" />
<title>管理中心-<?php echo (C("cms_name")); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link type="text/css" rel="stylesheet" href="<?php echo C('CSS_URL');?>/style.css"/>

<script type="text/javascript" src="<?php echo C('JS_URL');?>/jquery.js"></script>
<script type="text/javascript" src="<?php echo C('JS_URL');?>/function.js"></script>
<script type="text/javascript" src="<?php echo C('JS_URL');?>/artDialog/jquery.artDialog.js?skin=default"></script>
<script type="text/javascript" src="<?php echo C('JS_URL');?>/artDialog/plugins/iframeTools.js"></script>
<script type="text/javascript" src="<?php echo C('JS_URL');?>/common.js"></script>

<script type="text/javascript" charset="utf-8" src="<?php echo C('JS_URL');?>/ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo C('JS_URL');?>/ue/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="<?php echo C('JS_URL');?>/ue/lang/zh-cn/zh-cn.js"></script>

<style>.fbox{float:left;width:45%;margin-right:10px;}</style>
</head>
<body>

<div class="midder">


<table>
	<tr class="table_title">
		<td colspan="4">服务器信息</td>
	</tr>
    <?php if(is_array($system)): $k = 0; $__LIST__ = $system;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k%2==1) echo "<tr class='ol'>"; ?>
                                <td width="120" align="right"><?php echo ($key); ?>：</td>
                                <td><?php echo ($vo); ?></td>
                                <?php if($k%2==0) echo "</tr>"; endforeach; endif; else: echo "" ;endif; ?>
                            <?php if(count($caches)%2==1) echo '<td>&nbsp;</td><td>&nbsp;</td></tr>'; ?>
<tr class="ol">
<td>Temp/cache</td><td><?php if(!is_writable('./Temp/cache')): ?><font color="red">不可写</font>(请设置为可写777权限)<?php else: ?>可写<?php endif; ?></td><td>Public/upload目录</td><td><?php if(!is_writable('./Public/upload')): ?><font color="red">不可写</font>(请设置为可写777权限)<?php else: ?>可写<?php endif; ?></td></tr>
</table>

</div>

</body>
</html>