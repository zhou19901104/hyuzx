<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo ($class_info["class_name"]); ?>_北京焕誉医疗美容</title>
	<link rel="stylesheet" type="text/css" href="/Public/index/css/all.css">
	<link rel="stylesheet" type="text/css" href="/Public/index/css/style.css">
	<link rel="stylesheet"  href="/Public/index/css/zoom.css" media="all" />
<script language=javascript>
var LiveAutoInvite0='您好，来自%IP%的朋友';
var LiveAutoInvite1='来自首页的对话';
var LiveAutoInvite2=' 网站商务通 主要功能：<br>1、主动邀请<br>2、即时沟通<br>3、查看即时访问动态<br>4、访问轨迹跟踪<br>5、内部对话<br>6、不安装任何插件也实现双向文件传输<br><br><b>如果您有任何问题请接受此邀请以开始即时沟通</b>';
</script>
<script language="javascript" src="http://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT67204838&float=1&lng=cn"></script>
<script type="text/javascript" src="/Public/index/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/Public/index/js/all.js"></script>
<script type="text/javascript" src="/Public/index/js/zoom.min.js"></script>
<script type="text/javascript" src="/Public/index/js/jquery.movingboxes.js"></script>
</head>
<body>
<!-- 在线联系 -->
<!-- 浮动 -->
	<div class="talk">
		<div class="online">
			<ul>
				<li class="li-1">在线咨询<span class="close"></span></li>
				<li class="li-2"><a href="javascript:void(0)">xxxxxxxx</a></li>
				<li class="li-3"><a href="javascript:void(0)">010-57290660</a></li>
			</ul>
		</div>
		<div class="ewm"></div>
		<ul class="flo-list">
			<li><a target='_blank' href="http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT67204838&cid=1469000068684805339274&lng=cn&sid=1469000068684805339274&p=http%3A//hyuzx.com/&rf1=&rf2=&e=%25u6765%25u81EA%25u9996%25u9875%25u7684%25u5BF9%25u8BDD&bid=&d=1469000257113"><img src="/Public/index/images/serve-img.png" alt=""></a></li>
			<li id="online"><a href="javascript:void(0)"><img src="/Public/index/images/talk-img.png" alt=""></a></li>
			<li class="vip" style="cursor: pointer;"><a href="javascript:void(0)"><img src="/Public/index/images/VIP-img.png" alt=""></a></li>
			<li class="top"><img src="/Public/index/images/top-img.png" alt=""></li>
		</ul>
	</div>
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
							<?php if($p_class['class_name'] == '医疗团队'): ?><a href="<?php echo U('Index/Index/doctor_list');?>"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php elseif($p_class['class_name'] == '新闻动态'): ?>
								<a href="<?php echo U('Index/Index/band_info',array('id'=>157));?>"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php elseif($p_class['class_name'] == '品牌中心'): ?>
								<a href="#"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php elseif($p_class['class_name'] == '焕誉案例'): ?>
								<a href="<?php echo U('Index/Index/case_info');?>"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
							<?php else: ?>
								<a href="#"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a><?php endif; ?>
							
							<?php if($p_class['class_name'] == '品牌中心'): ?><div class="list">
									<ul class="li-ul">
										<?php if(is_array($p_class["p_class"])): $i = 0; $__LIST__ = $p_class["p_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$k_class): $mod = ($i % 2 );++$i;?><li class="nav-list-li">
												<?php if($k_class['id'] == 113): ?><a href="<?php echo U('Index/Index/band_info',array('id'=>155));?>" class="li-a"><?php echo ($k_class["class_name"]); ?></a>
												<?php else: ?>
													<a href="<?php echo U('Index/Index/come');?>" class="li-a"><?php echo ($k_class["class_name"]); ?></a><?php endif; ?>
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
															<?php if($c_class['tid'] != NULL): ?><a href="<?php echo U('Index/Index/new_info',array('id'=>$c_class['tid']['id']));?>"><dt><?php echo ($c_class["class_name"]); ?></dt></a>
															<?php else: ?>
																<dt><?php echo ($c_class["class_name"]); ?></dt><?php endif; ?>
															<?php if(is_array($c_class['c_class'])): foreach($c_class['c_class'] as $key=>$c_vo): if($key == 0): ?><dd class="dd-bg"><a href="<?php echo U('Index/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a></dd>
																<?php else: ?>
																	<dd><a href="<?php echo U('Index/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a></dd><?php endif; endforeach; endif; ?>
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
	<!-- 专家列表 -->
	<p class="doc-tit"><img src="/Public/index/images/zj-tit.png" alt=""></p>
	<div class="doctor-list-wrap">
		<ul class="list-nav">
			<li >
				<ul class="doc-list show">
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<p class="doc-photo"><a href="<?php echo U('Index/Index/doctor_info',array('id'=>$vo['id']));?>"><img src="/Public/Uploads/doctor/list_<?php echo ($vo["img_url"]); ?>" alt=""></a></p>
						<p class="name"><?php echo ($vo["name"]); ?></p>
						<p class="position"><?php echo ($vo["zhicheng"]); ?></p>
						<p class="btn"><a target='_blank' href="http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT67204838&cid=1469000068684805339274&lng=cn&sid=1469000068684805339274&p=http%3A//hyuzx.com/&rf1=&rf2=&e=%25u6765%25u81EA%25u9996%25u9875%25u7684%25u5BF9%25u8BDD&bid=&d=1469000257113">在线预约</a></p>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</li>
		</ul>
	</div>
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
							<?php if(is_array($f_list["zi_list"])): $i = 0; $__LIST__ = $f_list["zi_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$z_list): $mod = ($i % 2 );++$i; if($z_list['id'] == 60 or $z_list['id'] == 61 or $z_list['id'] == 62 or $z_list['id'] == 63 or $z_list['id'] == 77 or $z_list['id'] == 78 or $z_list['id'] == 79 or $z_list['id'] == 80): ?><dd><a href="<?php echo U('Index/Index/new_info',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd>
								<?php else: ?>
									<dd><a href="<?php echo U('Index/Index/new_list',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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