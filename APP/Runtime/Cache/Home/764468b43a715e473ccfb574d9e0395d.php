<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人注册</title>
<link href="/jiaolianyuan/Public/images/logo.ico"rel="icon" />
<link href="/jiaolianyuan/Public/CSS/register.css" rel="stylesheet" type="text/css"/>
</head>


<script>

</script>

<body >
<!--logo-->
<div id="top">
	<div id="logo">
    	<a href="http://localhost/jiaolianyuan/index.php/Home/Index/index.html" target="_blank"><img  src="/jiaolianyuan/Public/images/logo.png" alt="教练缘" /></a><b></b>
    </div>
</div>


<div id="warp">
	<div id="bg-pic">
    	<div id="register">
        	<div class="register-form">
                <h2>用户注册</h2>
                <b>已有账号>></b><a target="_blank" href="http://localhost/jiaolianyuan/index.php/Home/Login/login.html" >在线登录</a>
                <form id="" enctype="multipart/form-data" method="post" action="/jiaolianyuan/index.php/Home/Register/do_register">
                     <div class="register-box">
                        <input class="register" id="register-phone" type="text" name="register-phone" placeholder="手机号码" />
                     </div>
                     <div class="codes-box">
                        <input class="codes" id="codes" type="text" name="codes" placeholder="验证码"/>
                     </div>
                     <div class="codes-box">
                        <input class="codes" id="mes-codes" type="text" name="mes-codes" placeholder="短信验证码"/>
                        <button id="codes-btn" type="submit" name="get-codes">获取验证码</button>
                     </div>
                     <div class="register-box">
                        <input class="pwd" id="set-pwd" type="password" name="set-pwd" placeholder="设置密码"/>
                     </div>
                     <div class="register-box">
                        <input class="pwd" id="confirm-pwd" type="password" name="confirm-pwd" placeholder="确认密码" />
                     </div>
                    <span class="checked-1">
                       <input class="checked" type="radio" name="position" checked="checked"   value="student"> 学员
                    </span>
                    <span class="checked-2">
                       <input class="checked" type="radio" name="position" checked="checked"   value="coach"> 教练
                    </span>
                    <button name="register-btn" id="register-btn" type="submit"></button>
                </form>
           </div>
          <div class="clause">
            <span> 
            	<form action="" method="get">
                    <input id="agree-clause" class="agree-clause" type="checkbox" value="clause" checked="checked"/>
                    <label for="">我已同意并接受</label><a id="" class="" target="_blank" href="#">《教练缘服务条款》</a>
                </form>
            </span>
         </div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="foot-ali">
        <a href=""> 关于我们</a>
        <b>|</b>
        <a href=""> 联系我们</a>
        <b>|</b>
        <a href=""> 企业合作</a>
        <b>|</b>
        <a href=""> 友情链接</a>
        <b>|</b>
        <a href=""> 意见反馈</a>
        <b>|</b>
        <a href=""> 人才招聘</a>
    </div>
 </div>
</body>
</html>