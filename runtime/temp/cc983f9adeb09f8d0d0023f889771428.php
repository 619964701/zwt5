<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\wamp\www\zwt5\public/../application/index\view\index\index.html";i:1503021190;s:65:"D:\wamp\www\zwt5\public/../application/index\view\Public\top.html";i:1503021190;s:68:"D:\wamp\www\zwt5\public/../application/index\view\Public\footer.html";i:1503386494;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
	
		<meta name="apple-mobile-web-app-capable" content="yes">
	
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
	
		<meta name="format-detection" content="telephone=no">
		<title>竹文品牌管理（上海）有限公司</title>
		<link rel="shortcut icon" href="favicon.ico" />
		<link rel="stylesheet" type="text/css" href="/static/index/css/base1.css"/>
		<link rel="stylesheet" type="text/css" href="/static/index/css/style.css"/>
	</head>
	<body>
		<!-- 头部 -->
		<div class="header-header">
			<div class="header clearfix">
				<!-- logo -->
				<div class="logo">
					<a href="javascript:;">
						
					</a>
				</div>

				<!-- nav -->
				<div class="nav">
					<ul class="navUl">
					<li class="">
							<a href="<?php echo url('index/index'); ?>">首页</a>
					</li>
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li class="">
							<a href="<?php echo url('index/'.$vo['htmlName'],['id'=>$vo['id']]); ?>"><?php echo $vo['navName']; ?></a>
							<?php if(($vo['son']!='')): ?>
							<div class="subWraper down_2">
								<?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
					            <dl class="">
					                <dt><a  href="<?php echo url('index/'.$vo2['htmlName'],['id'=>$vo2['id']]); ?>"><?php echo $vo2['navName']; ?></a></dt>
									<?php if(($vo2['son']!='')): ?>
									<dd>
									<?php if(is_array($vo2['son']) || $vo2['son'] instanceof \think\Collection || $vo2['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo2['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
									<a href="<?php echo url('index/article',['pid'=>$vo3['id']]); ?>"><?php echo $vo3['navName']; ?></a>    
									<?php endforeach; endif; else: echo "" ;endif; ?>
									</dd>
									<?php endif; ?>
					            </dl>
					            <?php endforeach; endif; else: echo "" ;endif; ?>
        					</div>
        					<?php endif; ?> 
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>	
					</ul>
				</div>
			</div>
		</div>
		<!-- banner -->
		<div id="play" class="play_box clearfix">
			<div class="imglist">
				<a href="#" class="current">
					<img src="/static/index/img/banner01.png" alt="">
				</a>
				<a href="#">
					<img src="/static/index/img/banner02.png" alt="">
				</a>
				<a href="#">
					<img src="/static/index/img/banner03.png" alt="">
				</a>
				
			
			</div>
			<div class="iconlist clearfix">
				<ul>
					<li class="current"></li>
					<li></li>
					<li></li>
					
					<div class="clearfix"></div>
				</ul>
			</div>
		</div>

		<!-- 第二部分 -->
		<div class="main">
			<div class="main-box clearfix">
				<div class="main-news">
					<h3>
						<a href="<?php echo url('index/news',['id'=>38]); ?>" class="more"></a>
						<span>新闻中心</span>
					</h3>
					<dl class="newsdl clearfix">
						<dt>
							<em><?php echo $ri; ?></em>
							<span><?php echo $ny; ?></span>
						</dt>
						<dd>
							<h4 class="newstitle">
								<a href="<?php echo url('index/article',['id'=>$newest['id']]); ?>"><?php echo $newest['title']; ?></a>
							</h4>
							<p class="newstext">
								<a  href="<?php echo url('index/article',['id'=>$newest['id']]); ?>"><em id="limitNum"><?php echo $newest['yinxu']; ?></em>
								<span>查看详情>></span>
								</a>
							</p>
						</dd>
						
						<div class="clearfix"></div>
					</dl>
					<ul class="newslist">
					<?php if(is_array($newslist) || $newslist instanceof \think\Collection || $newslist instanceof \think\Paginator): $k = 0; $__LIST__ = $newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if(($k!=1)): ?>
						<li><a href="<?php echo url('index/article',['id'=>$vo['id']]); ?>"><span><?php echo $vo['created']; ?></span><?php echo $vo['title']; ?></a></li>
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<!-- 图片 -->
				<div class="main-middle">
					<div class="mainCon">
						<img src="/static/index/img/instru.png" alt="" class="img">
					</div>
					<div class="main-hover">
						<ul class="hover-ul clearfix">
							<?php if(is_array($jituan) || $jituan instanceof \think\Collection || $jituan instanceof \think\Paginator): $k = 0; $__LIST__ = $jituan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
							<li>
								<a href="<?php echo url('index/'.$vo['htmlName'],['id'=>$vo['id']]); ?>">
									<img src="/static/index/img/<?php echo $k+1; ?>.png" alt="<?php echo $vo['navName']; ?>">
									<p><?php echo $vo['navName']; ?></p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>

				</div>
				<div class="main-photo">
					<img src="/static/index/img/idea.png" alt="">
					<a href="<?php echo url('index/introduction',['id'=>36]); ?>" class="hot-hover">
						<div class="hotCon">
							<p class="text">创业为先</p>
							<p class="text">优质融资</p>
							<p class="text">多元化操作</p>
							<p class="text">"内容+渠道+技术"战略</p>
							<p class="more">
								<span>了解详细</span>
							</p>
						</div>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>



		<!-- footer -->
		<div class="footer">	
			<div class="footer-container clearfix">
				<div class="rightfooter">
					<!-- <div class="erweima">
						<img width="90" height="90" src="/static/index/img/erweima.jpg"/>
					</div> -->

					<div class="weixin">
		            	<span></span>
		                <p class="twoweixinimg" style="display:none">
		                	<img src="/static/index/img/erweima.jpg">
		                </p>
		            </div>
					<p>总部地址：上海市嘉定区南翔镇银翔路515号2号楼</p>
					<br>
					<p>邮编：201802&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电话：021-69981183</p>
				</div>
				<div class="textfooter">
					<p>
						<a href="">法律声明</a>
						<a href="">联系方式</a>
						<a href="">技术支持</a>
					</p>

					<p>
						©2017 竹文品牌管理（上海）有限公司 | 
						<a href="" >沪ICP备16042968号-1</a>
					</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	
	</body>
	<script>
 
    LimitNumber('<?php echo $newest['yinxu']; ?>','limitNum');
    /*用js限制字数，超出部分以省略号...显示*/
    function LimitNumber(txt,idName) {
        var str = txt;
        str = str.substr(0,40) + '...' ;
        var id=document.getElementById(idName);
        id.innerText=str;
    }
 
</script>
	<script src="/static/index/js/jquery-1.12.4.min.js">
	
	</script>
	<script src="/static/index/js/index.js"></script>
</html>

