<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\wamp\www\zwt5\public/../application/homeback\view\article\index.html";i:1503021190;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>文章首页</title>
<link rel="stylesheet" type="text/css" href="/static/homeback/css/adminlist.css" />
<meta name="description" content="Dashboard">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <style type="text/css">
tr:hover{ 
	background-color: #E8F2FE;
}
</style>
<!--Basic Styles-->
  <script type="text/javascript">
//验证表单
function validate_form(thisform){
	with (thisform){
	  if(navid.value=="请选择"){
		  alert("请选择文章分类！");navid.focus();return false
	  }
	}
}
</script>
</head>
<body>
<form action="<?php echo url('article/index'); ?>" method="get" onsubmit="return validate_form(this);">
文章分类：<select id="province">
		<option>请选择</option>
	 	<?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	    <option value ="<?php echo $vo['id']; ?>"><?php echo $vo['navName']; ?></option>
	  	<?php endforeach; endif; else: echo "" ;endif; ?>
	 </select>
	 <select id="city" name="navid">
	    <option>请选择</option>
	 </select>
	 <input class="input_text" type="submit" value="查  询"  style="height:32px;background-color:#97CC32;color:white;"/>
</form>
<a href="<?php echo url('article/add'); ?>"><button type="button" style="height:32px;background-color:#DD1641;color:white;">添加文章</button></a>
显示条数：
<select name="tiaoshu" id="tiaoshu" onchange="changeTiao(this);" >
	<?php if($tiaoshu): ?>
	<option selected="selected"><?php echo $tiaoshu; ?></option>
	<?php endif; ?>
	<option value="<?php echo url('article/index'); ?>">10</option>
	<option value="<?php echo url('article/index'); ?>">20</option>
	<option value="<?php echo url('article/index'); ?>">30</option>
	<option value="<?php echo url('article/index'); ?>">50</option>
</select>
选择第<select id="pageTop" onchange="changeYe(this);">
			<?php $__FOR_START_30453__=1;$__FOR_END_30453__=$ye+1;for($i=$__FOR_START_30453__;$i < $__FOR_END_30453__;$i+=1){ ?>
			<option><?php echo $i; ?></option>
			<?php } ?>
		</select>页
&nbsp;&nbsp;&nbsp;当前第<?php echo $data->currentPage(); ?>页，共<?php echo $data->lastPage(); ?>页/<?php echo $data->total(); ?>个记录

<br><br/>
		<table  border ="1" cellspacing ="0" cellpadding="0" width="99%">
			<tr style="height:30px;text-align:center;">
           		<th>文章ID</th>
           		<th>文章标题</th>
           		<th>文章标题别名</th>
           		<th>文章缩略图</th>
           		<th>所属导航ID</th>
           		<th>所属导航</th>
           		<th>文章创建时间</th>
           		<th>文章作者</th>
           		<th>文章点击次数</th>
           		<th>操作</th>
	        </tr>
	        
	        <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	        <tr style="text-align:center;height:30px;">
	        	<td><?php echo $vo['id']; ?></td>
	        	<td style="color:#1BA800;"><?php echo $vo['title']; ?></td>
	        	<td style="color:#1BA800;"><?php echo $vo['title_alias']; ?></td>
	        	<td>
	        	<?php if(($vo['img'] == '暂无缩略图')): ?>
	        	暂无缩略图
	        	<?php else: ?>
	        	<img height="70px" src="<?php echo $vo['img']; ?>"/>
	        	<?php endif; ?>
	        	</td>
	        	<td><?php echo $vo['nav_id']; ?></td>
	        	<td style="text-align:left;width:300px;">
	        	<?php if(($vo['zuxian']!='')): ?>
	        		<?php echo $vo['zuxian']; ?><br>
	        		&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['dnavName']; ?><br>
	        		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['xnavName']; else: ?>
	        		<?php echo $vo['dnavName']; ?><br>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['xnavName']; endif; ?>
	        	
	        	
	        	</td>
	        	<td><?php echo $vo['created']; ?></td>
	        	<td><?php echo $vo['created_by']; ?></td>
	        	<td><?php echo $vo['hits']; ?></td>
	        	<td>
					<a href="<?php echo url('article/edit',['id' => $vo['id']]); ?>"><button type="button" style="height:32px;background-color:#DD1641;color:white;">改</button></a>
					<button value="<?php echo $vo['id']; ?>" onclick="del(this.value);return false;" type="button" style="height:32px;background-color:#DD1641;color:white;">删</button>
				</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		</table>
		
		<?php echo $page; ?>
