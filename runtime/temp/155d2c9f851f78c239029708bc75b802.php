<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:59:"E:\www\zwt5\public/../application/index\view\index\faq.html";i:1502950349;s:60:"E:\www\zwt5\public/../application/index\view\Public\top.html";i:1502950349;s:63:"E:\www\zwt5\public/../application/index\view\Public\footer.html";i:1502950349;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">

<meta name="apple-mobile-web-app-capable" content="yes">

<meta name="apple-mobile-web-app-status-bar-style" content="black">

<meta name="format-detection" content="telephone=no">
<title>招聘FAQ</title>
<link rel="stylesheet" href="/static/index/css/base1.css">
<link rel="stylesheet" href="/static/index/css/style.css">
<link rel="stylesheet" href="/static/index/css/contact/public.css">
<link rel="stylesheet" href="/static/index/css/contact/job.css">
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
	<img src="/static/index/img/contact.jpg" alt="" width="100%">
	<div class="page-container">
		<div class="pageAbsout">
	    	<a href="/" class="indexlogo"></a>
	        <a href="">您所在的位置：</a>
	        <a href="/">竹文投</a> &gt;  
	        <a href="<?php echo url('index/about',['id'=>42]); ?>">联系我们</a> &gt; 
	        <a href="" class="cur">招聘FAQ</a>
		</div>
		
	</div>
<div class="tabs">
        <div class="box">
          <div class="box-option">
              <div class="option">
                  <ul>
                      <li><a href="<?php echo url('index/about',['id'=>44]); ?>">招聘公告</a></li>
                      <li><a href="/index/index/shezhao">社会招聘</a></li>
                      <li><a href="" class="current">招聘FAQ</a></li>
                        <div class="clearfix"></div>
                  </ul>
              </div>
          </div>
            <div class="clearfix"></div>
            <!-- 选项卡内容 -->
            <div class="card">
                <ul>
                  <li class="hover"> 
                                          <p class="notice">招聘FAQ</p>
                      <div>
	                      <div class="a-p">
							<p>Q1：如何申请公司的职位？</p>
							<strong>A</strong>：招聘的职位会第一时间在招聘公告里显示，正在进行的流程和时间段也同时显示。请在规定时间内根据相关招聘类型选择适合您的职位，在线完整填写您的个人简历；填写完毕之后请务必点击提交，提交之后您的求职申请才正式生成。 相同身份证号只可申请一次相同职位。</div>
							
							<div class="a-p">
							<p>Q2：除了在线申请还有其他什么形式可以申请？</p>
							<strong>A</strong>：除官网招聘信息外，您还可以登录智联招聘、51JOB等各大招聘网站进行简历投递，具体招聘信息以各大招聘网站推送为准。</div>
							
							<div class="a-p">
							<p>Q3：每个人可以申请几个职位？几个公司地点？</p>
							<strong>A</strong>：职位可以申请多个，我公司将以简历匹配度及个人能力决定您的工作岗位，工作地点也可以申请2个。</div>
							
							<div class="a-p">
							<p>Q4：整个招聘流程是怎样？</p>
							<strong>A</strong>：简历投递——简历筛选——初试——机试——复试</div>
							
							<div class="a-p">
							<p>Q5：面试的形式是如何？用什么语言进行？</p>
							<strong>A</strong>：面试基本上采用单人面试，用中文进行。</div>
							
							<div class="a-p">
							<p>Q6：如果这次没有适合我的职位，我又想加入公司怎么办？</p>
							<strong>A</strong>：您可以选择将自己的简历录入到我们的招聘后台，在有相关职位OPEN的时候，我们会首先会优先考虑录入者作为中招聘候选人。</div>
							
							<div class="a-p">
							<p>Q7：如果我在应聘的过程中碰到难题，怎么办？</p>
							<strong>A</strong>：请在“我要提问”中进行相关问题的提问，我们在收到问题会第一时间给您答复。
						   </div>
                    </div>
                   <div class="clearfix"></div>
                   </li> 
                </ul>
            </div>
         </div>
     </div>
    
    
 <div class="CoreImg"></div>

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