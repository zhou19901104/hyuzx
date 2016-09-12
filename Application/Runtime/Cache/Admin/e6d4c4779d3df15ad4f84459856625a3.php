<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台用户管理-<?php echo (C("cms_name")); ?></title>
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
            <td colspan="6" class="table_title">
               医生类别管理  <span class="fr">
                    <a href="<?php echo U('/Admin/Doctor/doctor_class_add');?>">添加栏目</a>
                </span>
            </td>
</tr>
            <tr class="Toolbar_inbox ct">
                <td align='center'>排序</td>
                <td align='center'>分类名称</td>
                <td align='center'>管理操作</td>
            </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class='ol'>
                <td align='center'><?php echo ($vo["sort"]); ?></td>
                <td align='center'><?php echo ($vo["class_name"]); ?></td>
                <td align='center'>
                    <a href="<?php echo U('/Admin/Doctor/doctor_class_edit/',array('id'=>$vo['id']));?>">修改</a>
                    | <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/Doctor/doctor_class_del/',array('id'=>$vo['id']));?>','确定删除该类别吗?')">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
</div>
</body>
	</html>