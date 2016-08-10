<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>教练缘</title>
		<link href="/jiaolianyuan/Public/images/logo.ico"rel="icon" />
		<script type="text/javascript" src="/jiaolianyuan/Public/js/jquery-2.1.4.min.js" ></script>
		<script type="text/javascript" src="/jiaolianyuan/Public/js/jquery-2.2.1.min.js"></script>
		<script type="text/javascript" src="/jiaolianyuan/Public/js/coach.js"></script>
		<link rel="stylesheet" type="text/css" href="/jiaolianyuan/Public/CSS/style.css"/>
		
		
		
		<script>
		//获取课程下的班级
		var cname=0;
				$(function(){
					$(".nav-left ul li span").mouseover(function(){
				
				//获取一级分类id
				cname = $(this).html();
				
			$.ajax({
					contentType:"application/json",
					type:"get",
					url:"http://localhost/jiaolianyuan/index.php/Home/Index/getClassList",
					data:{"cname":cname},
					dataType:"json",
					cache:"false",
					async:true,
					success: function(datac){
                        // datac.data[0].id 为班级id,以后可以加在链接上+++
                       //在下面执行append追加前先清除掉原先的，不然后重叠
                     $('.children-list li').detach();
                     if(datac.ret == 200)
                      {
						for (var i=0;i<datac.data.length;i++) {
                            //动态生成结点,并赋值id,二级分类名,二级分类对应的id,即cid
							$('.children-list ').append('<li><a href="/jiaolianyuan/index.php/Home/Detail/detail/id/'+ datac.data[i].id+'">'+datac.data[i].classname+'</a></li>');
						     }
					   }
					   //该课程尚无班级
					   else
					   {
							$('.children-list ').append('<li><a href="javascript:;">'+datac.data+'</a></li>');
					   }
 

					},
					error: function(datac){
						alert("出错啦")
					}
					
					
					
			});
			
//					
			});
				})
					
</script>
		
<script>
				$(function(){
					$("#searchContent").change(function(){
					var	searchContent = $("#searchContent").val();
			
			$.ajax({
					contentType:"application/json",
					type : "get",
					url : "http://localhost/jiaolianyuan/index.php/Home/Index/search",
					data : {"searchContent":searchContent},
					dataType : "json",
					cache : "false",
					async : true,
					success : function(datac){
                       
                     if(datac.ret == 200)
                      {
//						for (var i=0;i<datac.data.length;i++) {
                            //...//
                            alert(datac.data);
					   }
					   //该课程尚无班级
					   else
					   {
					   	//...//
					   }
 

					},
					error: function(datac){
						alert("出错啦")
					}
			    });
			  });
			  
			  
			  
			  
			  
		   })
					
