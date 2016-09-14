<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($class_info["class_name"]); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>/style.css">
    <link rel="stylesheet"  href="<?php echo C('CSS_URL');?>/zoom.css" media="all" />

    <!--商务通-->
    <script language=javascript>
        var LiveAutoInvite0='您好，来自%IP%的朋友';
        var LiveAutoInvite1='来自首页的对话';
        var LiveAutoInvite2=' 网站商务通 主要功能：<br>1、主动邀请<br>2、即时沟通<br>3、查看即时访问动态<br>4、访问轨迹跟踪<br>5、内部对话<br>6、不安装任何插件也实现双向文件传输<br><br><b>如果您有任何问题请接受此邀请以开始即时沟通</b>';
    </script>
    <script language="javascript" src="http://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT67204838&float=1&lng=cn"></script>

    <script type="text/javascript" src="<?php echo C('JS_URL');?>/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>/all.js"></script>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>/zoom.min.js"></script>
    <script type="text/javascript" src="<?php echo C('JS_URL');?>/jquery.movingboxes.js"></script>

</head>
<body>
<!-- 浮动 -->
<div class="talk">

    <div class="online">
        <ul>
            <li class="li-1">在线咨询<span class="close"></span></li>
            <li class="li-2"><a href="javascript:void(0)">xxxxxxxxx</a></li>
            <!--  <li class="li-3"><a href="javascript:void(0)">010-57290660</a></li>-->
        </ul>
    </div>

    <div class="online_2">
        <ul>
            <li class="li-1">电话咨询<span class="close"></span></li>
            <!--<li class="li-2"><a href="javascript:void(0)">123456789</a></li>-->
            <li class="li-2"><a href="javascript:void(0)">010-5729-0660</a></li>
        </ul>
    </div>
    <div class="ewm"></div>
    <ul class="flo-list">
        <li><a target='_blank' href="<?php echo C('SHANG_WU');?>"><img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/01.png" alt=""></a></li>
        <li id="online_1"><a href="javascript:void(0)"><img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/02.png" alt=""></a></li>
        <li id="online_2" style="cursor: pointer;"><a href="javascript:void(0)"><img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/03.png" alt=""></a></li>
        <li class="vip" style="cursor: pointer;"><a href="javascript:void(0)"><img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/04.png" alt=""></a></li>
        <li class="top"><img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/05.png" alt=""></li>
    </ul>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>/all.css">
