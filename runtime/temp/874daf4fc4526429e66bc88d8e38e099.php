<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\wamp\www\zwt5\public/../application/homeback\view\index\index.html";i:1503021190;s:68:"D:\wamp\www\zwt5\public/../application/homeback\view\Public\top.html";i:1503021190;s:72:"D:\wamp\www\zwt5\public/../application/homeback\view\Public\sidebar.html";i:1503021190;}*/ ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">

<title>后台管理</title>
<link href="/static/homeback/css/bootstrap.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/static/homeback/css/themes/gray/easyui.css">
<script type="text/javascript" src="/static/homeback/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/static/homeback/js/jquery.easyui.min.js"></script>
<script src="/static/homeback/js/index.js"></script>
<link rel="stylesheet" href="/static/homeback/css/style.css">
<link rel="stylesheet" type="text/css" href="/static/homeback/css/themes/icon.css">
<link rel="stylesheet" href="/static/homeback/css/font-awesome-4.7.0/css/font-awesome.min.css">
<!--  <link rel="stylesheet" type="text/css" href="themes/gray/easyui.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery.easyui.min.js"></script>
<script src="./js/index.js"></script>
<link rel="stylesheet" href="./css/style.css">
<link rel="stylesheet" type="text/css" href="./themes/icon.css">
<link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
-->
</head>
	<!-- 左侧边栏开始 -->
	<body class="easyui-layout">
	<div region="north" border="false" class="cs-north" style="width:100%">
		<div class="cs-north-bg">
			<a href="#" class="cs-north-logo" style="float:left">黑金魁拔后台</a>
			<a href="#"class="left">
				<span style="color: #990000;">竹文投后台管理界面</span>
			</a>
		
		 	<nav id="nav" class="nav right">
				<ul class="first">
					<li>
						<a href="" target="_blank">代理前台</a>
					</li>
					<li>
						<a href="" target="_blank">防伪前台</a>
					</li>
					<li>
						<a href="" target="_blank">代理商登录</a>
					</li>
					<li>欢迎管理员:<?php echo $nickname; ?></li>
	
					<li>
						
						<a href="<?php echo url('login/logout'); ?>">
							<i class="fa fa-circle-o-notch" aria-hidden="true"></i>
						注销</a>
					</li>
				</ul>
			</nav> 
		</div>
	
	</div>
	<!-- 左侧边栏 结束-->
	
	<!-- 左侧边栏开始 -->
		<div region="west" border="true" split="true" title="显示/隐藏" class="cs-west">
		<div class="easyui-accordion" fit="true" border="false" >
			<div title="文章管理" iconCls="icon-photo">
				<p><a href="javascript:void(0);" src="<?php echo url('article/index'); ?>" class="cs-navi-tab">文章管理</a></p>
				<p><a href="javascript:void(0);" src="<?php echo url('article/add'); ?>" class="cs-navi-tab">添加文章</a></p>
			</div>
			<div title="导航栏" iconCls="icon-fit">
				<p><a href="javascript:void(0);" src="<?php echo url('nav/index'); ?>" class="cs-navi-tab">导航栏</a></p>
				<p><a href="javascript:void(0);" src="<?php echo url('nav/add'); ?>" class="cs-navi-tab">增加顶级导航</a></p>
			</div>
			<div title="管理员管理" iconCls="icon-user">
				<p><a href="javascript:void(0);" src="<?php echo url('index/admin_list'); ?>" class="cs-navi-tab">管理员列表</a></p>
				<p><a href="javascript:void(0);" src="<?php echo url('index/add'); ?>" class="cs-navi-tab">增加管理员</a></p>
			</div>
			<div title="友情链接管理" iconCls="icon-photo">
				<p><a href="javascript:void(0);" src="<?php echo url('youqing/index'); ?>" class="cs-navi-tab">友情链接</a></p>
				<p><a href="javascript:void(0);" src="<?php echo url('youqing/add'); ?>" class="cs-navi-tab">增加友情链接</a></p>
			</div>
			<div title="招聘管理" iconCls="icon-photo">
				<p><a href="javascript:void(0);" src="<?php echo url('zhaopin/index'); ?>" class="cs-navi-tab">职位表</a></p>
				<p><a href="javascript:void(0);" src="<?php echo url('zhaopin/add'); ?>" class="cs-navi-tab">增加职位</a></p>
			</div>
			<div title="首页轮播图" iconCls="icon-photo">
				<p><a href="javascript:void(0);" src="<?php echo url('lunbo/index'); ?>" class="cs-navi-tab">轮播图</a></p>
			</div>
		</div>
	</div> 
	<div id="mainPanle" region="center" border="true" border="false">
		 <div id="tabs" class="easyui-tabs"  fit="true" border="false" >
	                <div title="Home">
				<div class="cs-home-remark">
					<h1>欢迎管理员：<?php echo $nickname; ?>  登录后台</h1> <br>			
				</div>
				</div>
	        </div>
	</div>
</body>
</html>