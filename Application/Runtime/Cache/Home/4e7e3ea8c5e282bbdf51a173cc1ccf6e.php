<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <?php if(ACTION_NAME == 'new_info'): ?><title><?php echo ($info["title"]); ?></title>
        <?php else: ?>
        <title><?php echo ($class_info["class_name"]); ?></title><?php endif; ?>

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
        <li><a target='_blank' href="<?php echo C('SHANG_WU');?>"><img src="<?php echo C('IMG_URL');?>/zhuye_01.jpg" alt=""></a></li>
        <!--<li id="online_1"><a href="javascript:void(0)"><img src="<?php echo C('IMG_URL');?>/zhuye_02.jpg" alt=""></a></li>-->
        <li><a target='_blank' href="<?php echo C('SHANG_WU');?>"><img src="<?php echo C('IMG_URL');?>/zhuye_02.jpg" alt=""></a></li>
        <li id="online_2" style="cursor: pointer;"><a href="javascript:void(0)"><img src="<?php echo C('IMG_URL');?>/zhuye_03.jpg" alt=""></a></li>
        <li class="vip" style="cursor: pointer;"><a href="javascript:void(0)"><img src="<?php echo C('IMG_URL');?>/zhuye_04.jpg" alt=""></a></li>
        <li class="top"><img src="<?php echo C('IMG_URL');?>/zhuye_05.jpg" alt=""></li>
    </ul>
</div>

<link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>/all.css">
<script type="text/javascript" src="<?php echo C('JS_URL');?>/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php echo C('JS_URL');?>/jquery.carousel-1.1.js"></script>
<!--引用百度地图API-->
<style type="text/css">
	html,body{margin:0;padding:0;}
	.iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap;}
	.iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>

