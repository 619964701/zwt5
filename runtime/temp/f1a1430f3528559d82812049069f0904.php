<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:68:"D:\wamp\www\zwt5\public/../application/index\view\index\details.html";i:1503297835;s:65:"D:\wamp\www\zwt5\public/../application/index\view\Public\top.html";i:1503021190;}*/ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>集团新闻</title>
	<link rel="stylesheet" href="/static/index/css/base1.css">
	<link rel="stylesheet" href="/static/index/css/style.css">
	<link rel="stylesheet" href="/static/index/css/details.css">
	<style>
	
	.page-container{
	width: 1060px;
    margin: 0 auto;
    /*margin-bottom: 50px;*/
}
.pageAbsout {
    padding: 20px 0;
    border-bottom: 1px solid #E8E8E8;
}
.pageAbsout a{
	display: inline-block;
}
.indexlogo {
    background: url(/static/index/img/inco13.png) 0 1px no-repeat;
    display: inline-block;
    width: 21px;
    height: 20px;
    vertical-align: middle;
}
.pageAbsout .cur{
	color: #a6272c;
}
/*内容*/
.commonDetailed {
   
    margin-top: 55px;
}
.commonDetailedtitle {
    padding: 0 170px;
}
.commonDetailedtitle h3 {
    font-size: 28px;
    text-align: center;
    line-height: 32px;
    color: #1a1a1a;
    margin-bottom: 25px;
}
.commonDetailedtitle .date {
    text-align: center;
    display: block;
    color: #666;
    font-size: 13px;
}
.commonDetailedContents {
    padding: 30px 170px;
    font-size: 16px;
    line-height: 32px;
    color: #1a1a1a;
    text-indent: 32px;
}
.commonDetailedContents img {
    display: block;
    max-width: 100%;
    width: 600px !important;
    height: auto !important;
    margin: 20px auto;
}
.commonDetailedContentsfoot {
    padding-bottom: 65px;
}
.commonDetailedContentsfoot p.return {
    text-align: center;
    padding-bottom: 40px;
}
.commonDetailedContentsfoot p.return a {
    display: inline-block;
    background: #a6272c;
    padding: 6px 34px;
    color: #FFF;
    font-size: 14px;
}
.commonDetailedContentsfoot dl {
    border: 1px solid #cccccc;
    border-left: none;
    border-right: none;
    font-size: 13px;
    padding: 13px 0px;
}
.commonDetailedContentsfoot dl dt {
    float: left;
}
.commonDetailedContentsfoot dl a {
    color: #666;
}
.commonDetailedContentsfoot dl span {
    display: inline-block;
   
    color: #1a1a1a;
    line-height: 27px;
    padding: 0px 10px;
    margin-right: 15px;
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
	        <a href="/About/index.html">您所在的位置：</a> &gt;
	        <a href="/About/Brand/index.html">竹文投</a> &gt;  
	        <a href="/About/Brand/index.html">集团新闻</a> &gt; 
	        <a href="/About/Brand/index.html" class="cur">xxxxx</a>
		</div>


		<div class="commonDetailed">
            <div class="commonDetailedtitle">
                <h3>正中集团首部品牌微电影《行走的梦想家》5月20日首映</h3>
                <p class="date">发布日期：2017-05-23</p>

            </div>

            <div class="commonDetailedContents">
                <p>
                	<span>5月20日，由正中集团出品的首部微电影《行走的梦想家》在科兴科学园国际会议中心举办首映礼，正中集团高层领导、集团总部全体员工、下属公司主管级及以上人员、基层员工代表以及本片剧组人员共约500人参加了活动。</span>
                </p>
                <p>

                	<img src="./images/1.jpg" title="056A0763a_meitu_5.jpg" alt="056A0763a_meitu_5.jpg">
                </p>
                <p>
                	
                	<span>首映礼上礼花绽放，正中集团高层共同为《行走的梦想家》完成点映仪式。随后，微电影正式放映。影片中三位主人公的故事交映在观众眼前，真实的故事引起了现场的共鸣，员工纷纷表示深受感动。剧组访谈环节更是让员工了解到了微电影制作的幕后故事，剧组人员分享的点滴感悟也感染了现场观众。首映礼在温馨感动的氛围中落下帷幕。</span>
                </p>
               <img src="./images/2.jpg" title="ZE9A9535a.jpg" alt="ZE9A9535a.jpg">
                <p>
                	
                	
                	<span>正中集团首部微电影《行走的梦想家》根据正中人真实故事改编，通过讲述三位主人公在各自岗位上克服困难、实现价值的故事，体现了正中人身上特有的踏实肯干、追求极致、开放创新的特质。筹拍微电影《行走的梦想家》的过程，也促使全体正中人不断去思考“正中特质是什么”，未来能够引领正中持续的成功的因素有哪些。</span>
                </p>
               

                <p>
                	<img src="./images/3.jpg" title="056A0790a.jpg" alt="056A0790a.jpg">
                	
                </p>
                <p>
                	<span>首映礼过后，正中集团总裁邓学勤发表了“我应该是谁”的主题演讲。他指出，“我应该是谁”是思考“正中应该是什么样的”、“正中特质是什么”的系列课题，而探索并打造“正中特质”则是为了进一步归纳、提炼过去企业成功的逻辑，并在未来引导公司战略更好落地。邓学勤表示，打造正中特质是今年集团的四大核心任务之一，目前而言正中特质仍是一个开放命题，并未形成定论，全体员工需要不断思考、学习和探讨，才能提炼总结出真正的正中特质。过去，正中人身上也体现出许多诸如 “想做事”、“会做事”、“能成事”等的美好品质，未来还需要进一步挖掘、打造最核心最优秀的品质，才能保证企业永葆生机、持续成功，为社会创造源源不断的价值。</span>
                </p>
               
            </div>
            <div class="commonDetailedContentsfoot">
                <p class="return"><a href="/News/index.html">返回</a></p>
             
                <dl class="clearfix">
                    <dt>
                        <a href="/News/271.html">
                        	<span>下一条</span>“惠生活 慧办公 汇生态”——正中会APP内测启动会成功召开
                        </a>
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

