<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\wamp\www\zwt5\public/../application/index\view\index\details.html";i:1503452299;s:65:"D:\wamp\www\zwt5\public/../application/index\view\Public\top.html";i:1503021190;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>集团新闻</title>
	<link rel="stylesheet" href="/static/index/css/base1.css">
	<link rel="stylesheet" href="/static/index/css/style.css">
	<link rel="stylesheet" href="/static/index/css/details.css">
	
	<meta name ="keywords" content="美女,竹,签,周杰伦,刘德华,谭咏麟,竹签,竹签文化,竹文投,金融,明星,电影,综艺,时政,胡歌,头条,热点,段子,内涵,你懂的,内涵段子">
	<meta name="description" content="这是内容详情页">
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
	<img src="/static/index/img/news.jpg" alt="" width="100%">
	<div class="fBg"></div>
	<div class="page-container">
		<div class="pageAbsout">
	    	<a href="/" class="indexlogo"></a>
	        <a href="/About/index.html">您所在的位置：</a> &gt;
	        <a href="/">竹文投</a> &gt;  
	        <a href="<?php echo url('index/'.$onenav['htmlName'],['id'=>$onenav['id']]); ?>"><?php echo $onenav['navName']; ?></a> &gt; 
	        <a href="<?php echo url('index/'.$twonav['htmlName'],['id'=>$twonav['id']]); ?>"><?php echo $twonav['navName']; ?></a> &gt; 
	        <a href="" class="cur"><?php echo $article['title']; ?></a>
		</div>


		<div class="commonDetailed">
            <div class="commonDetailedtitle">
                <h3><?php echo $article['title']; ?></h3>
                <p class="date">发布日期：<?php echo $article['created']; ?></p>

            </div>

            <div class="commonDetailedContents">
            	<?php echo $article['introtext']; ?>	
            </div>
            <div class="commonDetailedContentsfoot">
                <p class="return"><a href="<?php echo url('index/'.$twonav['htmlName'],['id'=>$twonav['id']]); ?>">返回</a></p>
             
                <dl class="clearfix">
                    <dt>
                    	<?php if(($back=='')): ?>
                    	<span>暂&nbsp;&nbsp;&nbsp;无</span>
                    	<?php else: ?>
                        <a href="<?php echo url('index/article',['id'=>$back['id']]); ?>">
                        	<span>上一条</span><?php echo $back['title']; ?>
                        </a>
                        <?php endif; if(($next=='')): ?>
                    	<span>暂&nbsp;&nbsp;&nbsp;无</span>
                    	<?php else: ?>
                        <a href="<?php echo url('index/article',['id'=>$next['id']]); ?>">
                        	<span>下一条</span><?php echo $next['title']; ?>
                        </a>
                        <?php endif; ?>
                    </dt>
                </dl>
            </div>
        </div>
		

	</div>


	<!-- footer -->
	<div class="footer">	
		<div class="footer-container clearfix">
			<div class="rightfooter">
				<div class="erweima">
					<span></span>
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
					©2017 正中投资集团有限公司 版权所有 | 
					<a href="" target="_blank">粤ICP备14060846号</a>
				</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	
</body>
<script src="/static/index/js/jquery-1.12.4.min.js"></script>
<script src="/static/index/js/index.js"></script>
<script>
	// $(".down_2:first").css("display","block");

</script>
</html>

