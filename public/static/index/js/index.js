// header 选项卡部分

$(".nav li").mouseenter(function(){
    $(this).children(".down_2").stop().slideDown();
    $(this).find("h2").addClass("nav_this_2");

}).mouseleave(function(){
    $(this).children(".down_2").stop().slideUp();
     $(this).find("h2").removeClass("nav_this_2");
})


	//banner

	//定义循环变量
	var m = 1;
	//定时循环
	var mytime = setInterval(scrollImage, 3000);

	//定义循环函数
	function scrollImage(){
		if (m > 2) {
			m = 0;
		}
		//控制图片
		control_image(m);
		//控制图标
		control_icon(m);
		m ++;
	}

	//控制图片
	function control_image(n){
		$(".imglist a").eq(n).addClass('current').siblings('a').removeClass('current');
	}

	//控制图标
	function control_icon(n) {
		$(".iconlist li").eq(n).addClass('current').siblings('li').removeClass('current');
	}


	//绑定整个轮播图
	$("#play").mouseenter(function(){
		clearInterval(mytime);
		
	}).mouseleave(function(){
		mytime = setInterval(scrollImage, 3000);
		

	});

	//鼠标滑过 控制图标
	$(".iconlist li").mouseenter(function(){
		control_icon($(this).index());
		control_image($(this).index());
		m = $(this).index() + 1;
	});



$(function(){


	$(".mainCon").mouseenter(function(){
		$(".main-hover").css("display","block")
	}).mouseleave(function(){
		$(".main-hover").css();

	})
})

$(function(){
	$(".main-hover").mouseleave(function(){
		$(this).css("display","none")
	})
})

$(function(){
	$(".main-photo").mouseenter(function(){
		$(".hot-hover").css("display","block")
	}).mouseleave(function(){
		$(".hot-hover").css("display","none")

	})
})

$(".weixin").mouseenter(function(){
	$(".twoweixinimg").css("display","block");
})
$(".weixin").mouseleave(function(){
	$(".twoweixinimg").css("display","none");
})

			