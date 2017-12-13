<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wamp\www\zwt5\public/../application/homeback\view\nav\add.html";i:1503021190;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加导航栏</title>
<script type="text/javascript" src="/static/homeback/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(function(){
   $("#submit").click(function(){
    var cont = $("#adminFrom").serialize();
	    $.ajax({
		      url:"<?php echo url('nav/insert'); ?>",
		      type:'post',
		      dataType:'json',
		      data:cont,
		      success:function(data){
		    	  if(data.flag=="成功"){
		    		  alert('新增导航栏成功');
		    		  window.location.href="<?php echo url('nav/index'); ?>";
		    	  }else{
		    		  $("#jsonp").html(data.txt);
		    	  }
		   	 }
	  	});
   });
});
</script>
</head>
<body>
<span id="jsonp" style="color:red;">提示</span>
<form id="adminFrom">
<table  cellspacing ="0" cellpadding="0" width="300px" style="line-height:30px;">
		<tr>
			<td style="text-align:right;">导航栏名称:</td>
			<td style="text-indent:15px;"><input type="text" name="navName" /></td>
		</tr>	
		<tr>
			<td style="text-align:right;">样式:</td>
			<td style="text-indent:15px;"><input type="text" name="cssName" /></td>
		</tr>
		<tr>
			<td style="text-align:right;">被访问的模板名称:</td>
			<td style="text-indent:15px;"><input type="text" name="htmlName" /></td>
		</tr>	
		<tr>
			<td style="text-align:right;">导航栏描述:</td>
			<td style="text-indent:15px;"><input type="text" name="desc" /></td>
		</tr>	
		<tr>
			<td style="text-align:right;">导航栏背景图路径:</td>
			<td style="text-indent:15px;"><input type="text" name="img" /></td>
		</tr>	
		<tr>
			<td></td><td><input id="submit" size="25" type="button" value="提交"/></td>
		</tr>			
</table>
<input type="hidden" name="pid" value="<?php echo $pid; ?>"/>
	</form>
</body>
</html>