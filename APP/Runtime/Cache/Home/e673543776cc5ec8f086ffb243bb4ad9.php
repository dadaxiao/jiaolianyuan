<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>教练缘-班级详情</title>
<link href="/jiaolianyuan/Public/CSS/buy-page.css" rel="stylesheet"/>
<link href="/jiaolianyuan/Public/images/buy-page-img/logo.ico" rel="icon"/>
</head>

<body>
<!--导航栏-->
<div id="top">
	<div id="nav">
        <img src="/jiaolianyuan/Public/images/buy-page-img/logo.png" alt="教练缘" title="教练缘"/>
        <ul id="nav_left">
            <li><a href="/jiaolianyuan/index.php/Home/Index/index" target="_parent">首页</a></li>
            <li><a href="#" target="_parent">论坛</a></li>
            <li><a href="#" target="_parent">帮助</a></li>
            <li><a href="#" target="_parent">我的学习</a></li>
        </ul>
        <ul id="nav_right">
        	
        	<!--<div class="login-reg">-->
							 <?php if(($name != '') OR ($phone != '')): ?><a href="#"><img src="/jiaolianyuan/Public/images/<?php echo ($face); ?>" width="28" height="28"></a><br /><p class="myp" style="width:120px;height: 60px;"><?php echo ($name); ?><span class="logout"><a href="/jiaolianyuan/index.php/Home/Login/logout">退出</a></span></p>
							 <?php else: ?>
							   <li><a href="/jiaolianyuan/index.php/Home/Login/login" target="_parent">登录</a><b>|</b></li>
            <li><a href="/jiaolianyuan/index.php/Home/Register/register" target="_parent">注册</a></li>
							 <!--<div class="login">
								    <button><a href="/jiaolianyuan/index.php/Home/Login/login">登录</a></button>
							 </div>
							 <div class="reg">
									<button><a href="/jiaolianyuan/index.php/Home/Register/register">注册</a></button>
							 </div>-->

							            <!--<span><a href="http://localhost/jiaolianyuan/index.php/Home/Login/login.html">登录</a></span><span>|</span><span><a href="http://localhost/jiaolianyuan/index.php/Home/Register/register.html">注册</a></span>--><?php endif; ?>
        	
        	
         
        </ul>
    </div>
</div>

<!--班级的详情-->
<div id="class_detail_warp">
	<div id="class_detail">
    	<img src="/jiaolianyuan/Public/images/<?php echo ($classBasicInfo[0]['detailpic']); ?>" alt="班级图片"/>
        <h1><?php echo ($classBasicInfo[0]['classname']); ?></h1>
        <p>平均周期：<?php echo ($classBasicInfo[0]['aveperiod']); ?>天</p>
        <span><?php echo ($classBasicInfo[0]['classprice']); ?>元</span>
        <h2><a href="#" target="_blank">立即参加</a></h2>
    </div>
</div>

<!--班级介绍-->
<div id="class_intro_warp">
	<div id="class_intro">
    	<h2>班级介绍：</h2>
    	<p><?php echo ($classBasicInfo[0]['classintro']); ?></p>
    </div>
</div>

