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

	
</head>
<body>
	<div class="midder">

<table  cellpadding="0" cellspacing="0">
<tr>
            <td colspan="9" class="table_title">
               添加角色
            </td>
</tr>
          
            <form action="<?php echo U('/Admin/Role/role_add');?>" method="post" name="form" id="myform">
    
            

                <tr class="tr rt">
                    <td width="100">角色名称：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="name" id="name" style="width:200px" value="">
                    </td>
                </tr>


                <tr class="tr rt">
                    <td >角色描述：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="remark" id="remark" style="width:400px" value="<?php echo ($info["remark"]); ?>">
                    </td>
                </tr>
                <tr class="tr lt">
        <td colspan="4">
            
                <input class="bginput" type="submit" name="dosubmit" value="添 加">
            &nbsp;
            <input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
    </tr>
    </form>
</table>
</div>
</body>
	</html>