<script type="text/javascript">
function del(val){
	if(window.confirm('请确认是否删除')){
		window.location.href="<?php echo url('article/delete'); ?>?id="+val;
	}
}
</script>
<script>
//选择显示第几页
function changeYe(obj){
	var docurl =this.location.href;
	var text =obj.options[obj.selectedIndex].text;
	var reg = new RegExp('(^|&)' + 'page' + '=([^&]*)(&|$)', 'i');
	var r = window.location.search.substr(1).match(reg);
	var reg1 = new RegExp('(^|&)' + '?' + '=([^&]*)(&|$)', 'i');
	var wenhao = window.location.search.substr(1).match(reg1);
	if (r == null && wenhao==null) {
		location=docurl+"?page="+text;
		obj.selectedIndex=0;
	    obj.blur();
	}else if(wenhao!=null&&r == null){
		location=docurl+"&page="+text;
	    obj.selectedIndex=0;
	    obj.blur();
	}else {	
	   var newcurl = docurl.split('page=')[0];
	   location=newcurl+"page="+text;
	   obj.selectedIndex=0;
	   obj.blur();
	}
}
//选择每页显示条数
function changeTiao(obj){
	//var docurl = obj.options[obj.selectedIndex].value;
	var docurl =this.location.href;
	var text = obj.options[obj.selectedIndex].text;
	var reg = new RegExp('(^|&)' + 'tiaoshu' + '=([^&]*)(&|$)', 'i');
	var r = window.location.search.substr(1).match(reg);
	var reg1 = new RegExp('(^|&)' + '?' + '=([^&]*)(&|$)', 'i');
	var wenhao = window.location.search.substr(1).match(reg1);
	if(wenhao==null){
		location=docurl+"?tiaoshu="+text;
	    obj.selectedIndex=0;
	    obj.blur();
	}else if(r = null){
		location=docurl+"&tiaoshu="+text;
	    obj.selectedIndex=0;
	    obj.blur();
	}else{
		var reg = new RegExp('(^|&)' + 'page' + '=([^&]*)(&|$)', 'i');
		var p = window.location.search.substr(1).match(reg);
		if(p!=null){
			var newcurl = docurl.split('&page=')[0];
			location=newcurl+"&page=1&tiaoshu="+text;
			obj.selectedIndex=0;
			obj.blur();
		}else{
			var newcurl = docurl.split('&tiaoshu=')[0];
			location=newcurl+"&tiaoshu="+text;
			obj.selectedIndex=0;
			obj.blur();
		}
	}
}
</script>
<script src="/static/homeback/js/jquerytime.js"></script>
<script src="/static/homeback/js/jquery-1.12.4.min.js"></script>
<script src="/static/homeback/js/jquery.datetimepicker.full.js"></script>
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
                    for( var i = 0;i<obj.length;i++){
                    	$("#city").append('<option value="' + obj[i]['id'] + '">' + obj[i]['navName'] + '</option>');///就这一步是jQuery 其他都是js
                    	//$("#city").html("<option value='"+data[i][areaid]+"'>"+data[i][areaname]+"</option>")
                    	//alert(obj[i]['navName']);
                    }
                    //var cities = data;
                    // data是字符串,转换为数组
                    //var cities = data.split(",");
                    //for(var i=0;i<cities.length;i++){
                    //    var option = document.createElement("option");
                    //    var textNode = document.createTextNode(cities[i]);
                    //    option.appendChild(textNode);
                    //    city.appendChild(option);
                    //}
                }
            }
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