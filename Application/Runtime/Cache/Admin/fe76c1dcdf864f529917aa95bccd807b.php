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
<form action="<?php echo U('/Admin/Content/content_edit');?>" method="post" name="form" id="myform" enctype="multipart/form-data">
<table  cellpadding="0" cellspacing="0">
<tr>
            <td colspan="9" class="table_title">
               修改文章
            </td>
</tr>
				
				<tr class="tr rt">
                    <td width="100">标题：</td>
                    <td colspan="3" class="lt">
                        <input type="text" name="title" style="width:200px" value="<?php echo ($info["title"]); ?>">
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">简介:</td>
                    <td colspan="3" class="lt">
						<textarea name='description' rows='8' cols='70'><?php echo ($info["description"]); ?></textarea>
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">图片：</td>
                    <td colspan="3" class="lt">
						<input type="file" name="img_url" size="28" value='浏览...' />
                        <?php if(!empty($info["img_url"])): ?><img src="<?php echo C('SITE_URL');?>/<?php echo (substr($info["img_url"],1)); ?>" /><?php endif; ?>
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">相关推荐：</td>
                    <td colspan="3" class="lt">
					<?php if($info['related'] == 1): ?><input type="checkbox" name="related" value="1" checked>
					<?php else: ?>
						<input type="checkbox" name="related" value="1"><?php endif; ?>
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">热门推荐：</td>
                    <td colspan="3" class="lt">
					<?php if($info['hot'] == 1): ?><input type="checkbox" name="hot" value="1" checked>
					<?php else: ?>
						<input type="checkbox" name="hot" value="1"><?php endif; ?>
                    </td>
                </tr>
				
				<tr class="tr rt">
                    <td width="100">选择栏目：</td>
                    <td colspan="3" class="lt">
                       <select name="cid" style='width:400px;'>
							<option value="0">请选择</option>

                           <?php if(is_array($class_list)): foreach($class_list as $key=>$val): ?><option value="<?php echo ($val['id']); ?>" <?php if($val['id'] == $info['id']): ?>selected<?php endif; ?> ><?php echo (str_repeat('--',$val['level'])); echo ($val['class_name']); ?></option><?php endforeach; endif; ?>


				<!--<?php if(is_array($class_list)): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_c): $mod = ($i % 2 );++$i;?><option value="<?php echo ($p_c["id"]); ?>" <?php if(($p_c["id"]) == $info["cid"]): ?>selected = "selected"<?php endif; ?>><?php echo ($p_c["class_name"]); ?></option>
								<?php if(is_array($p_c["p_class"])): $i = 0; $__LIST__ = $p_c["p_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($p_class["id"]); ?>" <?php if(($p_class["id"]) == $info["cid"]): ?>selected = "selected"<?php endif; ?>>+-&#45;&#45;<?php echo ($p_class["class_name"]); ?></option>
									<?php if(is_array($p_class["k_class"])): $i = 0; $__LIST__ = $p_class["k_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k_class): $mod = ($i % 2 );++$i;?><option value="<?php echo ($k_class["id"]); ?>" <?php if(($k_class["id"]) == $info["cid"]): ?>selected = "selected"<?php endif; ?>>+&#45;&#45;&#45;&#45;&#45;&#45;<?php echo ($k_class["class_name"]); ?></option>
										<?php if(is_array($k_class['c_class'])): foreach($k_class['c_class'] as $key=>$c_vo): ?><option value="<?php echo ($c_vo["id"]); ?>" <?php if(($c_vo["id"]) == $info["cid"]): ?>selected = "selected"<?php endif; ?>>+-&#45;&#45;&#45;&#45;&#45;&#45;&#45;&#45;<?php echo ($c_vo["class_name"]); ?></option><?php endforeach; endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>-->


						</select>
                    </td>
                </tr>
				
                <tr class="tr rt">
                    <td width="100">内容：</td>
                    <td colspan="3" class="lt">
                       <textarea id='ue_content' name='content' style="width:800px;height:250px;"><?php echo ($info["content"]); ?></textarea>
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
						<input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回" >
					</td>
				</tr>
</table>
</form>
</div>

<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    //var ue = UE.getEditor('content');
	
	var ue = UE.getEditor('ue_content');
    
</script>
</body>
	</html>