<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>后台用户管理-<?php echo (C("cms_name")); ?></title>
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

	<style>td{ height:22px; line-height:22px}</style>
</head>
<body>
	<div class="midder">
<table style='float:left;width:20%;'>
	<tr>
		<td colspan="10" class="table_title">文章管理</td>
	</tr>
	<tr class="Toolbar_inbox ct">
		<td>文章类别</td>
	</tr>


	<?php if(is_array($class_list)): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$class_list): $mod = ($i % 2 );++$i;?><tr>
			<?php if($id == $class_list["id"]): ?><td style='border: 1px solid #C6DCF2;background:#999;'>
				<a style='color:#fff;' href="<?php echo U('/Admin/Content/content_list',array('id'=>$class_list['id']));?>"><?php echo ($class_list["class_name"]); ?></td>
			<?php else: ?>
				<td style='border: 1px solid #C6DCF2;'>
				<a href="<?php echo U('/Admin/Content/content_list',array('id'=>$class_list['id']));?>"><?php echo ($class_list["class_name"]); ?></td><?php endif; ?>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>

	<?php if(is_array($class_afer)): $i = 0; $__LIST__ = $class_afer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_afer): $mod = ($i % 2 );++$i;?><tr>
			<?php if($id == $c_afer["id"]): ?><td style='border: 1px solid #C6DCF2;background:#999;'>
				<a style='color:#fff;' href="<?php echo U('/Admin/Content/content_list',array('id'=>$c_afer['id']));?>"><?php echo ($c_afer["class_name"]); ?></td>
			<?php else: ?>
				<td style='border: 1px solid #C6DCF2;'>
				<a href="<?php echo U('/Admin/Content/content_list',array('id'=>$c_afer['id']));?>"><?php echo ($c_afer["class_name"]); ?></td><?php endif; ?>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>


</table>
<table  cellpadding="0" cellspacing="0" style='float:right;width:80%;'>
<tr>
            <td colspan="10" class="table_title"><span class="fr">
                    <a href="<?php echo U('/Admin/Content/content_add');?>">添加文章</a>
                </span>
            </td>

</tr>
<!--<tr>
	<td colspan="0">
		<form action="<?php echo U('/Admin/Content/out_excel');?>" method='POST'>
			<input type='submit' value='导出Excel'>
		</form>
    </td>
</tr>-->
            <tr class="Toolbar_inbox ct">
                <td align='center' width='20'>文章ID</td>
                <td align='center' width='100'>标题</td>
                <td align='center' width='50'>发布时间</td>
                <td align='center' width='50'>管理操作</td>
            </tr>
        <?php if(is_array($content_list)): $i = 0; $__LIST__ = $content_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class='ol'>
                <td align='center'><?php echo ($vo["id"]); ?></td>
                <td align='center'><?php echo ($vo["title"]); ?></td>
                <td align='center'><?php echo (date("Y-m-d",$vo["createtime"])); ?></td>
				<td align='center'>
                    <a href="<?php echo U('/Admin/Content/content_edit/',array('id'=>$vo['id']));?>">修改</a>
                    | <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/Content/content_del/',array('id'=>$vo['id']));?>','确定删除该文章吗?')">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
        <tr class="tr">
          <td colspan="13" class="pages" style='text-align:center;'>
            <?php echo ($page); ?>
          </td>
        </tr>
		
</table>
</div>
</body>
	</html>