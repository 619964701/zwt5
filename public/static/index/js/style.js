

// tab
$(function(){
	$(".nav-option li").click(function(){
				var n = $(this).index();
				$(this).addClass('current').siblings('li').removeClass('current');
				$(".card-soft").removeClass('current').eq(n).addClass('current');
			})
})

// js
$("#img1").mouseenter(function(){
	$("#img1").css("display","none");
	$("#img").css("display","block");
})