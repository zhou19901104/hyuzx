<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="<?php echo C('IMG_URL');?>/favicon.ico" type="image/x-icon"/>
  <title>北京焕誉医疗美容官方网站_北京医疗整形_北京医疗美容</title>
  <meta content="整形美容,北京焕誉,北京焕誉医疗美容,北京整形美容" name="keywords"/>
  <meta
          content="北京焕誉医疗美容以“良心、诚心、精心”为核心价值观，遵循“用科技与美丽邂逅，以信誉让生命焕彩”的服务宗旨，开设美容皮肤科、美容外科、注射微整形、美容牙科四大整形美容项目，全方位打造中国整形美容旗舰品牌。美丽热线 : 010-57290660 400-7667-000"
          name="description"/>
  <meta name="renderer" content="webkit"/>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
  <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>/all2.css">
  <link rel="stylesheet" type="text/css" href="<?php echo C('CSS_URL');?>/style.css">
  <link rel="stylesheet" href="<?php echo C('CSS_URL');?>/zoom.css" media="all"/>

  <script type="text/javascript" src="<?php echo C('JS_URL');?>/jquery-1.10.2.min.js"></script>
  <script type="text/javascript" src="<?php echo C('JS_URL');?>/all.js"></script>
  <script type="text/javascript" src="<?php echo C('JS_URL');?>/zoom.min.js"></script>

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
    <li id="online_1"><a href="javascript:void(0)"><img src="<?php echo C('IMG_URL');?>/zhuye_02.jpg" alt=""></a></li>
    <li id="online_2" style="cursor: pointer;"><a href="javascript:void(0)"><img src="<?php echo C('IMG_URL');?>/zhuye_03.jpg" alt=""></a></li>
    <li class="vip" style="cursor: pointer;"><a href="javascript:void(0)"><img src="<?php echo C('IMG_URL');?>/zhuye_04.jpg" alt=""></a></li>
    <li class="top"><img src="<?php echo C('IMG_URL');?>/zhuye_05.jpg" alt=""></li>
  </ul>
</div>

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
              <a href="<?php echo U('Home/Index/band_info',array('id'=>157));?>"><span
                      class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
              <?php elseif($p_class['class_name'] == '品牌中心'): ?>
              <a href=""><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
              <?php elseif($p_class['class_name'] == '焕誉案例'): ?>
              <a href="<?php echo U('Home/Index/case_info');?>"><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a>
              <?php else: ?>
              <a href=""><span class="s-1"><?php echo ($p_class["class_name"]); ?></span><span class="s-2"><?php echo ($p_class["class_e_name"]); ?></span></a><?php endif; ?>

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
                                <?php if($c_class['tid'] != NULL): ?><!--    <a href="<?php echo U('Home/Index/new_info',array('id'=>$c_vo['id']));?>"> -->

                                    <dt><?php echo ($c_class["class_name"]); ?></dt>
                                  </a>
                                  <?php else: ?>
                                  <dt><?php echo ($c_class["class_name"]); ?></dt><?php endif; ?>
                            <?php if(is_array($c_class['c_class'])): foreach($c_class['c_class'] as $key=>$c_vo): if($key == 0): ?><dd class="dd-bg"><a href="<?php echo U('Home/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a>
                                    </dd>
                                    <?php else: ?>
                                    <dd>                            <a href="<?php echo U('Home/Index/new_info',array('id'=>$c_vo['id']));?>"><?php echo ($c_vo["class_name"]); ?></a>
                                    </dd><?php endif; endforeach; endif; ?>
                              </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                          </div>
            <!--          <ul class="hot">
                   <li>热门项目</li>
                   <li><a href="<?php echo U('Home/Index/new_info',array('id'=>$hot_info['id']));?>"><img
                           src="<?php echo ($hot_info["img_url"]); ?>" alt=""></a></li>
                 </ul> -->
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
<!-- 项目列表 -->
<div class="project-wrap">
  <p class="pro-tit"><img src="<?php echo C('IMG_URL');?>/pro-tit.png" alt=""></p>
  <div class="pro-list">
    <div class="prolist" style="height: 520px;">
      <ul class="prslide">
        <?php if(is_array($p_list)): $i = 0; $__LIST__ = $p_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p_l): $mod = ($i % 2 );++$i; if($p_l['id'] != 98): ?><li class="bd">
              <img src="<?php echo C('IMG_URL');?>/p-<?php echo ($key); ?>.png" alt="">
              <p class="p-1"><?php echo ($p_l["class_name"]); ?></p>
              <p class="p-2"><?php echo ($p_l["class_e_name"]); ?></p>
              <div class="none block">
                <p class="p-3"><?php echo ($p_l["introduction"]); ?></p>
                <p class="p-4"><a href="<?php echo U('Home/Index/new_list',array('id'=>$p_l['id']));?>">更多</a></p>
              </div>
            </li>
            <?php else: ?>
    <!--        <li class="bd">
              <img src="<?php echo C('IMG_URL');?>/p-<?php echo ($key); ?>.png" alt="">
              <p class="p-1"><?php echo ($p_l["class_name"]); ?></p>
              <p class="p-2"><?php echo ($p_l["class_e_name"]); ?></p>
              <div class="none block">
                <p class="p-3"><?php echo ($p_l["introduction"]); ?></p>
                <p class="p-4"><a href="/">更多</a></p>
              </div>
            </li>--><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <!--<span class="s-s-l"></span>
    <span class="s-s-r"></span>-->
  </div>