<!-- nav -->
<div class="nav-wrap">
	<div class="nav">
		<div class="logo"><img src="<?php echo C('IMG_URL');?>/logo.png" alt=""></div>
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
																<?php if(is_array($c_class['c_class'])): foreach($c_class['c_class'] as $key=>$c_vo): if($key == 0): ?><dd class="dd-bg"><a href="<?php echo C('SITE_URL');?>/xm/<?php echo ($c_vo['abbob']); ?>"><?php echo ($c_vo["class_name"]); ?></a></dd>
																		<!--<dd class="dd-bg"><a href="<?php echo U('Home/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a></dd>-->
																		<?php else: ?>
																		<dd><a href="<?php echo C('SITE_URL');?>/xm/<?php echo ($c_vo['abbob']); ?>"><?php echo ($c_vo["class_name"]); ?></a></dd>
																		<!--<dd><a href="<?php echo U('Home/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a></dd>--><?php endif; endforeach; endif; ?>
															</dl><?php endforeach; endif; else: echo "" ;endif; ?>
													</div>
											<!--		<ul class="hot">
														<li>热门项目</li>
														<li><a href=""><img src="<?php echo C('IMG_URL');?>/nav-img-1.png" alt=""></a></li>
													</ul>-->
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
					<img src="<?php echo C('IMG_URL');?>/b1-font1.png" alt="" class="img-1">
					<img src="<?php echo C('IMG_URL');?>/b1-font2.png" alt="" class="img-2">
				</div>
			</li>
			<li class="b-l-2">
				<div class="b-box">
					<img src="<?php echo C('IMG_URL');?>/b2-font.png" alt="" class="img-3">
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
<!--新闻详情-->
<div class="new-cont-wrap map-width">
	<ul class="pro-text">
		<li class="p-l">
			<p class="new-tit">来院路线</p>
			<p class="interact"><span class="pro-date">时间：2016-06-22 在线预约</span><span class="pro-ask"><a href="">咨询医生 进入专家答疑区>></a></span></p>
			<!--<p class="map"><img src="<?php echo C('IMG_URL');?>/map.jpg" alt=""></p>-->
			<div style="width:790px;height:320px;border:#ccc solid 1px;" id="dituContent"></div>
			<div class="menthod-wrap">
				<ul class="men-tit">
					<li class="mh">公交路线</li>
					<li>地铁路线</li>
					<li>机场路线</li>
					<li>火车站路线</li>
					<li>自驾路线</li>
				</ul>
				<ul class="men-cont">
					<li class="show">
						<p class="m-tit">公交路线<span>Bus Route</span></p>
						<p>乘坐【33路】、【79路】、【355路】、【360路】、【365路】、【425路】、【539路】、【611路】、【664路】、【992路】、【运通101快车】、【运通114线】、【运通118线】、【425快车】到（远大路东口）下车，沿远大路走530米，果蔬好超市对面。</p>
						<p class="phone">详情咨询：010-57290660,400-7667-000</p>
					</li>
					<li>
						<p class="m-tit">地铁路线<span>Metro Line</span></p>
						<p>乘坐【地铁10号线】，在【长春桥】下车(D2出口)直走1000米。</p>
						<p class="phone">详情咨询：010-57290660,400-7667-000</p>
					</li>
					<li>
						<p class="m-tit">首都国际机场路线<span>Airport Route</span></p>
						<p>T3航站楼站上车【机场线】到三元桥站下车，换乘地铁10号线，长春桥D2口出，直行1000m。即到北京焕誉医疗美容中心。</p>
						<p class="phone">详情咨询：010-57290660,400-7667-000</p>
					</li>
					<li>
						<p class="m-tit">北京站路线<span>Beijing Railway Station route</span></p>
						<p class="m-m">● 北京站路线：</p>
						<p>北京站上车，乘坐铁2号线（外环），朝阳门站换成地体6号线，慈寿寺站下车，换乘地铁10号线，长春桥站下车，D2口出，直行1000m即到北京焕誉医疗美容中心。</p>
						<p class="m-m">● 北京西站路线：</p>
						<p>北京西站上车，乘坐9号线，六里桥站下车，换乘地铁10号线，长春桥站下车，D2口出，直行1000m即到北京焕誉医疗美容中心。</p>
						<p class="m-m">● 北京南站路线：</p>
						<p>北京南站上车，乘坐地铁4号线，角门西站下车，换乘地铁10号线，长春桥站下车，D2口出，直行1000m即到北京焕誉医疗美容中心。</p>
						<p class="phone">详情咨询：010-57290660,400-7667-000</p>
					</li>
					<li>
						<p class="m-tit">自驾路线<span>Self Driving Route</span></p>
						<p>北京海淀区远大路22院11号楼；如中途路线不清楚，可电话咨询：010-57290660，400-7667-000，医院有停车场，方便您停车。</p>

					</li>
				</ul>
			</div>
			<p class="btn-wrap"><a target='_blank' href="http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT67204838&cid=1469000068684805339274&lng=cn&sid=1469000068684805339274&p=http%3A//hyuzx.com/&rf1=&rf2=&e=%25u6765%25u81EA%25u9996%25u9875%25u7684%25u5BF9%25u8BDD&bid=&d=1469000257113" class="btn-map">《在线询问焕誉到院路线》</a></p>
		</li>
		<li class="p-r">
			<p class="tit-text"><span class="s-1">推荐专家<strong>Experts recommend</strong></span><span class="s-2"><a href="<?php echo U('Home/Index/doctor_list');?>">MORE&nbsp;></a></span></p>
			<ul class="zj-list">
				<?php if(is_array($doctor_list)): $i = 0; $__LIST__ = $doctor_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d_list): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('Home/Index/doctor_info',array('id'=>$d_list['id']));?>">
							<img src="<?php echo C('SITE_URL'); echo (substr($d_list["img_url"],1)); ?>" alt="">
							<p class="p-1"><?php echo ($d_list["name"]); ?></p>
							<p class="p-2"><?php echo ($d_list["zhicheng"]); ?></p>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div class="pro-daily">
				<p class="tit-text"><span class="s-1">蜕变日记<strong>Metamorphosis diary</strong></span><span class="s-2"><a href="<?php echo U('Home/Index/case_info');?>">MORE&nbsp;></a></span></p>
				<div class="bd">
					<a href="<?php echo U('Home/Index/case_info',array('id'=>$case_info['id']));?>">
						<p class="photo"><img src="<?php echo C('SITE_URL'); echo (substr($d_list["img_url"],1)); ?>" alt=""></p>
						<ul class="text">
							<li class="p-2">
								<p class="name"><?php echo ($case_info["name"]); ?><span>They are here to find the youth and beauty</span></p>
								<p class=" explain"><?php echo ($case_info["jianyan"]); ?></p>
							</li>
						</ul>
					</a>
				</div>
			</div>
			<div class="relate">
				<p class="tit-text"><span class="s-1">就诊指南<strong>Treatment guidelines</strong></span></p>
				<p class="tel"><span>美丽热线：</span>010-57290660</p>
				<p class="clock"><span>门诊时间：</span>9:00-21:00(无假日医院)</p>
				<p class="dizh"><span>医院地址：</span>北京市海淀区远大路22号院11号楼一层二层</p>
				<p class="btn-wrap"><a target='_blank' href="http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT67204838&cid=1469000068684805339274&lng=cn&sid=1469000068684805339274&p=http%3A//hyuzx.com/&rf1=&rf2=&e=%25u6765%25u81EA%25u9996%25u9875%25u7684%25u5BF9%25u8BDD&bid=&d=1469000257113" class="btn-zj">在线咨询</a><a target='_blank' href="http://pkt.zoosnet.net/LR/Chatpre.aspx?id=PKT67204838&cid=1469000068684805339274&lng=cn&sid=1469000068684805339274&p=http%3A//hyuzx.com/&rf1=&rf2=&e=%25u6765%25u81EA%25u9996%25u9875%25u7684%25u5BF9%25u8BDD&bid=&d=1469000257113" class="price">免费预约</a></p>
			</div>
		</li>
	</ul>
	<!--文章列表轮播 -->
	<div class='con-list-wrap'>
		<p class="tit">相关推荐<span>related suggestion</span></p>
		<ul class="text-list">
			<?php if(is_array($related_list)): $i = 0; $__LIST__ = $related_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$r_list): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/Index/new_info',array('id'=>$r_list['id']));?>"><?php echo ($r_list["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
	</div>
