<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:69:"D:\wamp\www\zwt5\public/../application/homeback\view\login\index.html";i:1498785749;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>竹文投后台登录</title>
    <!-- Bootstrap -->	
   	<!--让IE8 支持HTML5新标签 和 Media-->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->   
<link rel="stylesheet" href="/static/homeback/css/style.css">  
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script type="text/javascript" src="/static/homeback/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(function(){
   $("#submit").click(function(){
    var cont = $("input").serialize();
	    $.ajax({
		      url:"<?php echo url('login/index'); ?>",
		      type:'post',
		      dataType:'json',
		      data:cont,
		      success:function(data){
		    	  if(data.flag=="成功"){
		    		  alert('登录成功');
		    		  window.location.href="<?php echo url('index/index'); ?>";
		    	  }else{
		    		  $("#jsonp").html(data.txt);
		    	  }
		   	 },
		   	 error: function(XMLHttpRequest, textStatus, errorThrown) {  //#3这个error函数调试时非常有用，如果解析不正确，将会弹出错误框
                 alert(XMLHttpRequest.status);
                 alert(XMLHttpRequest.responseText);
                 alert(XMLHttpRequest.readyState);
                 alert(textStatus); // paser error;
             },
	  	});
   });
   //回车提交表单
   $('#adminForm').keydown(function(event){
		if (event.keyCode == 13) {
			$('#submit').click();
		}
	});
});
</script>
</head>
<body>
	<div class="header1">竹文投后台登录</div>
	<div class="login-wrapper">
		<div class="login-box">
			<form id="adminForm">
				<div class="row">
					<label for="" class="form-label col-xs-3">
						<i class="glyphicon glyphicon-user"></i>
						<!-- <i class="glyphicon glyphicon-lock"></i> -->
					</label>
					<div class="formControls col-xs-8">
						<input type="text" name="adminname" id="item1"placeholder="账户" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<label for="" class="form-label col-xs-3">
						<i class="glyphicon glyphicon-lock"></i>
					</label>
					<div class="formControls col-xs-8">
						<input type="password" name="password" id="item2" placeholder="密码" autocomplete="off">
					</div>
				</div>
				<div class="row">
					<label class="form-label col-xs-3">
						<i style="font-size:18px;color:#fff;">验证码</i>
					</label>
					<div class="formControls col-xs-8">
						<input style="line-height:30px;" size="25" type="text" name="verify" />
					</div>
				</div>
				<div class="row">
					<div class="formControls col-xs-8 col-xs-offset-3">
						<img id="verify_img"  src="<?php echo captcha_src(); ?>" alt="captcha" onclick="changeVerify()" />&nbsp;&nbsp;<a style="font-size:20px;color:#fff;" href="javascript:changeVerify();"> 换一张</a>
					</div>
				</div>
				<div class="row">
					<div class="formControls col-xs-8 col-xs-offset-3">
					<input id="submit" type="button" class="btn btn-success radius login-btn" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="reset" class="btn btn-default radius login-btn" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="jsonp" style="color:red;font-size:18px;"></span>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="footer1">
		Copyright 竹文投后台
	</div>
</body>
<!-- 更换刷新验证码 -->
<script type="text/javascript">
    function changeVerify() {
        var ts = Date.parse(new Date())/1000;
        var img = document.getElementById('verify_img');
        img.src = "/captcha?id="+ts;
    }
</script>
</html>
