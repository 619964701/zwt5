<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp\www\zwt5\public/../application/homeback\view\index\admin_list.html";i:1503021190;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <title>黑金魁拔 微商 后台</title>
		<link rel="stylesheet" type="text/css" href="/static/homeback/css/adminlist.css" />
	    <meta name="description" content="Dashboard">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	    <!--Basic Styles-->
	    <style type="text/css">
tr:hover{ 
	background-color: #E8F2FE;
}
</style>
	    <!--Beyond styles-->
	</head>
<body>
	<!-- 左侧边栏开始 -->
	<!-- 左侧边栏 结束-->
	
	<!-- 左侧边栏开始 -->

	<!-- 左侧边栏 结束-->
            <!-- Page Content -->
            <div class="page-content">
                
                <!-- 内容部分开始 -->
                <br/>
                <form action="<?php echo url('index/admin_list'); ?>" method="get">
                	关键词：<input type="text" name="keywords">
                	查询类型：<select name="type">
                				<option value="adminname">管理员账号</option>
                				<option value="nickname">管理员昵称</option>
                			</select>
                			<input class="input_text" type="submit" value="查  询"  style="height:32px;background-color:#97CC32;color:white;"/>
                </form>
                <br/>
                <a href="<?php echo url('index/admin_list'); ?>"><button type="button" style="height:32px;background-color:#DD1641;color:white;">显示所有管理员</button></a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo url('index/delete'); ?>" onclick="del();return false;"><button type="button" style="height:32px;background-color:#DD1641;color:white;">删除选定的管理员</button></a>&nbsp;&nbsp;&nbsp;
                <a href="<?php echo url('index/add'); ?>"><button type="button" style="height:32px;background-color:#DD1641;color:white;">添加管理员</button></a><br/><br/>
                <form action="<?php echo url('index/delete'); ?>" name="adminForm" method="post">
	               <table border="1" width="99%"  cellspacing ="0" cellpadding="0" >
	                	<tr style="height:30px;text-indent:20px;text-align:center;">
	                		<th><input type="checkbox" id="operAll" onclick="getAll()" />全选/全不选</th>
	                		<th>本页序号</th>
	                		<th>管理员昵称</th>
	                		<th>管理员ID</th>
	                		<th>管理员账号</th>
	                		<th>注册时间</th>
	                		<th>最后登录时间</th>
	                		<th>是否激活</th>
	                		<th>分组类型</th>
	                		<th>操作</th>
	                	</tr>
	                	<?php if(is_array($adminlist) || $adminlist instanceof \think\Collection || $adminlist instanceof \think\Paginator): $k = 0; $__LIST__ = $adminlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$alist): $mod = ($k % 2 );++$k;?>
	                	<tr style="height:30px;text-align:center;">
	                		<td>
								<input type="checkbox" name="selectbox[]" value="<?php echo $alist['id']; ?>" />
							</td>
	                		<td><?php echo $k; ?></td>
	                		<td><?php echo $alist['nickname']; ?></td>
		                	<td><?php echo $alist['id']; ?></td>
		                	<td><?php echo $alist['adminname']; ?></td>
		                	<td><?php echo $alist['reg_time']; ?></td>
		                	<td><?php echo $alist['last_login']; ?></td>
		                	<td>
								<?php if($alist['active'] == '1'): ?>
									已激活
								<?php else: ?>
									未激活
								<?php endif; ?>
							</td>
							<td>管理员所属分组</td>
							<td><a href="<?php echo url('index/edit',['id' => $alist['id']]); ?>">修改管理员</a></td>
	                	</tr>
	                	<?php endforeach; endif; else: echo "" ;endif; ?>
	                </table>
                </form>
                <!-- /内容部分结束 -->
            </div>
            <!-- /Page Content --> 
		</div>	
	</div>
当前第<?php echo $adminlist->currentPage(); ?>页，共<?php echo $adminlist->lastPage(); ?>页/<?php echo $adminlist->total(); ?>个记录<?php echo $page; ?>

	    <!--Basic Scripts-->

<script type="text/javascript">
	//是否删除
	function del(){
		var count = 0;
		var checkArr = document.getElementsByName("selectbox[]");
		if(checkArr.length){
			for(var i =0; i<checkArr.length;i++){
				if(checkArr[i].checked==true){
					count++;
				}
			}
		}else{
			if(checkArr.checked = false){
				count++;
			}			
		}		
		if(count == 0){  
	        //至此，说明没有标签被选择到，可以进行相应的操作  
	        alert("没有选中任何选项！");  
	    } 
		if(count>0){
			if(window.confirm('请确认是否删除')){
			document.adminForm.submit();
			}
		}
	}
	//全选 全不选
	function getAll(){
		 var tit = document.getElementById("operAll");
		 var inputs = document.getElementsByTagName("input");
		 for(var i = 0; i < inputs.length; i++) {
	  		if(inputs[i].type == "checkbox"){
	   			if(tit.checked == true){
	    			inputs[i].checked = true;
	   			}else{
	    			inputs[i].checked = false;
	   			}
	  		}
	 	}
	}
</script>
</body></html>