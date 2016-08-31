<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理中心-<?php echo (C("cms_name")); ?></title>
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

<link type="text/css" rel="stylesheet" href="/Public/css/main.css"/>
<script language="javascript">
$(function(){
	//窗口
	var set_h = function(){
        var heights = document.documentElement.clientHeight-80;
        $("#MainIframe, .menubox").height(heights-9);
        $('body').css('overflow','hidden');
    }
    $(window).resize(function(){
        set_h();
    });
    set_h();
	//菜单事件
    //默认载入左侧菜单
    $('.MenuList').load($('.MenuList').attr('data-uri'));
	//左侧菜单收缩
	$('.actuator').live('click',function(){
		var _self = $(this), par = _self.parent();
		if(par.attr('class')=='treemenu_on')
		{
			par.removeClass().addClass('treemenu_off');
			par.find('.submenu').slideUp(100);
		}else{
			par.removeClass().addClass('treemenu_on');
			par.find('.submenu').slideDown(100);
		}		
	});	

    //顶部菜单点击
    $('#topnav a').live('click', function(){
        var data_id = $(this).attr('data-id');
        //改变样式
        $(this).parent().addClass("on").siblings().removeClass("on");
        //改变左侧
		$.get($('.MenuList').attr('data-uri'), { id: data_id },
			function(data){
				$('.MenuList').html(data);
				$('#MainIframe').attr('src',$('.MenuList li ul li a').attr('href'));
		});
    });	
	$('.submenu li').live('click',function(){
		$('.submenu li').each(function(i){
			$(this).find('a').removeClass();
		});
		$(this).find('a').removeClass().addClass('submenuB');
	});
});
function refresh() {
	parent.MainIframe.location.reload();
}
</script>
</head>
<body scroll="no" style="margin:0; padding:0;">

<div class="header">
    <div class="logo"><a href="<?php echo U('/index');?>" >&nbsp;</a></div>
    <div class="nav_sub">
    	<?php if($re["pj"] != NULL): ?><a href="javascript:void(0);" class="leftclick">隐藏左菜单</a>
       您好,<?php echo ($re['brand']); ?> &nbsp; | 
       <a href="javascript:void(0);" onclick="refresh();">刷新</a> | 
       <a href="<?php echo U('/Admin/Login/logout');?>" target="_parent">[退出]</a><br>
       <h1>

       	您是我们
       	<?php if(($re["pj"]) == "1"): ?><font color='yellow'>★☆☆☆☆</font><?php endif; ?>
       	<?php if(($re["pj"]) == "2"): ?><font color='yellow'>★★☆☆☆</font><?php endif; ?>
       	<?php if(($re["pj"]) == "3"): ?><font color='yellow'>★★★☆☆</font><?php endif; ?>
       	<?php if(($re["pj"]) == "4"): ?><font color='yellow'>★★★★☆</font><?php endif; ?>
       	<?php if(($re["pj"]) == "5"): ?><font color='yellow'>★★★★★</font><?php endif; ?>
       	用户
       </h1>

    		<?php else: ?>
    	<a href="javascript:void(0);" class="leftclick">隐藏左菜单</a>
       您好,<?php echo ($_SESSION['username']); ?> &nbsp; | 
       <a href="javascript:void(0);" onclick="refresh();">刷新</a> | 
       <a href="<?php echo U('Login/logout');?>" target="_parent">[退出]</a><br><?php endif; ?>
    </div>
    <ul class="nav" id="topnav">	
		<?php if(is_array($main_menu)): $i = 0; $__LIST__ = $main_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i == 1){ $first_menu_id = $vo['id']; } ?>
			
			<li <?php if(($i) == "1"): ?>class="on"<?php endif; ?>><a style="outline:none;" hidefocus="true" data-id="<?php echo ($vo['id']); ?>" href="javascript:;"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>                   
</div>
<div class="LeftMenu">
    <div class="menubox">
        <ul id="root_index" class="MenuList" data-uri="<?php echo U('/Admin/Index/left', array('id'=>$first_menu_id)); ?>">
        	<?php echo ($sub_menu_html); ?>

        </ul>
        <div class="cl"></div>
    </div>
                        
</div>

<div class="right_main">
	<div class="header_line"><span>&nbsp;</span></div>
	<iframe width="100%" scrolling="yes" height="100%" frameborder="0" noresize="" src="<?php echo U('/Admin/Index/main');?>" name="MainIframe" id="MainIframe"></iframe>
</div>

</body>
</html>