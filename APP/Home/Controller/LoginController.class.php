<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
       public function login(){
              	
            $this->display();
       }
      
	   public function do_login()
	   {
       	//学员登录
       	if($_POST['position']=="e-commerce")
		{
			if($_POST['submit']="立即登录")
			{
				if($_POST['login-name']!=""&&$_POST['login-pwd']!=""){
                $student = M('student');
				
				$stuName = $_POST['login-name'];	//用户名 
				$password = md5($_POST['login-pwd']);//密码
                $result = $student -> where("stuName='%s' AND password='%s' ",$stuName,$password)->find();
				//加验证码
				/*...*/	 

				if($result>0)
				{
				  $_SESSION['stuName'] = $result['stuName']; 
                  $_SESSION['password'] = $result['password'];
				  
                  $this->success('登录成功', U('Home/Index/index'),3);
				}	  
				else
				{
	                echo "<script>alert('信息有误，请尝试重新登陆！');</script>";
					$this->error('登录失败', U('Home/Login/login'),3);
                } 
				
//				$this ->success();
			}
			
		 }
	   }
		
		//教练登录
       	if($_POST['position']=="privoder")
		{
			if($_POST['submit']="立即登录")
			{
				if($_POST['login-name']!=""&&$_POST['login-pwd']!=""){
                $teacher = M('teacher');
				
				$tname = $_POST['login-name'];	//用户名 
				$password = md5($_POST['login-pwd']);//密码
                $result = $teacher -> where("tname='%s' AND password='%s' ",$tname,$password)->find();
				//加验证码
				/*...*/	 

				if($result>0)
				{
				  $_SESSION['tname'] = $result['tname']; 
                  $_SESSION['password'] = $result['password'];
				  
                  $this->success('登录成功', U('Home/Index/index'),3);
				}	
				else
				{
	                echo "<script>alert('信息有误，请尝试重新登陆！');</script>";
					$this->error('登录失败', U('Home/Login/login'),3);
                } 
				
			}
			
		 }
	   }
     } 	
	   
	   public function md5()
	   {
	   	var_dump(md5("aa123123"));
	   }
	   
////      
//     public function verify(){
//          $config =    array( 
//          'fontSize'    =>    20,    // 验证码字体大小  
//          'length'      =>    4,     // 验证码位数   
//          // 'bg' => array(30,10,33),
//          'expire' => 60,//验证码的有效期（60秒）
//          'useImgBg' => false,
//          //'useImgBg' => true,
//          //'useZh' => true
//          'codeSet' => '0123456789'  //指定验证码的字符
//          );
//          $Verify = new \Think\Verify($config);
//          $Verify->entry();
//          
//          // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
//     }
// 
//  public function check_verify( $id = '')
//  {    
//    $verify = new \Think\Verify();    
//     $b=$verify->check($_POST['code'], $id);
//    if($b==false)
//      $this->error('验证码错误，请重新输入',U('Home/Login/login'),1);
//  }
//
//  public  function logout(){ 
//      session(null);
//      $this->success('欢迎再来',U('Home/Index/index'),1);
//  }
}