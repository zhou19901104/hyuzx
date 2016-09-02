<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>管理登录-<?php echo (C("cms_name")); ?></title>
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

<meta property="wb:webmaster" content="6602571ea916c35b" />
</head>

<body id="loginbody">

    <div class="login">
    
<div class="info">
<form method="post" action="<?php echo U('Admin/Login/checklogin/');?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <th height="35" scope="row">用户名:</th>
    <td><input type="text" name="username" class="linput"/></td>
  </tr>
  <tr>
    <th height="35" scope="row">密码：</th>
    <td><input type="password" name="password" class="linput" /></td>
  </tr>
   <tr>
    <th height="35" scope="row">验证码:</th>
    <td><input type="text" name="verify" class="linput" /><img id="verifyImg" src="/index.php/Admin/Login/verify?" onclick='this.src=this.src+"&"+Math.random()' border="0" ALT="点击刷新验证码" style="cursor:pointer" align="absmiddle"></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>
    <input class="lsubmit" type="submit" value="登录后台" /> <a href="/index.php" class="bh">返回首页</a>
    </td>
  </tr>  
</table>
</form>
</div>
        
    </div>


</body>
</html>