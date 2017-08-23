<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\wamp\www\zwt5\public/../application/homeback\view\article\edit.html";i:1503021190;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>添加文章</title>
<style type="text/css">
.span{
	color:red;
}
</style>
<link rel="stylesheet" type="text/css" href="/static/homeback/css/adminlist.css" />
<meta name="description" content="Dashboard">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--Basic Styles-->

<script type="text/javascript" src="/static/homeback/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="/static/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
//验证表单
function validate_required(field,alerttxt){
	with (field){
	  if (value==null||value==""){
		  alert(alerttxt);return false
	    }else {
	    	return true
	    }
	}
}
function validate_form(thisform){
	with (thisform){
		if(document.getElementById("county").style.display == ''){
			if(countyid.value=="请选择"){
				alert("请选择完整的文章分类！");county.focus();return false
			}
		}
		if( document.getElementById("city").style.display =='') {
			if(navid.value=="请选择"){
				alert("请选择完整的文章分类！");navid.focus();return false
			}
		}
	  if (validate_required(title,"文章标题必填!")==false){
		  title.focus();return false
	  }
	  if (validate_required(title_alias,"文章别名必填!")==false){
		  title_alias.focus();return false
	  }
	  if (CKEDITOR.instances.a1.getData()==""){
		  var val = CKEDITOR.instances.a1.getData();
		   alert("文章内容不得为空!");  
		   return false; 
	  }
	  if (validate_required(created_by,"文章作者!")==false){
		  created_by.focus();return false
	  }
    }
}
</script>
</head>
<body>
（带 <span class="span">*</span> 为必填项）
<form action="<?php echo url('article/update',['id'=>$article['id']]); ?>" enctype="multipart/form-data" method="post" onsubmit="return validate_form(this);">
<table  border="1" cellspacing ="0" cellpadding="0" width="90%" style="line-height:30px;">
		<tr>
			<td style="text-align:right;"><span class="span">*</span>选择文章分类：</td>
			<td style="text-indent:15px;">
				<?php if(($zuxian=='')): ?>
					<select id="province">
						<option value ="<?php echo $danav['id']; ?>"><?php echo $danav['navName']; ?></option>
					 	<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					    <option value ="<?php echo $vo['id']; ?>"><?php echo $vo['navName']; ?></option>
					    <?php endforeach; endif; else: echo "" ;endif; ?>
					 </select>
					 <select id="city" name="navid">
					    <option value ="<?php echo $xiaonav['id']; ?>"><?php echo $xiaonav['navName']; ?></option>
					 </select>
					 <select id="county" name="countyid">
					    <option>请选择</option>
					 </select>
					 <input type="hidden" value ="<?php echo $danav['id']; ?>" name="hiddencity" />
					 <input type="hidden" value ="<?php echo $xiaonav['id']; ?>" name="hiddencounty" />
				 <?php else: ?>
					 <select id="province">
						<option value ="<?php echo $zuxian['id']; ?>"><?php echo $zuxian['navName']; ?></option>
					 	<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					    <option value ="<?php echo $vo['id']; ?>"><?php echo $vo['navName']; ?></option>
					    <?php endforeach; endif; else: echo "" ;endif; ?>
					 </select>
					 <select id="city" name="navid">
					    <option value ="<?php echo $danav['id']; ?>"><?php echo $danav['navName']; ?></option>
					 </select>
					 <select id="county" name="countyid">
					    <option value ="<?php echo $xiaonav['id']; ?>"><?php echo $xiaonav['navName']; ?></option>
					 </select>
					 <input type="hidden" value ="<?php echo $zuxian['id']; ?>" name="hiddenprovince" />
					 <input type="hidden" value ="<?php echo $danav['id']; ?>" name="hiddencity" />
					 <input type="hidden" value ="<?php echo $xiaonav['id']; ?>" name="hiddencounty" />
				 <?php endif; ?>
			</td>
		</tr>	
		<tr>
			<td style="text-align:right;"><span class="span">*</span>文章标题：</td>
			<td style="text-indent:15px;"><input type="text" name="title" value="<?php echo $article['title']; ?>"/></td>
		</tr>	
		<tr>
			<td style="text-align:right;"><span class="span">*</span>文章别名：</td>
			<td style="text-indent:15px;"><input type="text" name="title_alias" value="<?php echo $article['title_alias']; ?>"/></td>
		</tr>
		<tr>
			<td style="text-align:right;">文章短介绍：</td>
			<td style="text-indent:15px;"><textarea  name="yinxu" width="300" height="180"><?php echo $article['yinxu']; ?></textarea></td>
		</tr>		
		<tr>
			<td style="text-align:right;">文章图片缩略图：</td>
			<td style="text-indent:15px;"><input id="doc" type="file" name="img" onchange="javascript:setImagePreview();"/></td>
		</tr>	
		<tr>
			<td style="text-align:right;">显示缩略图：</td>
			<td style="text-indent:15px;">
			
			<?php if(($article['img'] == '暂无缩略图')): ?>
			暂无缩略图
	        <?php else: ?>
			<img id="preview" src="<?php echo $article['img']; ?>" width="150" height="180" style="display: block; width: 150px; height: 180px;"/>
			<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td style="text-align:right;"><span class="span">*</span>文章内容：</td>
			<td style="text-indent:15px;"><textarea id="a1" name="introtext" ><?php echo $article['introtext']; ?></textarea></td>
		</tr>
		<tr>
			<td style="text-align:right;"><span class="span">*</span>文章作者：</td>
			<td style="text-indent:15px;"><input type="text" name="created_by" value="<?php echo $article['created_by']; ?>"/></td>
		</tr>	
		<tr>
			<td></td><td><input  size="25" type="submit" value="提交"/></td>
		</tr>			
