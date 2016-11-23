<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <?php if(ACTION_NAME == 'new_info'): ?><title><?php echo ($info["title"]); ?></title>
        <?php else: ?>
        <title><?php echo ($class_info["class_name"]); ?></title><?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>/style.css">

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
<link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>/special.css">
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


    <style>
        body{
            margin:0px;font-family: "Microsoft YaHei";
        }
img{
    display:block;
    margin: 0px;
}
.wrap{
    width:100%;
    margin: 0 auto;
    overflow: hidden;
}
.banner{
    width:100%;
    heigth:720px;
    margin: 0 auto;
}
.floor1_bg{
    width:100%;
    height:850px;
    margin: 0 auto;
    background: url(<?php echo C('IMG_URL');?>/xz/wang_bg.jpg) center;
}
.jieshao{
    width:1200px;
    height:850px;
    margin: 0 auto;
    overflow: hidden;
}
.jieshao img{
    float: right;
}
.floor2{
    height:790px;
    background-color: #484848;
}
.title{
    width:700px;
    margin: 0 auto;
    text-align: center;
    margin-top: 25px;
}
.title h1{
font: 600 50px/50px "微软雅黑";
    color: white;
    line-height: 40px;
    letter-spacing:3px;
}
.title h2{
    font-size: 40px;
    color: #ffe900;
    line-height: 20px;
    letter-spacing:3px;
    padding-top: 25px;
}
.title p{
    width:80px;
    height:4px;
    background-color: #ffe900;
    margin: 30px auto;
}
.content{
    width:1200px;
    margin: 60px auto;
}
.content img{
    margin: 0 auto;

}
.weihai{
    width:1000px;
    height:180px;
    margin: 0 auto;
    background-color: #ffe900;
    overflow: hidden;
}
.weihai p{
    font-size: 24px;
    line-height: 44px;
    padding: 20px 60px 0 70px;
}
.floor3{
    height:1730px;
    background-color: #000000;
}
.floor4{
    height:2010px;
    background-color: #000000;
}
.jihua{
    height:690px;
    background: url(<?php echo C('IMG_URL');?>/xz/24hover.jpg) center;
    overflow: hidden;
}
.liyuan{
    background-color: #484848;
    width:350px;
    height:290px;
    color: white;
    font-size: 24px;
    padding-left: 30px;
    padding-top: 8px;
    font-weight: bold;
    letter-spacing:3px;
    float: right;
    line-height: 50px;
    margin-top: 30px;
}
.liyuan span{
    color: #ffe900;
    font-size: 40px;
}
.anli_tit{
    width:300px;
    height:110px;
    background-color: white;
    margin: 80px auto 50px auto;
    text-align: center;
    padding-top: 2px;
}
.anli_tit h1{
    font-size: 46px;
    line-height: 10px;
    padding-top: 25px;
}
.anli_tit h2{
    font-size: 26px;
    line-height: 28px;
    font-weight: lighter;
        padding-top: 40px;
}
.anli{
    width: 1200px;
    height:600px;
    margin: 0px auto;
}
.floor5{
    height:800px;
    background:url(<?php echo C('IMG_URL');?>/xz/shanchang_bg.gif) center;

}
.xijie{
    width:1050px;
    height:500px;
    margin: 70px auto;
    overflow: hidden;
}
.xijie img{
    float: left;
}
    </style>


<div class="wrap">
    <div class="banner">
    <img src="<?php echo C('IMG_URL');?>/xz/banner1.jpg"/>
    <img src="<?php echo C('IMG_URL');?>/xz/banner2.jpg"/>
    <img src="<?php echo C('IMG_URL');?>/xz/banner3.jpg"/>
    <img src="<?php echo C('IMG_URL');?>/xz/banner4.jpg"/>
    </div>
</div>
<div class="wrap floor1">
    <div class="floor1_bg">
        <div class="jieshao">
            <img src="<?php echo C('IMG_URL');?>/xz/jieshao.jpg"/>
        </div>
    </div>
</div>
<div class="wrap floor2">
    <div class="title">
        <h1>吸脂不当危害多</h1>
        <h2>不是最新的才是最好的</h2>
        <p></p>
    </div>
    <div class="content">
        <img src="<?php echo C('IMG_URL');?>/xz/weihai01.jpg"/>
        <div class="weihai"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;吸脂作为一项外科手术，对医生的资质、医院的资质、所用技术的安全性，护理的环节等各方面都有很高的要求。只有每个细节做到万无一失，每个术式都得到数年的大量临床验证，才能保障吸脂的绝对安全和优质效果。</p></div>
        <img src="<?php echo C('IMG_URL');?>/xz/weihai01.jpg"/>
    </div>
</div>
<div class="wrap floor3">
    <div class="title">
       <img src="<?php echo C('IMG_URL');?>/xz/tit.jpg"/>
    </div>
    <div class="lit_banner">
        <img src="<?php echo C('IMG_URL');?>/xz/01.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/02.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/03.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/04.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/05.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/06.jpg"/>
    </div>
</div>
<div class="wrap floor4">
    <div class="title">
        <h1>北京焕誉</h1>
        <h2>24小时瘦身计划</h2>
        <p></p>
    </div>
    <div class="content jihua">
        <div class="liyuan">
            <p><span>次日8点</span>离院<br/>
                拥有丰富经验的<span>王征</span>教授<br/>
                <span>只需一天</span><br/>
                就能让你轻松<span>享受</span><br/></p>
        </div>
    </div>
    <div class="anli_tit">
        <h1>案例对比</h1>
        <h2>LOSE WEIGHT</h2>
    </div>
    <div class="anli">
        <img src="<?php echo C('IMG_URL');?>/xz/anli1.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/anli2.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/anli3.jpg"/>
    </div>
</div>
<div class="wrap floor5">
    <div class="title">
        <h1>您所追求的细节</h1>
        <h2>也是我们最擅长的领域</h2>
        <p></p>
    </div>
    <div class="xijie">
        <img src="<?php echo C('IMG_URL');?>/xz/xijie01.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/xijie02.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/xijie03.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/xijie04.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/xijie05.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/xijie06.jpg"/>
    </div>
</div>
<div class="wrap">
    <div class="banner">
        <img src="<?php echo C('IMG_URL');?>/xz/zhuanjia01.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/zhuanjia02.jpg"/>
        <img src="<?php echo C('IMG_URL');?>/xz/zhuanjia03.jpg"/>
    </div>
</div>




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