<!-- nav -->
<div class="nav-wrap">
	<div class="nav">
		<div class="logo"><img src="/Public/index/images/logo.png" alt=""></div>
		<div class="nav-list">
			<ul class="nav-li">
				<li class="n-li">
					<a href="/"><span class="s-1">焕誉首页</span><span class="s-2">HOME</span></a>
				</li>
				<?php if(is_array($class_list)): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_class): $mod = ($i % 2 );++$i;?><li class="n-li">
						<?php if($p_class['class_name'] == '医疗团队'): ?><a href="<?php echo U('Home/Index/doctor_list');?>"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php elseif($p_class['class_name'] == '新闻动态'): ?>
							<a href="<?php echo U('Home/Index/band_info',array('id'=>157));?>"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php elseif($p_class['class_name'] == '品牌中心'): ?>
							<a href="#"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php elseif($p_class['class_name'] == '焕誉案例'): ?>
							<a href="<?php echo U('Home/Index/case_info');?>"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php else: ?>
							<a href="#"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a><?php endif; ?>

						<?php if($p_class['class_name'] == '品牌中心'): ?><div class="list">
								<ul class="li-ul">
									<?php if(is_array($p_class["p_class"])): $i = 0; $__LIST__ = $p_class["p_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k_class): $mod = ($i % 2 );++$i;?><li class="nav-list-li">
											<?php if($k_class['id'] == 113): ?><a href="<?php echo U('Home/Index/band_info',array('id'=>155));?>" class="li-a"><?php echo ($k_class["class_name"]); ?></a>
												<?php else: ?>
												<a href="<?php echo U('Home/Index/come');?>" class="li-a"><?php echo ($k_class["class_name"]); ?></a><?php endif; ?>
										</li><?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div><?php endif; ?>

						<?php if($p_class['class_name'] == '项目系列'): ?><div class="list">
								<ul class="li-ul">
									<?php if(is_array($p_class["p_class"])): $i = 0; $__LIST__ = $p_class["p_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k_class): $mod = ($i % 2 );++$i; if($k_class['id'] != '98'): ?><li class="nav-list-li">
												<a class="li-a"><?php echo ($k_class["class_name"]); ?></a>
												<div class="guide-li">
													<div class="f-l">
														<?php if(is_array($k_class["k_class"])): $i = 0; $__LIST__ = $k_class["k_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c_class): $mod = ($i % 2 );++$i;?><dl>
																<?php if($c_class['tid'] != NULL): ?><a href="<?php echo U('Home/Index/new_info',array('id'=>$c_class['tid']['id']));?>"><dt><?php echo ($c_class["class_name"]); ?></dt></a>
																	<?php else: ?>
																	<dt><?php echo ($c_class["class_name"]); ?></dt><?php endif; ?>
																<?php if(is_array($c_class['c_class'])): foreach($c_class['c_class'] as $key=>$c_vo): if($key == 0): ?><dd class="dd-bg"><a href="<?php echo U('Home/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a></dd>
																		<?php else: ?>
																		<dd><a href="<?php echo U('Home/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a></dd><?php endif; endforeach; endif; ?>
															</dl><?php endforeach; endif; else: echo "" ;endif; ?>
													</div>
													<ul class="hot">
														<li>热门项目</li>
														<li><a href=""><img src="/Public/index/images/nav-img-1.png" alt=""></a></li>
													</ul>
												</div>
											</li>
											<?php else: endif; endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div><?php endif; ?>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</div>
	</div>
</div>
<!-- banner -->
<div class="box-wrap">
	<div class="box">
		<ul class="slide-wrap">
			<li style="z-index:10;" class="b-l-1">
				<div class="b-box">
					<img src="/Public/index/images/b1-font1.png" alt="" class="img-1">
					<img src="/Public/index/images/b1-font2.png" alt="" class="img-2">
				</div>
			</li>
			<li class="b-l-2">
				<div class="b-box">
					<img src="/Public/index/images/b2-font.png" alt="" class="img-3">
				</div>
			</li>
		</ul>
		<ol>
			<li class="current"></li>
			<li></li>
		</ol>
		<span class="prev"></span>
		<span class="next"></span>
	</div>
</div>
<!-- 新闻列表 -->

<div class="doctor-list-wrap new-list-wrap">
	<ul class="list-nav">
		<?php if(is_array($pp_class)): $i = 0; $__LIST__ = $pp_class;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_l): $mod = ($i % 2 );++$i; if($key == 0): ?><li class="new-list-li nav-bg" style="border-left:1px solid #bc8b49">
					<span><?php echo ($p_l["class_name"]); ?></span>
					<ul class="new-list show">
						<?php else: ?>
						<li class="new-list-li" style="border-left:1px solid #bc8b49">
							<span><?php echo ($p_l["class_name"]); ?></span>
							<ul class="new-list"><?php endif; ?>
			<?php if($p_l["tid"] != NULL): ?><li>
					<a href="<?php echo U('Home/Index/new_info',array('id'=>$p_l['tid']['id']));?>">
						<p class="new-photo"><a href="<?php echo U('Home/Index/new_info',array('id'=>$p_l['tid']['id']));?>"><img src="<?php echo ($p_l["tid"]["img_url"]); ?>" alt=""></a></p>
						<p class="new-tit"><?php echo ($p_l["tid"]["title"]); ?></p>
						<p class="new-tit-m"><?php echo ($p_l["tid"]["description"]); ?></p>
						<p class="interact"><span class="date"><?php echo (date("Y-m-d",$p_l["tid"]["createtime"])); ?></span><span class="read"><?php echo ($p_l["tid"]["read_num"]); ?>阅读</span></p>
					</a>
				</li>
				<?php else: ?>
				<?php if(is_array($p_l["content"])): $i = 0; $__LIST__ = $p_l["content"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content): $mod = ($i % 2 );++$i; if(is_array($content)): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$content_list): $mod = ($i % 2 );++$i;?><li>
							<a href="<?php echo U('Home/Index/new_info',array('id'=>$content_list['id']));?>">
								<p class="new-photo"><a href="<?php echo U('Home/Index/new_info',array('id'=>$content_list['id']));?>"><img src="<?php echo ($content_list["img_url"]); ?>" alt=""></a></p>
								<p class="new-tit"><?php echo ($content_list["title"]); ?></p>
								<p class="new-tit-m"><?php echo ($content_list["description"]); ?></p>
								<p class="interact"><span class="date"><?php echo (date("Y-m-d",$content_list["createtime"])); ?></span><span class="read"><?php echo ($content_list["read_num"]); ?>阅读</span></p>
							</a>
						</li><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; endif; ?>

			<li class="page-wrap">
						<span class="page-list">
							<!--<span class="left"><img src="/Public/index/images/narr-l.png" alt=""></span>
							<span class="prev"><a href="">上一页</a></span>
							<span class="number"><a href="">1</a></span>
							<span class="number"><a href="">2</a></span>
							<span class="number"><a href="">3</a></span>
							<span class="number"><a href="">4</a></span>
							<span class="next"><a href="">下一页</a></span>
							<span class="right"><img src="/Public/index/images/narr-r.png" alt=""></span>-->
						</span>
			</li>

	</ul>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
</div>

<script type="text/javascript">

	window.onload=function(){
		var shHight=$('.show').height();//获取最开始显示的内容的高度
		$('.new-list-wrap').css('height', shHight);//新闻列表页获取的高度添加到大的div
		$('.doctor-list-wrap').css('height', shHight);//专家列表页获取的高度添加到大的div
		$('.list-nav .new-list-li,.list-nav .doc-list-li').click(function(event) {
			var dd=$(this).index();
			var newHight=$(this).children('.new-list').height();//当前的内容的高度
			var docHight=$(this).children('.doc-list').height();//专家当前的内容的高度

			$('.new-list-wrap').css('height', newHight);//新闻列表页高度赋给整个大的div
			$('.doctor-list-wrap').css('height', docHight);//专家列表页高度赋给整个大的div
			$(this).addClass('nav-bg').siblings('.list-nav .new-list-li').removeClass('nav-bg');//新闻列表页
			$(this).addClass('nav-bg').siblings('.list-nav .doc-list-li').removeClass('nav-bg');//专家列表页
			$('.doc-list').removeClass('show');//专家列表页
			$(this).children('.doc-list').addClass('show');//专家
			$('.new-list').removeClass('show');//新闻列表先把所有的show去掉
			$(this).children('.new-list').addClass('show');//新闻列表当前的对应的列表显示
		});
	}
</script>

<!-- 花纹 -->
<p class="huawen"></p>
<!-- footer -->
<div class="footer-wrap">
    <div class="footer">
        <div class="f-l">
            <p><img src="/Public/index/images/fot-logo.jpg" alt=""></p>
        </div>

        <div class="f-m">
            <ul class="f-nav">
                <?php if(is_array($foot_list)): $i = 0; $__LIST__ = $foot_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f_list): $mod = ($i % 2 );++$i;?><li>
                        <dl class="f-n-list">
                            <dt><?php echo ($f_list["class_name"]); ?></dt>
                            <?php if(is_array($f_list["zi_list"])): $i = 0; $__LIST__ = $f_list["zi_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$z_list): $mod = ($i % 2 );++$i; if($z_list['id'] == 60 or $z_list['id'] == 61 or $z_list['id'] == 62 or $z_list['id'] == 63 or $z_list['id'] == 77 or $z_list['id'] == 78 or $z_list['id'] == 79 or $z_list['id'] == 80): ?><dd><a href="<?php echo U('Home/Index/new_info',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd>
                                    <?php else: ?>
                                    <dd><a href="<?php echo U('Home/Index/new_list',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </dl>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

        <div class="f-r">
            <dl>
                <dt><img src="/Public/index/images/f-ewm.jpg" alt=""></dt>
                <dd>
                    <p class="p-y">焕誉美容官方微信</p>
                    <p class="p-w">公众号：bjhyylzx</p>
                    <p class="p-w">北京焕誉医疗美容</p>
                </dd>
            </dl>
            <p class="site">ADD : 北京市海淀区远大路22号院11号楼一层二层</p>
            <p class="f-phone">美丽热线 : 010-57290660</p>
            <p class="f-phone">美丽专线 : 400-7667-000</p>
        </div>
    </div>
    <div class="reg" style='height:20px;'><p style='height:20px;line-height:20px;'>copyright &#169; 2016-2026 huanyuzhengxing 北京焕誉医疗美容门诊部有限公司</p></div>
    <div style='text-align:center;background:#1d1d1d;font-size:12px;'><p>京ICP备16017287号-1   （京）医广【2016】第07-01-0355号</p></div>
</div>
</body>
</html>