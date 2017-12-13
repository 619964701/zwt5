<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\wamp\www\zwt5\public/../application/homeback\view\nav\index.html";i:1503021190;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>防伪码首页</title>
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
</head>
<body>
<br>
		<table  border ="1" cellspacing ="0" cellpadding="0" width="99%">
			<tr style="height:30px;text-align:center;">
           		<th>ID</th>
           		<th>导航栏名称</th>
           		<th>被访问的模板名称</th>
           		<th>样式</th>
           		<th>导航栏背景图</th>
           		<th width="100px">导航栏描述</th>
           		<th>父ID</th>
           		<th>操作</th>
	        </tr>
	        
	        <?php if(is_array($list[0]) || $list[0] instanceof \think\Collection || $list[0] instanceof \think\Paginator): $i = 0; $__LIST__ = $list[0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	        <tr style="text-indent:30px;height:30px;">
	        	<td><?php echo $vo['id']; ?></td>
	        	<td style="color:#1BA800;"><?php echo $vo['navName']; ?></td>
	        	<td><?php echo $vo['htmlName']; ?></td>
	        	<td style="color:#1BA800;"><?php echo $vo['cssName']; ?></td>
	        	<td><?php echo $vo['img']; ?></td>
	        	<td><?php echo $vo['desc']; ?></td>
	        	<td><?php echo $vo['pid']; ?></td>
	        	<td>
					<a href="<?php echo url('nav/edit',['id' => $vo['id']]); ?>"><button type="button" style="height:32px;background-color:#DD1641;color:white;">改</button></a>
					<button value="<?php echo $vo['id']; ?>" onclick="del(this.value);return false;" type="button" style="height:32px;background-color:#DD1641;color:white;">删</button>
					<a href="<?php echo url('nav/add',['id' => $vo['id']]); ?>" ><button type="button" style="height:32px;background-color:#DD1641;color:white;">增</button></a>
				</td>
			</tr>
				<?php if(isset($list[$vo['id']])): if(is_array($list[$vo['id']]) || $list[$vo['id']] instanceof \think\Collection || $list[$vo['id']] instanceof \think\Paginator): $i = 0; $__LIST__ = $list[$vo['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
				  <tr style="text-indent:30px;height:30px;">
		        	<td><?php echo $vo2['id']; ?></td>
		        	<td style="text-indent:80px;">|- <?php echo $vo2['navName']; ?></td>
		        	<td><?php echo $vo2['htmlName']; ?></td>
		        	<td style="text-indent:80px;">|- <?php echo $vo2['cssName']; ?></td>
		        	<td><?php echo $vo2['img']; ?></td>
		        	<td><?php echo $vo2['desc']; ?></td>
		        	<td><?php echo $vo2['pid']; ?></td>
		        	<td>
						<a href="<?php echo url('nav/edit',['id' => $vo2['id']]); ?>"><button type="button" style="height:32px;background-color:#DD1641;color:white;">改</button></a>
						<button value="<?php echo $vo2['id']; ?>" onclick="del(this.value);return false;" type="button" style="height:32px;background-color:#DD1641;color:white;">删</button>
						<a href="<?php echo url('nav/add',['id' => $vo2['id']]); ?>" ><button type="button" style="height:32px;background-color:#DD1641;color:white;">增</button></a>
					</td>
				</tr>
							<?php if(isset($list[$vo2['id']])): if(is_array($list[$vo2['id']]) || $list[$vo2['id']] instanceof \think\Collection || $list[$vo2['id']] instanceof \think\Paginator): $i = 0; $__LIST__ = $list[$vo2['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
							<tr style="text-indent:30px;height:30px;">
								<td><?php echo $vo3['id']; ?></td>
								<td style="text-indent:130px;">|- <?php echo $vo3['navName']; ?></td>
								<td><?php echo $vo3['htmlName']; ?></td>
								<td style="text-indent:130px;">|- <?php echo $vo3['cssName']; ?></td>
								<td><?php echo $vo3['img']; ?></td>
								<td><?php echo $vo3['desc']; ?></td>
								<td><?php echo $vo3['pid']; ?></td>
								<td><a href="<?php echo url('nav/edit',['id' => $vo3['id']]); ?>"><button type="button" style="height:32px;background-color:#DD1641;color:white;">改</button></a>
						<button value="<?php echo $vo3['id']; ?>" onclick="del(this.value);return false;" type="button" style="height:32px;background-color:#DD1641;color:white;">删</button></td>
							</tr>
							<?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
		</table>
<script type="text/javascript">
function del(val){
	if(window.confirm('请确认是否删除')){
		window.location.href="<?php echo url('nav/delete'); ?>?id="+val;
	}
}
</script>
<script src="/static/homeback/js/jquerytime.js"></script>
<script src="/static/homeback/js/jquery-1.12.4.min.js"></script>
<script src="/static/homeback/js/jquery.datetimepicker.full.js"></script>
</body>
</html>