</div>


<div class="special_doctor">
  <p class="zj-tit"><img src="<?php echo C('IMG_URL');?>/zj-tit.png" alt=""></p>
</div>


<!-- 专家团队 -->
<div class="doctor-wrap">
  <div class="doctor">
    <div class="zj-list">
      <div class="zj-l">
        <?php if(is_array($doctor_list)): $i = 0; $__LIST__ = $doctor_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img_list): $mod = ($i % 2 );++$i; if($key == 0): ?><div class="big-img"><img src="<?php echo C('SITE_URL'); echo (substr($img_list["bg_img_url"],1)); ?>" alt=""></div>
            <?php else: ?>
            <div class="big-img" style="display:none;"><img src="<?php echo C('SITE_URL'); echo (substr($img_list["bg_img_url"],1)); ?>"
                                                            alt=""></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </div>
      <div class="zj-r">
        <div class="r-t">
          <?php if(is_array($doctor_list)): $i = 0; $__LIST__ = $doctor_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$d_list): $mod = ($i % 2 );++$i; if($key == 0): ?><div class="cont cy-none">
                <?php else: ?>
                <div class="cont"><?php endif; ?>
            <p class="name"><?php echo ($d_list["name"]); ?>/<span class="job"><?php echo ($d_list["zhicheng"]); ?></span></p>
            <p class="lan"><?php echo ($d_list["index_message"]); ?></p>
            <p class="p-3"><?php echo ($d_list["jianjie"]); ?></p>
            <p class="cy-tit">主打方向 Main Direction</p>

            <ul class="cy-list">
              <?php if(is_array($d_list["jingli"])): $i = 0; $__LIST__ = $d_list["jingli"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$j_list): $mod = ($i % 2 );++$i;?><li><?php echo ($j_list); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

        </div><?php endforeach; endif; else: echo "" ;endif; ?>

      </div>

      <div class="r-b-wrap">
        <div class="r-b">
          <ul class="zjslide">

<!--             <li><a href="<?php echo C('SITE_URL');?>/Home/Index/doctor_info/id/6"><img src="<?php echo C('IMG_URL');?>/z-0.png"
                                                                     alt=""></a></li>
<li><a href="<?php echo C('SITE_URL');?>/Home/Index/doctor_info/id/12"><img src="<?php echo C('IMG_URL');?>/z-4.png"
                                                                      alt=""></a></li>
<li><a href="<?php echo C('SITE_URL');?>/Home/Index/doctor_info/id/15"><img src="<?php echo C('IMG_URL');?>/z-12.png"
                                                                      alt=""></a></li>
<li><a href="javascript:void(0);"><img src="<?php echo C('IMG_URL');?>/z-1.png" alt=""></a></li>
<li><a href="<?php echo C('SITE_URL');?>/Home/Index/doctor_info/id/14"><img src="<?php echo C('IMG_URL');?>/z-6.png"
                                                                      alt=""></a></li>
<li><a href="<?php echo C('SITE_URL');?>/Home/Index/doctor_info/id/11"><img src="<?php echo C('IMG_URL');?>/z-2.png"
                                                                      alt=""></a></li>
