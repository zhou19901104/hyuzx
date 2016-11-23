/*
* @Author: xy-xiaofei
* @Date:   2016-04-14 17:22:00
* @Last Modified by:   xy-xiaofei
* @Last Modified time: 2016-06-01 13:49:31
*/
/*专家团队轮播*/
$(function() {
// 交流框
$('#online_1').click(function(event) {
	$('.online').css('display', 'block');
});
$('.online .close').click(function(event) {
	$('.online').css('display', 'none');
});

	$('#online_2').click(function(event) {
		$('.online_2').css('display', 'block');
	});
	$('.online_2 .close').click(function(event) {
		$('.online_2').css('display', 'none');
	});




// VIP弹出框
 var aa=close;

$('.vip').click(function(event) {

	if(aa==close){
		$('.ewm').css('display', 'block');
		aa=open;
	}else{
		$('.ewm').css('display', 'none');

		aa=close;
	}
});



/*导航漂浮*/
$(window).scroll(function(event) {
	var num=$(window).scrollTop();//窗口滚动的高度
	if (num>=80) {
		$('.nav-wrap').css({//当窗口滚动的高度大于导航高度时导航漂浮固定定位于屏幕最上方
			position: 'fixed',
			top: '0',
			opacity:'0.8'
		});
	} else{
		$('.nav-wrap').css({'position':'','opacity':'1'});//当小于导航高度时去掉定位，透明度为1
	};

});



/*banner图轮播*/
var bawidth=$(window).width();
		$('.box-wrap .box').css('width',''+bawidth+'px');
		$('.box-wrap .box ul li').css('width',''+bawidth+'px');
		//步骤 1. 从角标开始 ，点击角标，发生变化
		//         2. 角标动的同时，图片也相应的切换
		//         3. 循环定时器

		var banum=10; //变量保存zindex的信息，每点击一次zindex层次加1

		var bannerTimer=null; //存储定时器

		var iNow=0;    //累加器    初始为0；

		var balen=$('.box ul li').length;  //获取ul中li的个数

		var baspeed1=1500;
		var baspeed2=1000;

		//打开页面显示情况
		//$('.slide-wrap li').eq(0).children('.b-box').children('.img-1').stop().animate({opacity: 1, top: '80px'}, baspeed1);
		//$('.slide-wrap li').eq(0).children('.b-box').children('.img-2').stop().animate({opacity: 1, bottom: '233px'}, baspeed1);

		$('.slide-wrap li').eq(0).children('.b-box').children('.img-4').stop().animate({opacity: 1, top: '70px'}, baspeed1);

		//$('.slide-wrap li').eq(0).children('.b-box').children('.img-5').stop().animate({opacity: 1, bottom: '40px'}, baspeed1);

		$('.box ol li').click(function(event) {
			banum++;
			$(this).addClass('current').siblings('li').removeClass('current');

			var baindex=$(this).index();

			$('.box ul li').eq(baindex).css({
				zIndex: banum
			}).hide().fadeIn(baspeed2);

			$('.box ul li').eq(baindex-1).children('.b-box').children('.img-1').stop().animate({opacity: 0, top: '0'}, baspeed2);
			$('.box ul li').eq(baindex-1).children('.b-box').children('.img-2').stop().animate({opacity: 0, bottom: '0'}, baspeed2);
			$('.box ul li').eq(baindex-1).children('.b-box').children('.img-3').stop().animate({opacity: 0, top: '-100px'}, baspeed2);

			$('.box ul li').eq(baindex).children('.b-box').children('.img-1').stop().animate({opacity: 1, top: '80px'}, baspeed1);
			$('.box ul li').eq(baindex).children('.b-box').children('.img-2').stop().animate({opacity: 1, bottom: '233px'}, baspeed1);
			$('.box ul li').eq(baindex).children('.b-box').children('.img-3').stop().animate({opacity: 1, top: '70px'}, baspeed1);

			$('.box ul li').eq(baindex+1).children('.b-box').children('.img-1').stop().animate({opacity: 0, top: '0'}, baspeed2);
			$('.box ul li').eq(baindex+1).children('.b-box').children('.img-2').stop().animate({opacity: 0, bottom: '0'}, baspeed2);
			$('.box ul li').eq(baindex+1).children('.b-box').children('.img-3').stop().animate({opacity: 0, top: '-100px'}, baspeed2);

			//新增一张图
			$('.box ul li').eq(baindex-1).children('.b-box').children('.img-4').stop().animate({opacity: 0, top: '-70px'}, baspeed2);
			$('.box ul li').eq(baindex).children('.b-box').children('.img-4').stop().animate({opacity: 1, top: '70px'}, baspeed1);
			$('.box ul li').eq(baindex+1).children('.b-box').children('.img-4').stop().animate({opacity: 0, top: '-70px'}, baspeed2);

			//新增一张图
			// $('.box ul li').eq(baindex-1).children('.b-box').children('.img-5').stop().animate({opacity: 0, bottom: '-150px'}, baspeed2);
			// $('.box ul li').eq(baindex).children('.b-box').children('.img-5').stop().animate({opacity: 1, bottom: '40px'}, baspeed1);
			// $('.box ul li').eq(baindex+1).children('.b-box').children('.img-5').stop().animate({opacity: 0, bottom: '-150px'}, baspeed2);


			//点击完成之后，累加器从当前开始增加




			iNow=baindex;
		});



		//自动播放
		function baautoPlay(){
			iNow++;
			banum++;
			if(iNow>balen-1){
				iNow=0;
			}
			$('.box ol li').eq(iNow).addClass('current').siblings('li').removeClass('current');
			$('.box ul li').eq(iNow).css({
				zIndex: banum
			}).hide().fadeIn(baspeed2);

			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-1').stop().animate({opacity: 0, top: '0'}, baspeed2);
			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-2').stop().animate({opacity: 0, bottom: '0'}, baspeed2);
			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-3').stop().animate({opacity: 0, top: '-100px'}, baspeed2);

			$('.box ul li').eq(iNow).children('.b-box').children('.img-1').stop().animate({opacity: 1, top: '80px'}, baspeed1);
			$('.box ul li').eq(iNow).children('.b-box').children('.img-2').stop().animate({opacity: 1, bottom: '233px'}, baspeed1);
			$('.box ul li').eq(iNow).children('.b-box').children('.img-3').stop().animate({opacity: 1, top: '70px'}, baspeed1);

			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-1').stop().animate({opacity: 0, top: '0'}, baspeed2);
			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-2').stop().animate({opacity: 0, bottom: '0'}, baspeed2);
			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-3').stop().animate({opacity: 0, top: '-100px'}, baspeed2);


			//新增一张图
			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-4').stop().animate({opacity: 0, top: '-70px'}, baspeed2);
			$('.box ul li').eq(iNow).children('.b-box').children('.img-4').stop().animate({opacity: 1, top: '70px'}, baspeed1);
			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-4').stop().animate({opacity: 0, top: '-70px'}, baspeed2);

			// $('.box ul li').eq(iNow-1).children('.b-box').children('.img-5').stop().animate({opacity: 0, bottom: '-150px'}, baspeed2);
			// $('.box ul li').eq(iNow).children('.b-box').children('.img-5').stop().animate({opacity: 1, bottom: '40px'}, baspeed1);
			// $('.box ul li').eq(iNow+1).children('.b-box').children('.img-5').stop().animate({opacity: 0, bottom: '-150px'}, baspeed2);




		}
		bannerTimer=setInterval(baautoPlay,3000);

		//清除定时器
		$('.box-wrap .box').hover(function() {
			clearInterval(bannerTimer);
			$('.box-wrap .box span').stop().show();
		}, function() {
			clearInterval(bannerTimer);
			bannerTimer=setInterval(baautoPlay,3000);
			$('.box-wrap .box span').stop().hide();
		});

		//点击前后
		$('.prev').click(function(event) {
			iNow--;
			banum++;
			if(iNow<0){
				iNow=balen-1;
			}
			$('.box ol li').eq(iNow).addClass('current').siblings('li').removeClass('current');
			$('.box ul li').eq(iNow).css({
				zIndex: banum
			}).hide().fadeIn(baspeed2);

			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-1').stop().animate({opacity: 0, top: '0'}, baspeed2);
			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-2').stop().animate({opacity: 0, bottom: '0'}, baspeed2);
			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-3').stop().animate({opacity: 0, top: '-100px'}, baspeed2);

			$('.box ul li').eq(iNow).children('.b-box').children('.img-1').stop().animate({opacity: 1, top: '80px'}, baspeed1);
			$('.box ul li').eq(iNow).children('.b-box').children('.img-2').stop().animate({opacity: 1, bottom: '233px'}, baspeed1);
			$('.box ul li').eq(iNow).children('.b-box').children('.img-3').stop().animate({opacity: 1, top: '70px'}, baspeed1);

			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-1').stop().animate({opacity: 0, top: '0'}, baspeed2);
			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-2').stop().animate({opacity: 0, bottom: '0'}, baspeed2);
			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-3').stop().animate({opacity: 0, top: '-100px'}, baspeed2);

			//新增一张图
			$('.box ul li').eq(iNow-1).children('.b-box').children('.img-4').stop().animate({opacity: 0, top: '-70px'}, baspeed2);
			$('.box ul li').eq(iNow).children('.b-box').children('.img-4').stop().animate({opacity: 1, top: '70px'}, baspeed1);
			$('.box ul li').eq(iNow+1).children('.b-box').children('.img-4').stop().animate({opacity: 0, top: '-70px'}, baspeed2);

			// $('.box ul li').eq(iNow-1).children('.b-box').children('.img-5').stop().animate({opacity: 0, bottom: '-150px'}, baspeed2);
			// $('.box ul li').eq(iNow).children('.b-box').children('.img-5').stop().animate({opacity: 1, bottom: '40px'}, baspeed1);
			// $('.box ul li').eq(iNow+1).children('.b-box').children('.img-5').stop().animate({opacity: 0, bottom: '-150px'}, baspeed2);





		});

		$('.next').click(function(event) {
			baautoPlay();
		});





/*导航划过显示*/
$('.nav-li>li').hover(function() {
	$(this).children('.list').stop().show();

}, function() {
	$(this).children('.list').stop().hide();
	$(this).css('borderBottom', '');
	$('.guide-li').css('display', 'none');

});

/*导航项目下拉滑过显示具体内容*/
$('.list .li-ul .nav-list-li').hover(function() {
	$('.guide-li').css('display', 'none');
	$(this).children('.guide-li').css('display', 'block');
}, function() {
	$(this).children('.guide-li').css('display', 'none');
});
$('.guide-li').hover(function() {
	$(this).siblings('.li-a').addClass('sss');
}, function() {
	$(this).siblings('.li-a').removeClass('sss');

});





//
//焕誉项目轮播
//	$('.pro-list .prslide>li').hover(function() {
//		var prnum=$(this).index();
//		$(this).addClass('bd').siblings('li').removeClass('bd');//鼠标滑过时加上边框背景
//		$('.prslide li').eq(prnum).children('.none').addClass('block');//划过时文字div显示
//		//if(prnum != 1){
//		//	$('.prslide li').eq(1).children('.none').removeClass('block');//当index不是1时，默认第二个的文字div隐藏
//		//}
//	}, function() {
//		var prnum=$(this).index();
//		$(this).removeClass('bd');
//		$('.prslide li').eq(prnum).children('.none').removeClass('block');
//	});
//
//	$('.pro-list').hover(function() {
//		$('.prolist').stop().animate({'height': '520px'}, 500);//当鼠标滑过时高度变成显示内容时的高度
//	}, function() {
//		$('.prolist').stop().animate({'height': '330px'}, 500);//当鼠标滑过时高度变回原来的
//	});




//轮播
	var prwidth=$('.prslide li').width();
	var prnum_li = $('.prslide li').length;
		prnum_li -= 4;
		prwidth+=24;
	var prspeed=500;
		timer=null;
		prnum2=0;
	function prautoPlay(){
		    prnum2++;
		    if(prnum2>prnum_li){
		    	prnum2=0;
		    $('.prslide').stop().animate({left:0}, prspeed);
		    }else{
		    $('.prslide').stop().animate({left:(-prnum2*prwidth)}, prspeed);
		    }
		};

	function prbackPlay(){
		    prnum2--;
		    if (prnum2 < 0) {
		    	prnum2= prnum_li;
		    	$('.prslide').stop().animate({left:(-prnum2*prwidth)}, prspeed);
		    }else{
				$('.prslide').stop().animate({left:(-prnum2*prwidth)}, prspeed);
		    }

		};

	$('.pro-list .s-s-r').click(function(event) {
	 	prautoPlay();
	});
	$('.pro-list .s-s-l').click(function(event) {
		prbackPlay();
});



/*专家头像划上变大*/
$('.zj-list .zjslide>li a,.huan-list .hjslide>li').hover(function() {
	$(this).children('img').css('transform', 'scale(1.1,1.1)');//划上去变大
}, function() {
	$(this).children('img').css('transform', 'scale(1,1)');//滑下时变回原来
});

/*专家头像点击的时候*/
$('.zjslide>li').mouseover(function(event) {
	var zjIndex=$(this).index();
	/*$('.zj-l img').attr('src', 'images/zj-list-'+zjIndex+'.png');*/
	$('.zj-l .big-img').eq(zjIndex).fadeIn(1).siblings('.big-img').fadeOut(1);//相对应的index的左边大图淡入
	/*$('.zj-r .r-t .cont').eq(zjIndex).addClass('cy-none').siblings('.cont').removeClass('cy-none');*/
	$('.zj-r .r-t .cont').eq(zjIndex).fadeIn(1).siblings('.cont').fadeOut(1);//专家简介也相应淡入
});


/*专家团队头像轮播*/
	var zjwidth;

	var zjnum_li = $('.zjslide li').length;
		zjnum_li -=6;
	var zjspeed=500;
		timer=null;
		zjnum2=0;
	function zjautoPlay(){
			zjnum2++;
			zjindex=zjnum2;
		    if(zjnum2>zjnum_li){
		    	zjnum2=0;
		    $('.zjslide').stop().animate({left:0}, zjspeed);
		    }else{
		    $('.zjslide').stop().animate({left:(-zjnum2*zjwidth)}, zjspeed);
		    }
		};

	function zjbackPlay(){
		    zjnum2--;
		    if (zjnum2 < 0) {
		    	zjnum2= zjnum_li;
		    	$('.zjslide').stop().animate({left:(-zjnum2*zjwidth)}, zjspeed);
		    }else{
				$('.zjslide').stop().animate({left:(-zjnum2*zjwidth)}, zjspeed);
		    }

		};

	$('.r-b-wrap .s-s-r').click(function(event) {
	 	zjautoPlay();
	});
	$('.r-b-wrap .s-s-l').click(function(event) {
		zjbackPlay();
	});

/*焕誉成功项目轮播*/

/*复制轮播第一个li到最后*/
	var tag=$('.calist .caslide li:first').clone();
	$('.calist .caslide').append(tag);

	var cawidth=$('.caslide li').width();
	var canum_li = $('.caslide li').length;
		canum_li -= 1;//长度去掉页面显示的3个
	var timer=null;
		speed1=800;//轮播速度
		canum2=0;//计数器
		caindex=0;
//点击右边按钮
	$('.ca-list .s-s-r').click(function(event) {
	 	canum2++;
		    if(canum2>canum_li){
		    $('.caslide').css('left', 0);//如果ul轮播到最后一个  则ul瞬间跳到ul最前面
		    $('.caslide').stop().animate({left:-cawidth}, speed1);//从第二个图片开始向左移动一个单位
		   	canum2=1;//返回最开始 计数为1 相当于已经点击了一下
		    }else{
		    $('.caslide').stop().animate({left:(-canum2*cawidth)}, speed1);//根据计数器移动计数器个单位长度
		};
	});

//点击左边按钮
	$('.ca-list .s-s-l').click(function(event) {
		 canum2--;
	    if (canum2 < 0) {
	    	$('.caslide').css('left', -canum_li*cawidth);//移动到ul最后面
	    	$('.caslide').stop().animate({left:-(canum_li-1)*cawidth}, speed1);
	     	canum2=canum_li-1;
	    }else{
			$('.caslide').stop().animate({left:(-canum2*cawidth)}, speed1);
	    }
	});


/*环境图片轮播*/

	var hjwidth=$('.hjslide li').width();
	var hjnum_li = $('.hjslide li').length;
		hjnum_li -= 4;
		hjwidth+=26;
	var hjspeed=500;
		timer=null;
		hjnum2=0;
		hjindex=0;
	function hjautoPlay(){
		    hjnum2++;
		   hjindex=hjnum2;
		   hjindex+=1;
		    if(hjnum2>hjnum_li){
		    	hjnum2=0;
		    $('.hjslide').stop().animate({left:0}, hjspeed);
		    }else{
		    $('.hjslide').stop().animate({left:(-hjnum2*hjwidth)}, hjspeed);
		    }
		};

	function hjbackPlay(){
		    hjnum2--;
		    if (hjnum2 < 0) {
		    	hjnum2= hjnum_li;
		    	$('.hjslide').stop().animate({left:(-hjnum2*hjwidth)}, hjspeed);
		    }else{
				$('.hjslide').stop().animate({left:(-hjnum2*hjwidth)}, hjspeed);
		    }

		};

	$('.huan-list .s-s-r').click(function(event) {
	 	hjautoPlay();
	});
	$('.huan-list .s-s-l').click(function(event) {
		hjbackPlay();
});


/*视频banner轮播图*/

/*$('#focus').movingBoxes({
	startPanel   : 1,       // 从第一个li开始
	reducedSize  : .45,      // 缩小到原图50%的尺寸
	wrap         : false,   // 无缝循环
	buildNav     : true,	// 显示指示器效果
	navFormatter : function(){ return "&#9679;"; } // 指示器格式，为空即会显示123
	});*/

/*视频轮播图*/

var num=$('.show_off li img').height();

var num_li = $('.show_off li').length;

num_li -= 4;
num+=29;
/*var num1=$('.big-img li').width();*/
		var speed=500;
			timer=null;
			num2=0;
		function autoPlay(){
			    num2++;
			    if(num2>num_li){
			    	num2=0;
			    }
				$('.show_off').stop().animate({top:(-num2*num)}, speed);

			};

		function backPlay(){
			    num2--;
			    if (num2 < 0) {
			    	num2= num_li;
			    }
			    	$('.show_off').stop().animate({top:(-num2*num)}, speed);
			};
		//自动播放
		/*timer=setInterval(autoPlay,2000);*/

		// $('.show_off').hover(function() {
		// 	clearInterval(timer);
		// }, function() {
		// 	timer=setInterval(autoPlay,2000);
		// });
$('.w_r .s-next').click(function(event) {
 	autoPlay();
});
$('.w_r .s-prev').click(function(event) {
	backPlay();
});

$('.w_r ul li').click(function(event) { //点击缩略图更换大图
	var as ;
	as = $(this).find('img').attr('rel');
	var mm;
	mm = $(this).find('img').attr('src');

	$('.video-current').removeClass();
	$(this).addClass('video-current');

	$('#videoa').html('<video id="dd" width="100%" height="100%" controls="controls" poster="'+mm+'"><source id="big_pic" src="'+as+'" type="video/mp4" /></video>');
	//$('#big_pic').attr('src', as);
});

$('#videoa').click(function(){
	if ($('#dd').attr('class') == 'play') {
		$('#dd').trigger('pause');
		$('#dd').removeClass('play');
	} else {
		$('#dd').trigger('play');
		$('#dd').addClass('play');
	}
});


// 返回顶部
$('.top').click(function(event) {
	$('html,body').animate({scrollTop:0}, 500)
});

/*专家详情页轮播*/
var docwidth=$('.docslide li').width();
	var docnum_li = $('.docslide li').length;
		docnum_li -= 4;
		docwidth+=24;
	var docspeed=500;
		timer=null;
		docnum2=0;
	function docautoPlay(){
		    docnum2++;
		    if(docnum2>docnum_li){
		    	docnum2=0;
		    $('.docslide').stop().animate({left:0}, docspeed);
		    }else{
		    $('.docslide').stop().animate({left:(-docnum2*docwidth)}, docspeed);
		    }
		};

	function docbackPlay(){
		    docnum2--;
		    if (docnum2 < 0) {
		    	docnum2= docnum_li;
		    	$('.docslide').stop().animate({left:(-docnum2*docwidth)}, docspeed);
		    }else{
				$('.docslide').stop().animate({left:(-docnum2*docwidth)}, docspeed);
		    }

		};

	$('.doc-cont-wrap .s-s-r').click(function(event) {
	 	docautoPlay();
	});
	$('.doc-cont-wrap .s-s-l').click(function(event) {
		docbackPlay();
});

$('.doc-cont-wrap .s-s-r').hover(function() {
	$(this).addClass('bg');
}, function() {
	$(this).removeClass('bg');
});
$('.doc-cont-wrap .s-s-l').hover(function() {
	$(this).addClass('bg');
}, function() {
	$(this).removeClass('bg');
});

/*专家列表 新闻列表页tab栏*/
	var newHight;
	var docHight;

	window.onload = function () {
		zjwidth=$('.zjslide li').width();
		zjwidth+=24;
		$('.new-list-wrap').css('height', $('.new-list').height());//新闻列表页获取的高度添加到大的div
		$('.doctor-list-wrap').css('height', $('.doc-list').height());//专家列表页获取的高度添加到大的div

	}

$('.list-nav .new-list-li,.list-nav .doc-list-li').click(function(event) {
	var dd=$(this).index();
	newHight=$(this).children('.new-list').height();//当前的内容的高度
	docHight=$(this).children('.doc-list').height();//专家当前的内容的高度
	$('.new-list-wrap').css('height', newHight);//新闻列表页高度赋给整个大的div
	$('.doctor-list-wrap').css('height', docHight);//专家列表页高度赋给整个大的div
	$(this).addClass('nav-bg').siblings('.list-nav .new-list-li').removeClass('nav-bg');//新闻列表页
	$(this).addClass('nav-bg').siblings('.list-nav .doc-list-li').removeClass('nav-bg');//专家列表页
	$('.doc-list').removeClass('show');//专家列表页
	$(this).children('.doc-list').addClass('show');//专家
	$('.new-list').removeClass('show');//新闻列表先把所有的show去掉
	$(this).children('.new-list').addClass('show');//新闻列表当前的对应的列表显示
});





/*鼠标划上头像头像向上挪*/
$('.doctor-list-wrap .doc-list .doc-photo').hover(function() {
	$(this).stop().animate({'marginTop': '-20px'}, 400);
}, function() {
	$(this).stop().animate({'marginTop': '0px'}, 400);
});

/*新闻列表页tab栏上下页*/
$('.page-list .left,.page-list .right').hover(function() {
	$(this).addClass('bg');
}, function() {
	$(this).removeClass('bg');
});

/*新闻列表页hover加上阴影*/
$(".new-list-wrap .new-list li:not('.page-wrap')").hover(function() {
	$(this).addClass('new-shadow').siblings('li').removeClass('new-shadow');
}, function() {
	$(this).removeClass('new-shadow');
});


/*视频列表页图片hover加背景框*/
$('.vid-list .new-photo a').hover(function() {
	$(this).addClass('bei').siblings('a').removeClass('bei');
}, function() {
	$(this).removeClass('bei').siblings('a').addClass('bei');
});

/*项目列表页图片hover加阴影*/
$('.doctor-list-wrap .pro-list li').hover(function() {
	$(this).addClass('pr-shadow').siblings('li').removeClass('pr-shadow');
}, function() {
	$(this).removeClass('pr-shadow');
});


/*项目来院路线*/
$('.menthod-wrap .men-tit li').click(function(event) {
	var mindex=$(this).index();
	$(this).addClass('mh').siblings('li').removeClass('mh');
	$('.men-cont li').eq(mindex).addClass('show').siblings('li').removeClass('show');
});


});