<!--班级其他信息-->
<div id="class_oth">
	<div id="learn_req">
    	<span class="active">完成项目</span><span>学习成果</span>
        <ul class="item_list">
        	
        	<!--循环遍历项目名称-->
			<?php if(is_array($ProjectInfo)): $i = 0; $__LIST__ = $ProjectInfo;if( count($__LIST__)==0 ) : echo "此班级暂无项目" ;else: foreach($__LIST__ as $key=>$ProjectInfo): $mod = ($i % 2 );++$i;?><li><a style="color: #000000" href="#"><?php echo ($ProjectInfo['name']); ?></a></li><?php endforeach; endif; else: echo "此班级暂无项目" ;endif; ?>
           
        </ul>
    </div>
    <div id="side_bar">
    	<div id="class_eval">
        	<h3>评价</h3>
            <ul id="eval_list">
            	
            	<!--循环遍历评论的数据,目前有姓名，头像-->
			    <?php if(is_array($studentData)): $i = 0; $__LIST__ = array_slice($studentData,0,5,true);if( count($__LIST__)==0 ) : echo "暂无评论" ;else: foreach($__LIST__ as $key=>$studentData): $mod = ($i % 2 );++$i;?><li>
                    <a href="#"><img src="/jiaolianyuan/Public/images/<?php echo ($studentData['face']); ?>" height="28" width="28"alt=""/></a>
                    <span class="user_name"><?php echo ($studentData['stuname']); ?></span><span class="date">8月3日</span>
                    <p class="star">*****</p>
                    <p class="eval_txt">感觉很好，挺实用的，很喜欢  感觉很好，挺实用的，很感觉很好，挺实用的，很感觉很好，挺实用的，很感觉很好，挺实用的，很感觉很好，挺实用的，很</p>
                </li><?php endforeach; endif; else: echo "暂无评论" ;endif; ?>
              
            </ul>
            
            <span>更多评论</span>
        </div>
        <div id="class_num">
        	<h3><?php echo count($studentData2);?>人在选择该班级</h3>
            <ul class="user_list">
            	<!--循环遍历第二个框的姓名，头像-->
			    <?php if(is_array($studentData2)): $i = 0; $__LIST__ = array_slice($studentData2,0,12,true);if( count($__LIST__)==0 ) : echo "暂无数据" ;else: foreach($__LIST__ as $key=>$more): $mod = ($i % 2 );++$i;?><li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/<?php echo ($more['face']); ?>" width="54" height="54" alt=""/></a>
                    <span class="user_name"><?php echo ($more['stuname']); ?></span>
                </li><?php endforeach; endif; else: echo "暂无数据" ;endif; ?>
                <!--<li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/2.jpg" alt=""/></a>
                    <span class="user_name">仰望星空</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/3.jpg" alt=""/></a>
                    <span class="user_name">sytty45</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/4.jpg" alt=""/></a>
                    <span class="user_name">AJ.</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/1.jpg" alt=""/></a>
                    <span class="user_name">ytt13453</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/2.jpg" alt=""/></a>
                    <span class="user_name">仰望星空</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/3.jpg" alt=""/></a>
                    <span class="user_name">sytty45</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/4.jpg" alt=""/></a>
                    <span class="user_name">AJ.</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/1.jpg" alt=""/></a>
                    <span class="user_name">ytt13453</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/2.jpg" alt=""/></a>
                    <span class="user_name">仰望星空</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/3.jpg" alt=""/></a>
                    <span class="user_name">sytty45</span>
                </li>
                <li>
                     <a href="#"><img src="/jiaolianyuan/Public/images/buy-page-img/head-portrait2/4.jpg" alt=""/></a>
                    <span class="user_name">AJ.</span>
                </li>-->
            </ul>
        </div>
    </div>
</div>

<!--页面的底部-->
<div id="bottom_warp">
	<div class="bottom">
        <ul class="help">
        	<li class="head">帮助中心</li>
            <li><a href="#" target="_blank">账户管理</a></li>
            <li><a href="#" target="_blank">课程指南</a></li>
            <li><a href="#" target="_blank">班级选择</a></li>
        </ul>
        <ul class="sercive">
        	<li class="head">服务支持</li>
            <li><a href="#" target="_blank">售后政策</a></li>
            <li><a href="#" target="_blank">自助服务</a></li>
            <li><a href="#" target="_blank">相关下载</a></li>
        </ul>
        <ul class="follow_us">
        	<li class="head">关注我们</li>
            <li><a href="#" target="_blank">新浪微博</a></li>
            <li><a href="#" target="_blank">链接部落</a></li>
            <li><a href="#" target="_blank">官方微信</a></li>
        </ul>
        <ul class="cust_service">
            <li class="phone">400-128-2584</li>
            <li class="online_ser"><a href="#" target="_blank">在线客服</a></li>
        </ul>
    </div>
    <div class="copyRight">
        	<p>Copyright&copy;2016广东石油化工学院云计算实验室版权所有</p>
    </div>
</div>


</body>
</html>