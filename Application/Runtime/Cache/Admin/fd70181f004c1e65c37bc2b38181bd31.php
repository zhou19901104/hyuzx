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
<form action="<?php echo U('/Admin/Anli/anli_add');?>" method="post" name="form" id="myform" enctype="multipart/form-data">
<table  cellpadding="0" cellspacing="0">
<tr>
            <td colspan="9" class="table_title">
               添加案例
            </td>
</tr>
				
				<tr class="tr rt">
                    <td width="100">姓名：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="name" style="width:200px" value="">
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">感言:</td>
                    <td colspan="3" class="lt">
						<textarea name='jianyan' rows='3' cols='50'></textarea>
                    </td>
                </tr>

    <tr class="tr rt">
        <td width="100">效果图：</td>
        <td colspan="3" class="lt">
            <input type="text" name="img_url" id="img_url" style="width:300px;" value="">
            <input type='button' class='btn' value='浏览...' />
            <input type="file" name="fileField" class="file" id="fileField" size="28" onchange="document.getElementById('img_url').value=this.value" />
        </td>
    </tr>

    <tr class="tr rt">
        <td width="100">列表图：</td>
        <td colspan="3" class="lt">
            <input type="text" name="list_url" id="list_url" style="width:300px;" value="">
            <input type='button' class='btn' value='浏览...' />
            <input type="file" name="list_url" class="file" id="list_url" size="28" onchange="document.getElementById('list_url').value=this.value" />
        </td>
    </tr>

    <tr class="tr rt">
        <td width="100">推荐小图片：</td>
        <td colspan="3" class="lt">
            <input type="text" name="min_url" id="min_url" style="width:300px;" value="">
            <input type='button' class='btn' value='浏览...' />
            <input type="file" name="min_url" class="file" id="min_url" size="28" onchange="document.getElementById('min_url').value=this.value" />
        </td>
    </tr>

				<tr class="tr rt">
                    <td width="100">推荐:</td>
                    <td colspan="3" class="lt">
                        <input type="checkbox" name="related" value="1"> 
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">排序:</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="sort" id="sort" style="width:200px;" value="0">
                    </td>
                </tr>

                <tr class="tr lt">
        <td colspan="4">
            
                <input class="bginput" type="submit" name="submit" value="添 加">
            &nbsp;
            <input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
    </tr>
    
</table>
</form>
</div>
</body>
	</html>