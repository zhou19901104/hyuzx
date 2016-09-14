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

<style type="text/css">
.file{ position:absolute; top:1; right:700px; height:24px; filter:alpha(opacity:0);opacity: 0;width:375px ;border:1px solid red;}
</style>
<body>
	<div class="midder">
<form action="<?php echo U('/Admin/Doctor/doctor_edit');?>" method="post" name="form" id="myform" enctype="multipart/form-data">
<table  cellpadding="0" cellspacing="0">
<tr>
            <td colspan="9" class="table_title">
               修改医生
            </td>
</tr>
				
				<tr class="tr rt">
                    <td width="100">姓名：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="name" style="width:200px" value="<?php echo ($info["name"]); ?>">
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">职称:</td>
                    <td colspan="3" class="lt">
                       
						<textarea name='zhicheng' rows='3' cols='50'><?php echo ($info["zhicheng"]); ?></textarea>
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">医生图片：</td>
                    <td colspan="3" class="lt">
						<input type="file" name="img_url" size="28" value='浏览...'  />
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">主页图片：</td>
                    <td colspan="3" class="lt">
						<input type="file" name="index_url" size="28" value='浏览...'  />
                    </td>
                </tr>
				
				 <tr class="tr rt">
                    <td width="100">医生类别：</td>
                    <td colspan="3" class="lt">
                       <select name="type" style='width:200px;'>
							<option value="0">请选择</option>
							<?php if(is_array($class_list)): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_c): $mod = ($i % 2 );++$i; if($info['type'] == $p_c['id']): ?><option value="<?php echo ($p_c["id"]); ?>"  selected="selected"><?php echo ($p_c["class_name"]); ?></option>
								<?php else: ?>
									<option value="<?php echo ($p_c["id"]); ?>"><?php echo ($p_c["class_name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
						</select>
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">主打方向：</td>
					<td colspan="3" class="lt">
					   <textarea name='zhuone' style="width:800px;height:250px;"><?php echo ($info["zhuone"]); ?></textarea>
					</td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">主页介绍：</td>
					<td colspan="3" class="lt">
					   <textarea name='index_zhu' style="width:800px;height:250px;"><?php echo ($info["index_zhu"]); ?></textarea>
					</td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">医生简介：</td>
                    <td colspan="3" class="lt">
						<textarea name='jianjie' rows='3' cols='50'><?php echo ($info["jianjie"]); ?></textarea>
					</td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">专家介绍：</td>
                    <td colspan="3" class="lt">
						<textarea name='jieshao' rows='3' cols='50'><?php echo ($info["jieshao"]); ?></textarea>
					</td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">主页医生寄语：</td>
                    <td colspan="3" class="lt">
						<textarea name='index_message' rows='3' cols='50'><?php echo ($info["index_message"]); ?></textarea>
					</td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">医生寄语：</td>
                    <td colspan="3" class="lt">
						<textarea name='message' rows='3' cols='50'><?php echo ($info["message"]); ?></textarea>
					</td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">医生寄语英文：</td>
                    <td colspan="3" class="lt">
						<textarea name='message_e' rows='3' cols='50'><?php echo ($info["message_e"]); ?></textarea>
					</td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">推荐:</td>
                    <td colspan="3" class="lt">
						<?php if($info['related'] == 1): ?><input type="checkbox" name="related" value="1" checked> 
						<?php else: ?>
							<input type="checkbox" name="related" value="1"><?php endif; ?>
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">排序:</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="sort" id="sort" style="width:200px;" value="<?php echo ($info["sort"]); ?>">
                        <input type="hidden" name="id" value="<?php echo ($info["id"]); ?>">
                    </td>
                </tr>

                <tr class="tr lt">
        <td colspan="4">
            
                <input class="bginput" type="submit" name="submit" value="修 改">
            &nbsp;
            <input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
    </tr>
    
</table>
</form>
</div>
</body>
	</html>