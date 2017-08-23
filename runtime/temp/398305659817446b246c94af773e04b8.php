<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\wamp\www\zwt5\public/../application/index\view\index\shezhao.html";i:1503452695;s:65:"D:\wamp\www\zwt5\public/../application/index\view\Public\top.html";i:1503021190;s:68:"D:\wamp\www\zwt5\public/../application/index\view\Public\footer.html";i:1503386494;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">

<meta name="apple-mobile-web-app-capable" content="yes">

<meta name="apple-mobile-web-app-status-bar-style" content="black">

<meta name="format-detection" content="telephone=no">

<meta name ="keywords" content="竹签,竹文投,竹签文化,竹文品牌,美女,竹,签,周杰伦,刘德华,谭咏麟,金融,明星,电影,综艺,时政,胡歌,头条,热点,段子,内涵,你懂的,内涵段子">
<meta name="description" content="竹签,竹签文化,竹文投,竹文品牌,这是招聘">
<title>社会招聘</title>
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
	        <a href="" class="cur">社会招聘</a>
		</div>
		
	</div>
<div class="tabs">
        <div class="box">
          <div class="box-option">
              <div class="option">
                  <ul>
                      <li><a href="<?php echo url('index/about',['id'=>44]); ?>">招聘公告</a></li>
                      <li><a href="" class="current">社会招聘</a></li>
                      <li><a href="/index/index/faq">招聘FAQ</a></li>
                        <div class="clearfix"></div>
                  </ul>
              </div>
          </div>
            <div class="clearfix"></div>
            <!-- 选项卡内容 -->
            <div class="card">
                <ul>
                  <li class="hover"> 
                  <p class="notice">社会招聘</p>
                  <table>
                    <thead>
                        <tr>
                            <th>职位名称</th>
                            <th>职业类别</th>
                            <th>人数</th>
                            <th>工作地点</th>
                            <th>发布时间</th>
                        </tr>
                    </thead>
                    <tbody>
                    	<?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<tr class="zhaopin">
	                       <td>
	                         <a href="<?php echo url('index/zhaopin',['id'=>$vo['id']]); ?>"><?php echo $vo['zhiwei']; ?></a>
	                       </td>
	                       <td><?php echo $vo['bumen']; ?></td>
	                       <td><?php echo $vo['renshu']; ?></td>
	                       <td><?php echo $vo['didian']; ?></td>
	                       <td><?php echo $vo['start']; ?></td>
                    	</tr>
                    	<?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                  </table>
                  <div class="clearfix"></div>
                   </li> 
                </ul>
            </div>
         </div>
     </div>

<!-- 底部开始 -->
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
<script src="/static/index/js/jquery-1.12.4.min.js"></script>
<script src="/static/index/js/index.js"></script>
<script>
	$(".down_2:nth-").css("display","block");

</script>
</html>