<li><a href="javascript:void(0);"><img src="<?php echo C('IMG_URL');?>/z-3.png" alt=""></a></li>

<li><a href="<?php echo C('SITE_URL');?>/Home/Index/doctor_info/id/13"><img src="<?php echo C('IMG_URL');?>/z-5.png"
                                                                      alt=""></a></li> -->
                                                                    <?php if(is_array($doctor_list)): foreach($doctor_list as $key=>$val): ?><li><a href="<?php echo U('Index/doctor_info',array('id' => $val['id']));?>"><img src="<?php echo C('SITE_URL'); echo (substr($val["th_img_url"],1)); ?>" alt=""></a></li><?php endforeach; endif; ?>


          </ul>
        </div>
        <span class="s-s-l"></span>
        <span class="s-s-r"></span>
      </div>

    </div>
  </div>
</div>
</div>


<!-- 成功案例 -->
<div class="case-wrap">
  <p class="case-tit"><img src="<?php echo C('IMG_URL');?>/case-tit.png" alt=""></p>

  <div class="ca-list">

    <div class="calist">

      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_case1.jpg" alt="">
      </div>
      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_name1.jpg" alt="">
        <div class="caslide_left"></div>
      </div>
      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_case2.jpg" alt="">
      </div>
      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_name2.jpg" alt="">
        <div class="caslide_left"></div>
      </div>
      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_name3.jpg" alt="">
        <div class="caslide_right"></div>
      </div>
      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_case3.jpg" alt="">
      </div>
      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_name4.jpg" alt="">
        <div class="caslide_right"></div>
      </div>
      <div class="caslide">
        <img src="<?php echo C('SITE_URL');?>/Public/Uploads/comm/anli_case4.jpg" alt="">
      </div>


    </div>

  </div>
</div>


<!-- 环境设备 -->
<div class="huan-wrap">
  <div class="huanjing">
    <p class="huan-tit"><img src="<?php echo C('IMG_URL');?>/hj-tit.png" alt=""></p>
    <div class="j-1">
      <p class="j-1-l"><img src="<?php echo C('IMG_URL');?>/j-1.jpg" alt=""></p>
      <div class="j-1-r">
        <p><img src="<?php echo C('IMG_URL');?>/j-tit1.png" alt=""></p>
        <p class="j-text">
          焕誉本着一切为客户服务的初心，按照人性化尊贵定制设计标准，医院整体氛围高贵、典雅、舒适，把权威的医学团队和个性化的审美理念相结合。医院除了主流的医美设备供给顾客，同时也设有多间豪华VIP套房，色彩温馨，装修华丽，雅致的环境让您有"家"的感觉。焕誉一切从客户出发，一切为客户服务，争当行业服务标杆，为一切求美者提供完善专业的医美服务。</p>
      </div>
    </div>
    <div class="j-2">
      <div class="j-2-l">
        <p><img src="<?php echo C('IMG_URL');?>/j-tit2.png" alt=""></p>
        <p class="j-text">
          北京焕誉医疗美容是由威高集团牵头注资倾力打造的专业整形美容医院，拥有经验丰富的整形专家和多样的医美设备。医院以“良心、诚心、精心”为核心价值观，遵循“用科技与美丽邂逅，以信誉让生命焕彩”的服务宗旨，倡导科学美容、规范美容、个性美容理念；始终以医学和美学原理为指导，致力于美学精髓与现代医疗美容技术的完美融合，开创适合中国人的东方式医学美学理念。医院严格按照国家的手术室建设标准，以高标准、高要求，追求精益求精的专业医疗技术与优质服务，可为求美者实施各类美容整形手术及治疗，实现安全、快速塑美。</p>
      </div>
      <p class="j-2-r"><img src="<?php echo C('IMG_URL');?>/j-2.jpg" alt=""></p>
    </div>
  </div>
  <div class="huan-list">
    <div class="gallery">
      <ul class="hjslide ">
        <li><a href="<?php echo C('IMG_URL');?>/hj-1-b.png"><img src="<?php echo C('IMG_URL');?>/hj-1.png" alt=""></a></li>
        <li><a href="<?php echo C('IMG_URL');?>/hj-2-b.png"><img src="<?php echo C('IMG_URL');?>/hj-2.png" alt=""></a></li>
        <li><a href="<?php echo C('IMG_URL');?>/hj-3-b.png"><img src="<?php echo C('IMG_URL');?>/hj-3.png" alt=""></a></li>
        <li><a href="<?php echo C('IMG_URL');?>/hj-4-b.png"><img src="<?php echo C('IMG_URL');?>/hj-4.png" alt=""></a></li>
        <li><a href="<?php echo C('IMG_URL');?>/hj-5-b.png"><img src="<?php echo C('IMG_URL');?>/hj-5.png" alt=""></a></li>
      </ul>
      <div class="clear"></div>
    </div>
    <span class="s-s-l"></span>
    <span class="s-s-r"></span>
  </div>

