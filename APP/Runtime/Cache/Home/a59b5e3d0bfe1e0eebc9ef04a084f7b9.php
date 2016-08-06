<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>教练缘</title>
		<script type="text/javascript" src="/jiaolianyuan/Public/js/jquery-2.1.4.min.js" ></script>
		<script type="text/javascript" src="/jiaolianyuan/Public/js/jquery-2.2.1.min.js"></script>
		<script type="text/javascript" src="/jiaolianyuan/Public/js/coach.js"></script>
		<link rel="stylesheet" type="text/css" href="/jiaolianyuan/Public/CSS/style.css"/>
	</head>
	<body>
		<div class="contianer">
			<header>
				<div class="heading">
					<div class="heading-center">
						<div class="logo">
							<a href="http://localhost/jiaolianyuan/index.php/Home/Index/index.html"><img src="/jiaolianyuan/Public/images/web首页素材/logo.png" alt="logo" /></a>	
						</div>
						<div class="login-reg">
							<span><a href="http://localhost/jiaolianyuan/index.php/Home/Login/login.html">登录</a></span><span>|</span><span><a href="http://localhost/jiaolianyuan/index.php/Home/Register/register.html">注册</a></span>
						</div>
					</div>
				</div>
			</header>
			
			<!--<p><?php echo ($list['cname']); ?></p>-->
		   
				
				<div class="content">
					<div class="all-classes">
						<img src="/jiaolianyuan/Public/images/web首页素材/全部课程.png" alt="all-classes" width="240" height="70"/>
					</div>					
						<div class="nav">
							<ul id="header-nav">
							  <li><a href="javasrcipt:;">首页</a></li>
							  <li><a href="javasrcipt:;">帮助</a></li>
							  <li><a href="javasrcipt:;">论坛</a></li>
							  <li><a href="javasrcipt:;">我的学习</a></li>
							</ul>
						</div>
						<div class="search">
							
							<form>
								<label>
									<input type="button" value="" />
									<input type="text"  value="" placeholder="请输入关键字…"/>
								</label>
							</form>
						</div>
						<div class="nav-left">
							
							<ul>
								<?php if(is_array($getCourseCate)): $i = 0; $__LIST__ = $getCourseCate;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="first-list"><a href="javascript:;"><span><?php echo ($list['cname']); ?></span></a>
									<hr />
										<ul class="children-list">
								<?php if(is_array($classList)): $i = 0; $__LIST__ = $classList;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$classList): $mod = ($i % 2 );++$i;?><li><a href="javascript:;"><?php echo ($classList['classname']); ?></a></li><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
											
										</ul>
									
								</li><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
							</ul>
							
						</div>
						<div class="carousel">
							 <div id="big_banner_wrap">
							 <div id="big_banner_pic_wrap">
								 <ul id="big_banner_pic">
								 	 <li><img src="/jiaolianyuan/Public/images/web首页素材/1.jpg"></li>
									 <li><img src="/jiaolianyuan/Public/images/web首页素材/大轮播.jpg"></li>
									 <li><img src="/jiaolianyuan/Public/images/web首页素材/29.jpg"></li>
								 </ul>
							 </div>
							 <div id="big_banner_change_wrap">
								 <div id="big_banner_change_prev"> &lt;</div>
								 <div id="big_banner_change_next">&gt;</div>
							 </div>
							 </div>
						</div>
						<div class="hot-classes">
							<div class="strategy">
							<ul>
								<li><a href="javascript:;">
									<img src="/jiaolianyuan/Public/images/web首页素材/图标广告/教练指导学员.png" />
									<!--<span></span>-->
								</a>
								</li>
								<li><a href="javascript:;">
									<img src="/jiaolianyuan/Public/images/web首页素材/图标广告/云盘一键下载.png" />	
								</a>
								</li>
								<li><a href="javascript:;">
									<img src="/jiaolianyuan/Public/images/web首页素材/图标广告/提升空间大.png"/>	
								</a>
								</li>
								<li><a href="javascript:;">
									<img src="/jiaolianyuan/Public/images/web首页素材/图标广告/多渠道解决问题.png"/>	
								</a>
								</li>
							</ul>
							<hr />
						</div>
						<div class="hot-recomendation">
							<p>热门课程</p>
							<ul>
								<!--循环遍历热门课程图片-->
								<?php if(is_array($hotClassList)): $i = 0; $__LIST__ = $hotClassList;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$hotClassList): $mod = ($i % 2 );++$i;?><li><a href="#"><img src="/jiaolianyuan/Public/images/<?php echo ($hotClassList['classpic']); ?>" /></a></li><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
							</ul>
						</div>
							
						</div>
						
						<div class="classes-sort">
							<p>PHP工程师</p>
							<div class="ad-left">
								<img src="/jiaolianyuan/Public/images/web首页素材/php工程师/广告.png"/ width="224" height="436">
							</div>
							<div class="classes-right">
								<ul>
								<!-- 循环遍历8个PHP工程师课程 -->
								<?php if(is_array($phpData)): $i = 0; $__LIST__ = $phpData;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$phpData): $mod = ($i % 2 );++$i;?><li><a href="#"><img src="/jiaolianyuan/Public/images/<?php echo ($phpData['classpic']); ?>"/></a></li><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>  
								</ul>
							</div>
						</div>
				</div>
			<footer>
				<div class="footer">
					<div class="my-footer">
						<div class="footer-first">
						<div class="footer_1">
							<ul>
								<li><a href="#"><h4>帮助中心</h4></a>
									<ul>
										<li><a href="#">账户管理</a></li>
										<li><a href="#">购物指南</a></li>
										<li><a href="#">订单操作</a></li>
									</ul>
								</li>
								<li><a href="#"><h4>服务支持</h4></a>
									<ul>
										<li><a href="#">售后政策</a></li>
										<li><a href="#">自助服务</a></li>
										<li><a href="#">相关下载</a></li>
									</ul>
								</li>
								<li><a href="#"><h4>关注我们</h4></a>
									<ul>
										<li><a href="#">新浪微博</a></li>
										<li><a href="#">qq邮箱</a></li>
										<li><a href="#">官方微信</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
						<div id="contact">
						<p>400-100-12580</p>
						<p><button>在线客服</button></p>
						</div>
					</div>
				</div>
				<div class="footer-last">
							<ul>
								<li><a href="#">关于我们</a>|</li>
								<li><a href="#">联系我们</a>|</li>
								<li><a href="#">商家入驻</a>|</li>
								<li><a href="#">友情链接</a>|</li>
								<li><a href="#">意见反馈</a>|</li>
								<li><a href="#">售后服务</a>|</li>
								<li><a href="#">知识产权</a></li>
							</ul>
						</div>
							<br />
							<div class="power">
							<p>
								Copyright&copy;2016广东石油化工学院云计算实验室版权所有
							</p>
						</div>
			</footer>
		</div>
	</body>
</html>