</script>
		
		
		
	</head>
	<body>
		
		                        
		<div class="contianer">
			<header>
				<div class="heading">
					<div class="heading-center">
						<div class="logo">
							<a href="/jiaolianyuan/index.php/Home/Index/index"><img src="/jiaolianyuan/Public/images/web首页素材/logo.png" alt="logo" /></a>	
						</div>
						<div class="login-reg">
							 <?php if(($name != '') OR ($phone != '')): ?><a href="#"><img src="/jiaolianyuan/Public/images/<?php echo ($face); ?>" width="28" height="28"></a><p class="myp" style="width:120px;height: 60px;"><?php echo ($name); ?><span class="logout"><a href="/jiaolianyuan/index.php/Home/Login/logout">退出</a></span></p>
							 <?php else: ?>
							
							 <div class="login">
								    <button><a href="/jiaolianyuan/index.php/Home/Login/login">登录</a></button>
							 </div>
							 <div class="reg">
									<button><a href="/jiaolianyuan/index.php/Home/Register/register">注册</a></button>
							 </div>

							            <!--<span><a href="http://localhost/jiaolianyuan/index.php/Home/Login/login.html">登录</a></span><span>|</span><span><a href="http://localhost/jiaolianyuan/index.php/Home/Register/register.html">注册</a></span>--><?php endif; ?>

							           
						</div>
					</div>
				</div>
			</header>
			
			<!--<p><?php echo ($list['cname']); ?></p>-->
		   
				
				<div class="content">
					<div class="all-classes">
						<img src="/jiaolianyuan/Public/images/web首页素材/全部课程.png" alt="all-classes" width="240" height="70"/>
					</div>					
						<div class="nav_search">
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
					</div>
						<div class="nav-left">
							
							<ul>
								<!--循环遍历课程名-->
								<?php if(is_array($getCourseCate)): $i = 0; $__LIST__ = $getCourseCate;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><li class="first-list"><a href="javascript:;"><span><?php echo ($list['cname']); ?></span></a>
									<hr />
										<ul class="children-list" style="background:url(/jiaolianyuan/Public/images/guide-background/<?php echo ($list['cname']); ?>.jpg) no-repeat;">
											<!--<li><a href="javascript:;"><?php echo ($classList['classname']); ?></a></li>-->
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
								<li class="add_border"><a href="javascript:;">
									<img src="/jiaolianyuan/Public/images/web首页素材/图标广告/教练指导学员.png" />
								</a>
								</li>
								<li class="add_border"><a href="javascript:;">
									<img src="/jiaolianyuan/Public/images/web首页素材/图标广告/云盘一键下载.png" />	
								</a>
								</li>
								<li class="add_border"><a href="javascript:;">
									<img src="/jiaolianyuan/Public/images/web首页素材/图标广告/提升空间大.png"/>	
								</a>
								</li>
								<li id="last_li"><a href="javascript:;">
									<img  src="/jiaolianyuan/Public/images/web首页素材/图标广告/多渠道解决问题.png"/>	
								</a>
								</li>
							</ul>
							<hr />
						</div>
						<div class="hot-recomendation">
							<p>热门班级</p>
							<ul>
								<!--循环遍历热门课程图片-->
								<?php if(is_array($hotClassList)): $i = 0; $__LIST__ = array_slice($hotClassList,0,5,true);if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$hotClassList): $mod = ($i % 2 );++$i;?><li><a href="/jiaolianyuan/index.php/Home/Detail/detail/id/<?php echo ($hotClassList[0]['id']); ?>"><img src="/jiaolianyuan/Public/images/<?php echo ($hotClassList[0]['classpic']); ?>" />
								<div class="tip_info">
									<p class="big_word"><?php echo ($hotClassList[0]['classname']); ?></p>
									<p class="small_word"><?php echo ($hotClassList[0]['classintro']); ?></p>
								</div>
									
								<div class="box_bottom"><span ><?php echo count($hotClassList) ?></span>人在学</div>
								</a></li><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
								
							</ul>
							
						</div>
							
						</div>
								<!--<?php if(is_array($hotClassList2)): $i = 0; $__LIST__ = $hotClassList2;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$hotClassList2): $mod = ($i % 2 );++$i;?><div ><span><?php echo ($hotClassList2['num']); ?></span>人在学</div><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>-->
						
						
						<div class="classes-sort">
							<p>PHP工程师</p>
							<div class="ad-left">
								<img src="/jiaolianyuan/Public/images/web首页素材/php工程师/广告.png"/ width="224" height="436">
							</div>
							<div class="classes-right">
								<ul>
								<!-- 循环遍历8个PHP工程师课程 -->
								<?php if(is_array($phpData)): $i = 0; $__LIST__ = $phpData;if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$phpData): $mod = ($i % 2 );++$i;?><li><a href="/jiaolianyuan/index.php/Home/Detail/detail/id/<?php echo ($phpData['id']); ?>"><img src="/jiaolianyuan/Public/images/<?php echo ($phpData['classpic']); ?>"/>
										<div class="pic_info">
										<p class="title"><?php echo ($phpData['classname']); ?></p>
										<p class="info_detail"><?php echo ($phpData['classintro']); ?></p>
										<p class="num"><span>12564</span>人在学</p>
									</div>
									</a></li><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>  
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
	
	
	<!--<script>
	$(document).ready(function(){
		 $.ajax({
					contentType:"application/json",
					type : "get",
					url : "http://localhost/jiaolianyuan/index.php/Home/Index/getStuNum",
//					data : {"searchContent":searchContent},
					dataType : "json",
					cache : "false",
					async : true,
					success : function(datac){
//                     $('.box_bottom ').detach();
                     for (var i=0;i<datac.data.length;i++) {
//                  alert(datac.data.length);
//  	         document.getElementById(i).innerHTML = datac.data[i].num;  //因为发送时间比较长，所以先显示发送中
                     
                            
                            $('.box_bottom  ').append('<span>'+datac.data[i].num+'</span>人在学');
//                          alert ( datac.a[i].id);
//							$('.hot-recomendation ul').append('<li><a href="/jiaolianyuan/index.php/Home/Detail/detail/id/'+datac.a[i].id+'"><img src="/jiaolianyuan/Public/images/'+datac.a[i].classpic+'" /><div class="tip_info"><p class="big_word">'+datac.a[i].classname+'</p><p class="small_word">'+datac.a[i].classintro+'</p></div><div class="box_bottom"><span>'+datac.b[i].num+'</span>人在学</div></a></li>');
//						    $('.hot-recomendation ul').append('<li><a href="/jiaolianyuan/index.php/Home/Detail/detail/id/'+datac.a[i].id+'"><img src="/jiaolianyuan/Public/images/'+datac.a[i].classpic+'" /><div class="tip_info"><p class="big_word">'+datac.a[i].classname+'</p><p class="small_word">'+datac.a[i].classintro+'</p></div><div class="box_bottom"><span>'+datac.b[i].num+'</span>人在学</div></a></li>').hover;
//                   alert("d");
                     
                     }
					},
					error: function(datac){
						alert("出错啦")
					}
			  });
			  });
	</script>-->
</html>