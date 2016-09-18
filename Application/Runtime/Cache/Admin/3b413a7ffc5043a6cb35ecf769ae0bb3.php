<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>菜单管理-<?php echo (C("cms_name")); ?></title>
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
  <form action="<?php echo U('/Admin/Node/sort');?>" method="post" name="form">
  <table width="98%" border="0" cellpadding="5" cellspacing="1" class="table">
      <tr class="table_title">
        <td colspan="7" class="table_title">
          <span class="fl">后台菜单(节点)管理</span>
          <span class="fr">
            <a href="<?php echo U('/Admin/Node/add');?>">添加菜单(节点)</a>
          </span>
        </td>
        <tr class="Toolbar_inbox ct">
          <td width="70">排序权重</td>
          <td width="70">ID</td>
          <td >菜单名称</td>
          <td width="70">类型</td>
          <td width="70">状态</td>
          <td width="70">显示</td>
          <td width="200">管理操作</td>
        </tr>
        <?php echo ($html_tree); ?>
        <tr class="tr">
          <td colspan="7" valign="middle">
            <input type="submit" value="排序" class="bginput" />
          </td>
        </tr>
    </table>
  </form>
</div>
</body>
  </html>