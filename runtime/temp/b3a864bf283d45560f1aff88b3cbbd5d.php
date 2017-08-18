<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\wamp\www\zwt5\public/../application/index\view\index\project.html";i:1502934512;s:65:"D:\wamp\www\zwt5\public/../application/index\view\Public\top.html";i:1502173957;s:68:"D:\wamp\www\zwt5\public/../application/index\view\Public\footer.html";i:1502874012;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">

	<meta name="apple-mobile-web-app-capable" content="yes">

	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<meta name="format-detection" content="telephone=no">
	<title>集团项目</title>
	<link rel="stylesheet" href="/static/index/css/base1.css">
	<link rel="stylesheet" href="/static/index/css/style.css">
	<link rel="stylesheet" href="/static/index/css/xm-global.css">
	<style>
	
		.jituan{
			background:#a6272c;
			color: #fff;
		}
	</style>
</head>
<body>
	<!-- 首页头部开始 -->
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
	<!-- 首页头部结束-->
	

	<div class="fBg"></div>
	<div class="page-container">
		<div class="pageAbsout">
	    	<a href="/" class="indexlogo"></a>
	        <a href="">您所在的位置：</a> &gt;
	        <a href="<?php echo url('index/index'); ?>">竹文投</a> &gt;  
	        <a href="<?php echo url('index/'.$onenav['htmlName'],['id'=>$onenav['id']]); ?>"><?php echo $onenav['navName']; ?></a> &gt; 
	        <a href="" class="cur"><?php echo $location['navName']; ?></a>
		</div>
	</div>

	<!-- 分类介绍 -->
	<div class="xm-container">
		<?php if(is_array($sannav) || $sannav instanceof \think\Collection || $sannav instanceof \think\Paginator): $k = 0; $__LIST__ = $sannav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if(($k%3==0)): ?>
		<div class="item" id="three">
		<?php else: ?>
		<div class="item">
		<?php endif; ?>
			<!-- 图文 -->
			<div class="pic">
	        	<a id="">
	            	<img src="<?php echo $vo['img']; ?>" title="">
	        	</a>
		    </div>
			<div class="similars">
			    <!-- <span class="p4p-tag">适用性别:男</span> -->
			    <h3><?php echo $vo['navName']; ?></h3>
				<p><?php echo $vo['desc']; ?></p>
			  
				<div class="aa">
					<a href="<?php echo url('index/article',['pid'=>$vo['id']]); ?>">
						
					</a>
				</div>
			</div>
			    
  		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>
  		<div class="item" id="three">
			<!-- 图文 -->
			<div class="mask">
				<?php if(is_array($twonav) || $twonav instanceof \think\Collection || $twonav instanceof \think\Paginator): $k = 0; $__LIST__ = $twonav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;if($vo['navName']=='好莱坞影视'): if(($vo['navName']==$location['navName'])): ?>
							<a href="<?php echo url('index/'.$vo['htmlName'],['id'=>$vo['id']]); ?>" class="product_img">
								<p class="hover yellow">影视<br>系列</p>
							</a>
						<?php else: ?>
							<a href="<?php echo url('index/'.$vo['htmlName'],['id'=>$vo['id']]); ?>" class="product_img">
								<p>影视<br>系列</p>
							</a>
						<?php endif; else: if(($vo['navName']==$location['navName'])): ?>
							<a href="<?php echo url('index/'.$vo['htmlName'],['id'=>$vo['id']]); ?>" class="product_img">
								<p class="hover yellow">
									<?php echo mb_substr($vo['navName'],0,2,'utf-8'); ?><br>
									<?php echo mb_substr($vo['navName'],2,2,'utf-8'); ?>
								</p>
							</a>
						<?php else: ?>
							<a href="<?php echo url('index/'.$vo['htmlName'],['id'=>$vo['id']]); ?>" class="product_img">
								<p>
									<?php echo mb_substr($vo['navName'],0,2,'utf-8'); ?><br>
									<?php echo mb_substr($vo['navName'],2,2,'utf-8'); ?>
								</p>
							</a>
						<?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
		  </div>
  	 </div>
  	 <div class="clearfix"></div>
	</div>

	<!-- 底部开始 -->
	<!-- footer -->
		<div class="footer">	
			<div class="footer-container clearfix">
				<div class="rightfooter">
					<div class="erweima">
						<img width="90" height="90" src="/static/index/img/erweima.jpg"/>
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
<script src="/static/index/js/jquery-1.12.4.min.js"></script>
<script src="/static/index/js/index.js"></script>
<script>
	$(".down_2:nth-").css("display","block");

</script>
</html>
