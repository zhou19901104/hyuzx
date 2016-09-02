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
               栏目管理  <span class="fr">
                    <a href="<?php echo U('/Admin/Setting/class_add');?>">添加栏目</a>
                </span>
            </td>
</tr>
            <tr class="Toolbar_inbox ct">
                <td align='center'>排序</td>
                <td align='center'>分类名称</td>
                <td align='center'>管理操作</td>
            </tr>
        <?php if(is_array($class_list)): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class='ol'>
                <td align='center'><?php echo ($vo["sort"]); ?></td>
                <td><?php echo ($vo["class_name"]); ?></td>
                <td align='center'>
                    <a href="<?php echo U('/Admin/Setting/class_edit/',array('id'=>$vo['id']));?>">修改</a>
                    | <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/Setting/class_del/',array('id'=>$vo['id']));?>','确定删除该栏目吗?')">删除</a>
                </td>
            </tr>
			<?php if(is_array($vo["pp_class"])): $i = 0; $__LIST__ = $vo["pp_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp_vo): $mod = ($i % 2 );++$i;?><tr class='od'>
					<td align='center'><?php echo ($pp_vo["sort"]); ?></td>
					<td><div class="boarda"><?php echo ($pp_vo["class_name"]); ?></div></td>
					<td align='center'>
						<a href="<?php echo U('/Admin/Setting/class_edit/',array('id'=>$pp_vo['id']));?>">修改</a>
						| <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/Setting/class_del/',array('id'=>$pp_vo['id']));?>','确定删除该栏目吗?')">删除</a>
					</td>
				</tr>
				<?php if(is_array($pp_vo["kk_class"])): $i = 0; $__LIST__ = $pp_vo["kk_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kk_vo): $mod = ($i % 2 );++$i;?><tr class='od'>
						<td align='center'><?php echo ($kk_vo["sort"]); ?></td>
						<td><div class="boardb"><?php echo ($kk_vo["class_name"]); ?></div></td>
						<td align='center'>
							<a href="<?php echo U('/Admin/Setting/class_edit/',array('id'=>$kk_vo['id']));?>">修改</a>
							| <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/Setting/class_del/',array('id'=>$kk_vo['id']));?>','确定删除该栏目吗?')">删除</a>
						</td>
					</tr>
					<?php if(is_array($kk_vo['cc_class'])): foreach($kk_vo['cc_class'] as $key=>$c_vo): ?><tr class='od'>
							<td align='center'><?php echo ($c_vo["sort"]); ?></td>
							<td><div class="boardc"><?php echo ($c_vo["class_name"]); ?></div></td>
							<td align='center'>
								<a href="<?php echo U('/Admin/Setting/class_edit/',array('id'=>$c_vo['id']));?>">修改</a>
								| <a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('/Admin/Setting/class_del/',array('id'=>$c_vo['id']));?>','确定删除该栏目吗?')">删除</a>
							</td>
						</tr><?php endforeach; endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
</table>
</div>
</body>
	</html>