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
               修改栏目
            </td>
</tr>
          
            <form action="<?php echo U('/Admin/Setting/class_edit');?>" method="post" name="form" id="myform">
    
            

                <tr class="tr rt">
                    <td width="100">栏目名称：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="class_name" id="class_name" style="width:200px" value="<?php echo ($class_info["class_name"]); ?>">
                    </td>
                </tr>
				
				 <tr class="tr rt">
                    <td width="100">栏目英文名称：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="class_e_name" id="class_e_name" style="width:200px" value="<?php echo ($class_info["class_e_name"]); ?>">
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">简介:</td>
                    <td colspan="3" class="lt">
						<textarea name='introduction' rows='3' cols='50'><?php echo ($class_info["introduction"]); ?></textarea>
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">选择栏目：</td>
                    <td colspan="3" class="lt">
                       <select name="pid" style='width:400px;'>
							<option value="0">请选择</option>
							<?php if(is_array($class_list)): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($p_c["id"]); ?>" <?php if(($p_c["id"]) == $class_info["pid"]): ?>selected = "selected"<?php endif; ?>><?php echo ($p_c["class_name"]); ?></option>
								<?php if(is_array($p_c["p_class"])): $i = 0; $__LIST__ = $p_c["p_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($p_class["id"]); ?>" <?php if(($p_class["id"]) == $class_info["pid"]): ?>selected = "selected"<?php endif; ?>>+---<?php echo ($p_class["class_name"]); ?></option>
									<?php if(is_array($p_class["k_class"])): $i = 0; $__LIST__ = $p_class["k_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k_class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($k_class["id"]); ?>" <?php if(($k_class["id"]) == $class_info["pid"]): ?>selected = "selected"<?php endif; ?>>+------<?php echo ($k_class["class_name"]); ?></option>
										<?php if(is_array($k_class['c_class'])): foreach($k_class['c_class'] as $key=>$c_vo): ?><option value="<?php echo ($c_vo["id"]); ?>" <?php if(($c_vo["id"]) == $class_info["pid"]): ?>selected = "selected"<?php endif; ?>>+---------<?php echo ($c_vo["class_name"]); ?></option><?php endforeach; endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
						</select>
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">排序：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="sort" id="sort" style="width:200px" value="<?php echo ($class_info["sort"]); ?>">
                        <input type="hidden" name="id" id="id" style="width:200px" value="<?php echo ($class_info["id"]); ?>">
                    </td>
                </tr>
                <tr class="tr lt">
        <td colspan="4">
            
                <input class="bginput" type="submit" name="submit" value="修 改">
            &nbsp;
            <input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" ></td>
    </tr>
    </form>
</table>
</div>
</body>
	</html>