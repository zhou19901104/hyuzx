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
               员工管理  <span class="fr">
                    <a href="<?php echo U('/Admin/User/add');?>">添加员工</a>
                </span>
            </td>
</tr>
<tr>
    <td colspan="0">

        <select name='role' class="roleid">
            <option value='-1' rel="?s=/User/index/">权限列表</option>
            <option value='-1' rel="?s=/User/index/">全部权限</option>
            <?php if(is_array($roles)): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rcv): $mod = ($i % 2 );++$i;?><option value='<?php echo ($rcv["id"]); ?>' rel="<?php echo ($url['roleid'][$rcv['id']]); ?>" <?php if(($rcv["id"]) == $fi['roleid']): ?>selected<?php endif; ?>><?php echo ($rcv["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
    </td>
    <td>
        <form action="<?php echo U('/Admin/User/index');?>" method='POST'>
            用户名：<input type='text' size='20' name='ming' />
            <input type='submit' name='ssubmit' value='确认' />
        </form>
    </td>
</tr>
            <tr class="Toolbar_inbox ct">
                <td align='center'>用户编号</td>
                <td align='center'>用户账号</td>
                <td align='center'>用户权限</td>
                <td align='center'>状态</td>
                <td align='center'>管理操作</td>
            </tr>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["username"] == hlbs): else: ?>
            <tr class='<?php if(($mod) == "1"): ?>od<?php else: ?>ol<?php endif; ?>'>
                <td align='center'><?php echo ($vo["uuid"]); ?></td>
                <td align='center'><?php echo ($vo["username"]); ?></td>

                <td align='center'><?php echo ($vo["name"]); ?></td>
                <td align='center'>

                <?php if($vo["ustatus"] == 1): ?><font color="red">√</font>
                <?php else: ?>
                <font color="blue">×</font><?php endif; ?> 

                </td>
                <td align='center'>
                    <a href="<?php echo U('/Admin/User/edit/',array('id'=>$vo['uid']));?>">修改</a>
                    | <?php if(($vo["username"]) == C("SPECIAL_USER")): ?><font color="#cccccc">删除</font><?php else: ?><a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/User/del/',array('id'=>$vo['uid']));?>','确定删除该用户吗?')">删除</a><?php endif; ?>
                </td>
            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <tr class="tr">
          <td colspan="6" class="pages">
            <?php echo ($page); ?>
          </td>
        </tr>
</table>
<div class="pagebar"><?php echo ($pageUrl); ?></div>
</div>
</body>
	</html>