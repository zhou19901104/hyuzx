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

</head>
<body>
	<div class="midder">

<table  cellpadding="0" cellspacing="0">
<tr>
            <td colspan="9" class="table_title">
             员工信息修改
            </td>
</tr>
          
            <form action="<?php echo U('/Admin/User/edit');?>" method="post" name="form" id="myform">
            <input type="hidden" name="uid" value="<?php echo ($valu["uid"]); ?>">
            

               <tr class="tr rt">
                    <td width="100">员工名称：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="username" id="username" style="width:200px" value="<?php echo ($valu["username"]); ?>" readonly="readonly">
                    </td>
                </tr>
                <tr class="tr rt">
                    <td width="100">用户密码：</td>
                    <td colspan="3" class="lt">
                        <input type="password" name="password" id="password" style="width:200px"> &nbsp;&nbsp;<font color="red">如果不修改请为空</font>
                    </td>
                </tr>
                <tr class="tr rt">
                    <td width="100">员工邮箱：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="email" id="email" style="width:200px" value="<?php echo ($valu["email"]); ?>">
                    </td>
                </tr>
                 <tr class="tr rt">
                    <td width="100">权限：</td>
                    <td colspan="3" class="lt">
                        <select name="role_id">
							<?php if(is_array($role)): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role_info): $mod = ($i % 2 );++$i;?><option value="<?php echo ($role_info["id"]); ?>" <?php if(($valu['role_id']) == $role_info['id']): ?>selected<?php endif; ?>><?php echo ($role_info["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>

                <tr class="tr rt">
                    <td >用户状态：</td>
                    <td colspan="3" class="lt">
                        <input type="radio" class="radio" value="1" name="status" id="status1" <?php if(($valu["status"] == 1)): ?>checked=""<?php endif; ?> >
                            启用
                            <input type="radio" class="radio" value="0" name="status" id="status2" <?php if(($valu["status"]) == "0"): ?>checked=""<?php endif; ?> >
                            关闭
                    </td>
                </tr>
                <tr class="tr rt">
                    <td >备注说明：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="remark" id="remark" style="width:400px" value="<?php echo ($valu["remark"]); ?>">
                    </td>
                </tr>
                <tr class="tr lt">
        <td colspan="4">
            
                <input class="bginput" type="submit" name="submit" value="修 改" >
            &nbsp;
            <input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
    </tr>
    </form>
</table>
</div>
</body>
	</html>