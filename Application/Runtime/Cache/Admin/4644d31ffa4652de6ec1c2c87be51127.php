<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    <form action="<?php echo U('/Admin/Case/case_edit');?>" method="post" name="form" id="myform" enctype="multipart/form-data">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td colspan="9" class="table_title">
                    修改案例
                </td>
            </tr>

            <tr class="tr rt">
                <td width="100">姓名：</td>
                <td colspan="3" class="lt">
                    <input type="text" name="name" style="width:200px" value="<?php echo ($info["name"]); ?>">
                </td>
            </tr>

            <tr class="tr rt">
                <td width="100">感言:</td>
                <td colspan="3" class="lt">

                    <textarea name='jianyan' rows='3' cols='50'><?php echo ($info["jianyan"]); ?></textarea>
                </td>
            </tr>

            <tr class="tr rt">
                <td width="100">效果图：</td>
                <td colspan="3" class="lt">
                    <input type="file" name="img_url" size="28" value='浏览...'/>
                    <?php if(!empty($info["img_url"])): ?><img src="<?php echo C('SITE_URL');?>/<?php echo ($info["img_url"]); ?>"/><?php endif; ?>
                </td>
            </tr>

            <tr class="tr rt">
                <td width="100">列表图：</td>
                <td colspan="3" class="lt">
                    <input type="file" name="list_url" size="28" value='浏览...'/>
                    <?php if(!empty($info["list_url"])): ?><img src="<?php echo C('SITE_URL');?>/<?php echo ($info["list_url"]); ?>"/><?php endif; ?>
                </td>
            </tr>

            <tr class="tr rt">
                <td width="100">推荐小图片：</td>
                <td colspan="3" class="lt">
                    <input type="file" name="min_url" size="28" value='浏览...'/>
                    <?php if(!empty($info["min_url"])): ?><img src="<?php echo C('SITE_URL');?>/<?php echo ($info["min_url"]); ?>"/><?php endif; ?>
                </td>
            </tr>

            <!--				<tr class="tr rt">
                                <td width="100">推荐:</td>
                                <td colspan="3" class="lt">
                                    <?php if($info['related'] == 1): ?><input type="checkbox" name="related" value="1" checked>
                                    <?php else: ?>
                                        <input type="checkbox" name="related" value="1"><?php endif; ?>
                                </td>
                            </tr>-->
            <tr class="tr rt">
                <td width="100">治疗过程:</td>
                <td colspan="3" class="lt">
                    <textarea id='ue_content' name='content' style="width:800px;height:250px;"><?php echo ($info["course"]); ?></textarea>
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
                    <input class="bginput" type="button" onclick="javascript:history.back(-1);" value="返 回"></td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">

    var ue = UE.getEditor('ue_content');

</script>
</body>
</html>