</table>
</form>
<script type="text/javascript">
		function onloadCk(){
			var county = document.getElementById("county");
			if(county.value=="请选择"){
				county.style.display = "none";
			}
			//CKEDITOR.Width="400px";
			CKEDITOR.replace("a1",{width: '900px',  height: '300px' });			
		}
		window.onload=onloadCk();
</script>
<script type="text/javascript">
//下面用于图片上传预览功能
function setImagePreview(avalue) {
	var docObj=document.getElementById("doc");
	 
	var imgObjPreview=document.getElementById("preview");
	if(docObj.files &&docObj.files[0]){
		//火狐下，直接设img属性
		imgObjPreview.style.display = 'block';
		imgObjPreview.style.width = '150px';
		imgObjPreview.style.height = '180px';
		//imgObjPreview.src = docObj.files[0].getAsDataURL();
	 
		//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
		imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
	}else{
	//IE下，使用滤镜
		docObj.select();
		var imgSrc = document.selection.createRange().text;
		var localImagId = document.getElementById("localImag");
		//必须设置初始大小
		localImagId.style.width = "150px";
		localImagId.style.height = "180px";
		//图片异常的捕捉，防止用户修改后缀来伪造图片
		try{
			localImagId.style.filter="progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
			localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
		}catch(e){
			alert("您上传的图片格式不正确，请重新选择!");
			return false;
		}
		imgObjPreview.style.display = 'none';
		document.selection.empty();
	}
	return true;
}
 
</script>
  <script type="text/javascript">
    /*
     * 需要思考哪些事情?
     * * 在什么时候执行Ajax的异步请求?
     *   * 当用户选择具体的省份信息时
     */
    // 1. 为id为province元素绑定onchange事件
    var provinceEle = document.getElementById("province");
    provinceEle.onchange = function(){
        // 清空
        var city = document.getElementById("city");
        var opts = city.getElementsByTagName("option");
        for(var z=opts.length-1;z>0;z--){
            city.removeChild(opts[z]);
        }
        var county = document.getElementById("county");
        var opts = county.getElementsByTagName("option");
        for(var z=opts.length-1;z>0;z--){
        	county.removeChild(opts[z]);
        }
        if(provinceEle.value != "请选择"){
            // 2. 执行Ajax异步请求
            var xhr = getXhr();
            xhr.open("post","<?php echo url('article/add'); ?>");
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send("province="+provinceEle.value);
            xhr.onreadystatechange = function(){
                if(xhr.readyState==4&&xhr.status==200){
                    // 接收服务器端的数据内容
                    var obj;
                    var data = xhr.responseText;
                    var obj  = eval("("+data+")");//成功以后调用eval方法将数组还原成js数组对象
                    if(obj ==""){
                    	city.style.display = "none";
                    	county.style.display = "none";
                    }else{
                    	city.style.display = "";
                    	county.style.display = "none";
                    	for( var i = 0;i<obj.length;i++){
                        	$("#city").append('<option value="' + obj[i]['id'] + '">' + obj[i]['navName'] + '</option>');///就这一步是jQuery 其他都是js
                        	//$("#city").html("<option value='"+data[i][areaid]+"'>"+data[i][areaname]+"</option>")
                        	//alert(obj[i]['navName']);
                        }
                    }
                }
            }
        }else{
        	city.style.display = "none";
        	county.style.display = "none";
        }
        
    };
    // 定义获取ajax核心对象的函数XMLHttpRequest对象的函数
    function getXhr(){
        var xhr = null;
        if(window.XMLHttpRequest){
            xhr = new XMLHttpRequest();
        }else{
            xhr = new ActiveXObject("Microsoft.XMLHttp");
        }
        return xhr;
    }
  </script>
  
  <script type="text/javascript">
    /*
     * 需要思考哪些事情?
     * * 在什么时候执行Ajax的异步请求?
     *   * 当用户选择具体的市信息时
     */
    // 1. 为id为city元素绑定onchange事件
    var cityEle = document.getElementById("city");
    cityEle.onchange = function(){
        // 清空
        var county = document.getElementById("county");
        var opts = county.getElementsByTagName("option");
        for(var z=opts.length-1;z>0;z--){
        	county.removeChild(opts[z]);
        }
        
        if(cityEle.value != "请选择"){
            // 2. 执行Ajax异步请求
            var xhr = getXhr();
            xhr.open("post","<?php echo url('article/add'); ?>");
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send("city="+cityEle.value);
            xhr.onreadystatechange = function(){
                if(xhr.readyState==4&&xhr.status==200){
                    // 接收服务器端的数据内容
                    var obj;
                    var data = xhr.responseText;
                    var obj  = eval("("+data+")");//成功以后调用eval方法将数组还原成js数组对象
                    if(obj ==""){
                    	county.style.display = "none";
                    }else{
                    	county.style.display = "";
	                    for( var i = 0;i<obj.length;i++){
	                    	$("#county").append('<option value="' + obj[i]['id'] + '">' + obj[i]['navName'] + '</option>');///就这一步是jQuery 其他都是js
	                    	//$("#city").html("<option value='"+data[i][areaid]+"'>"+data[i][areaname]+"</option>")
	                    	//alert(obj[i]['navName']);
	                    }
                    }
                }
            }
        }else{
        	county.style.display = "none";
        }
    };
    // 定义获取ajax核心对象的函数XMLHttpRequest对象的函数
    function getXhr(){
        var xhr = null;
        if(window.XMLHttpRequest){
            xhr = new XMLHttpRequest();
        }else{
            xhr = new ActiveXObject("Microsoft.XMLHttp");
        }
        return xhr;
    }
  </script>
</body>
</html>