</div>

<script type="text/javascript">
	//创建和初始化地图函数：
	function initMap(){
		createMap();//创建地图
		setMapEvent();//设置地图事件
		addMapControl();//向地图添加控件
		addMarker();//向地图中添加marker
	}

	//创建地图函数：
	function createMap(){
		var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
		var point = new BMap.Point(116.289136,39.963412);//定义一个中心点坐标
		map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
		window.map = map;//将map变量存储在全局
	}

	//地图事件设置函数：
	function setMapEvent(){
		map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
		map.enableScrollWheelZoom();//启用地图滚轮放大缩小
		map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
		map.enableKeyboard();//启用键盘上下左右键移动地图
	}

	//地图控件添加函数：
	function addMapControl(){
		//向地图中添加缩放控件
		var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
		map.addControl(ctrl_nav);
		//向地图中添加比例尺控件
		var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
		map.addControl(ctrl_sca);
	}

	//标注点数组
	var markerArr = [{title:"焕誉整形医院",content:"北京市海淀区远大路22号院11号楼一层二层",point:"116.289495|39.963264",isOpen:1,icon:{w:21,h:21,l:0,t:0,x:6,lb:5}}
	];
	//创建marker
	function addMarker(){
		for(var i=0;i<markerArr.length;i++){
			var json = markerArr[i];
			var p0 = json.point.split("|")[0];
			var p1 = json.point.split("|")[1];
			var point = new BMap.Point(p0,p1);
			var iconImg = createIcon(json.icon);
			var marker = new BMap.Marker(point,{icon:iconImg});
			var iw = createInfoWindow(i);
			var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
			marker.setLabel(label);
			map.addOverlay(marker);
			label.setStyle({
				borderColor:"#808080",
				color:"#333",
				cursor:"pointer"
			});

			(function(){
				var index = i;
				var _iw = createInfoWindow(i);
				var _marker = marker;
				_marker.addEventListener("click",function(){
					this.openInfoWindow(_iw);
				});
				_iw.addEventListener("open",function(){
					_marker.getLabel().hide();
				})
				_iw.addEventListener("close",function(){
					_marker.getLabel().show();
				})
				label.addEventListener("click",function(){
					_marker.openInfoWindow(_iw);
				})
				if(!!json.isOpen){
					label.hide();
					_marker.openInfoWindow(_iw);
				}
			})()
		}
	}
	//创建InfoWindow
	function createInfoWindow(i){
		var json = markerArr[i];
		var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
		return iw;
	}
	//创建一个Icon
	function createIcon(json){
		var icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
		return icon;
	}

	initMap();//创建和初始化地图
</script>

<!-- 花纹 -->
<p class="huawen"></p>
<!-- footer -->
<div class="footer-wrap">
    <div class="footer">
        <div class="f-l">
            <p><img src="<?php echo C('IMG_URL');?>/fot-logo.jpg" alt=""></p>
        </div>

        <div class="f-m">
            <ul class="f-nav">
                <?php if(is_array($foot_list)): $i = 0; $__LIST__ = $foot_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$f_list): $mod = ($i % 2 );++$i;?><li>
                        <dl class="f-n-list">
                            <dt><?php echo ($f_list["class_name"]); ?></dt>
                            <?php if(is_array($f_list["zi_list"])): $i = 0; $__LIST__ = $f_list["zi_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$z_list): $mod = ($i % 2 );++$i; if($z_list['id'] == 60 or $z_list['id'] == 61 or $z_list['id'] == 62 or $z_list['id'] == 63 or $z_list['id'] == 77 or $z_list['id'] == 78 or $z_list['id'] == 79 or $z_list['id'] == 80): ?><!--<dd><a href="<?php echo U('Home/Index/new_info',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd>-->

                                    <dd><a href="<?php echo C('SITE_URL');?>/xm/<?php echo ($z_list['abbob']); ?>"><?php echo ($z_list["class_name"]); ?></a></dd>
                                    <?php else: ?>
                                    <!--<dd><a href="<?php echo U('Home/Index/new_list',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd>-->
                                    <dd><a href="<?php echo C('SITE_URL');?>/xm/<?php echo ($z_list['abbob']); ?>"><?php echo ($z_list["class_name"]); ?></a></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </dl>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>

        <div class="f-r">
            <dl>
                <dt><img src="<?php echo C('IMG_URL');?>/f-ewm.jpg" alt=""></dt>
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