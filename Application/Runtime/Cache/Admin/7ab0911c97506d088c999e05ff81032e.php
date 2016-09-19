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

    <table  cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="10" class="table_title"><span class="fr">
                    <a href="<?php echo U('/Admin/Content/content_add');?>">添加文章</a>
                </span>
            </td>

        </tr>

        <tr class="Toolbar_inbox ct">
            <td align='center' width='10'>文章ID</td>
            <td align='center' width='10'>父类</td>
            <td align='center' width='20'>标题</td>
            <td align='center' width='20'>简介</td>
            <td align='center' width='30'>发布时间</td>
            <td align='center' width='10'>管理操作</td>
        </tr>
        <?php if(is_array($content_list)): $i = 0; $__LIST__ = $content_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class='ol'>
                <td align='center'><?php echo ($vo["id"]); ?></td>
          <!--      <td align='center'><?php echo ($vo["class_name"]); ?></td>-->
                <td align='center'><?php echo ($vo["title"]); ?></td>
                <td align='center'><?php echo (msubstr($vo["description"],0,30)); ?></td>
                <td align='center'><?php echo (date("Y-m-d",$vo["createtime"])); ?></td>
                <td align='center'>
                    <a href="<?php echo U('/Admin/Content/content_edit/',array('id'=>$vo['id']));?>">修改</a>
                    | <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/Content/content_del/',array('id'=>$vo['id']));?>','确定删除该文章吗?')">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        <tr class="tr">
            <td colspan="13" class="pages" style='text-align:center;'>
                <?php echo ($show); ?>
            </td>
        </tr>

    </table>
</div>
</body>
</html>