</div>
<!-- 视频 -->
<div class='video-wrap'>
  <p class="vi-tit"><img src="<?php echo C('IMG_URL');?>/video-tit.png" alt=""></p>
  <div class="video-list">
    <div class="wrap">
      <div class="w_l">
        <ul>
          <li id='videoa'>
            <video id='dd' poster="<?php echo C('IMG_URL');?>/v-1-3.jpg" style='height:100%;width:100;%'
                   controls="controls">
              <source id="big_pic" src="/Public/video/video_2.mp4" type="video/mp4"/>
            </video>
            <!--<img id="big_pic" src="<?php echo C('IMG_URL');?>/v-1.png" alt="">-->

          </li>
        </ul>
      </div>
      <div class="w_r">
        <span class="s-prev"><img src="<?php echo C('IMG_URL');?>/prev_page.png"></span>
        <div class="w_r_w">
          <ul class="show_off">

            <!--<li><img rel='/Public/video/video_1.mp4' src="<?php echo C('IMG_URL');?>/v-1-1.jpg" alt=""></li>-->
            <li><img rel='/Public/video/video_2.mp4' src="<?php echo C('IMG_URL');?>/v-1-3.jpg" alt=""></li>
            <li><img rel='/Public/video/video_3.mp4' src="<?php echo C('IMG_URL');?>/v-1-2.jpg" alt=""></li>
            <li><img rel='/Public/video/video_4.mp4' src="<?php echo C('IMG_URL');?>/v-1-4.jpg" alt=""></li>

          </ul>
        </div>
        <span class="s-next"><img src="<?php echo C('IMG_URL');?>/next_page.png" style="margin:0 auto;" alt=""></span>
      </div>
    </div>
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
              <?php if(is_array($f_list["zi_list"])): $i = 0; $__LIST__ = $f_list["zi_list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$z_list): $mod = ($i % 2 );++$i; if($z_list['id'] == 60 or $z_list['id'] == 61 or $z_list['id'] == 62 or $z_list['id'] == 63 or $z_list['id'] == 77 or $z_list['id'] == 78 or $z_list['id'] == 79 or $z_list['id'] == 80): ?><dd><a href="<?php echo U('Home/Index/new_info',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd>
                  <?php else: ?>
                  <dd><a href="<?php echo U('Home/Index/new_list',array('id'=>$z_list['id']));?>"><?php echo ($z_list["class_name"]); ?></a></dd><?php endif; endforeach; endif; else: echo "" ;endif; ?>
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
  <div class="reg" style='height:20px;'><p style='height:20px;line-height:20px;'>copyright &#169; 2016-2026
    huanyuzhengxing 北京焕誉医疗美容门诊部有限公司</p></div>
  <div style='text-align:center;background:#1d1d1d;font-size:12px;'><p>京ICP备16017287号-1 （京）医广【2016】第07-01-0355号</p>
  </div>
</div>
</body>

<script language=javascript>
  var LiveAutoInvite0 = '您好，来自%IP%的朋友';
  var LiveAutoInvite1 = '来自首页的对话';
  var LiveAutoInvite2 = ' 网站商务通 主要功能：<br>1、主动邀请<br>2、即时沟通<br>3、查看即时访问动态<br>4、访问轨迹跟踪<br>5、内部对话<br>6、不安装任何插件也实现双向文件传输<br><br><b>如果您有任何问题请接受此邀请以开始即时沟通<\/b>';
</script>

<script language="javascript" src="http://pkt.zoosnet.net/JS/LsJS.aspx?siteid=PKT67204838&float=1&lng=cn"></script>

</html>