<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
       public function login(){
       	
            $this->display();
			
       }
	   
	   /*
	    * 学员,教练登录
	    */
	   public function do_login()
	   {
	   	
       	$this -> check_verify(); //检测验证码是否正确
       	//学员登录
       	if($_POST['position']=="e-commerce")
		{
			if($_POST['submit']="立即登录")
			{
				if($_POST['login-name']!=""&&$_POST['login-pwd']!=""){
                $student = M('student');
				
				$stuName = $_POST['login-name'];	//用户名  或  手机号码
				$password = md5($_POST['login-pwd']);//密码
                $result = $student -> where("stuName='%s' AND password='%s' ",$stuName,$password)->find();
                $loginByName = $student -> where("stuName='%s' AND password='%s' ",$stuName,$password)->find();
                $loginByPhone = $student -> where("phone='%s' AND password='%s' ",$stuName,$password)->find();
				
				//加验证码
				/*...*/	 

				if($loginByName > 0 || $loginByPhone > 0)
				{
				  $_SESSION['phone'] = $loginByPhone['phone']; 
				  $_SESSION['stuName'] = $loginByName['stuname']; 
                  $_SESSION['password'] = $result['password'];
				  
                  $this->success('登录成功', U('Home/Index/index'),3);
				}	  
				else
				{
	                echo "<script>alert('信息有误，请尝试重新登陆！');</script>";
					$this->error('登录失败', U('Home/Login/login'),3);
                } 
				
			}
				
			else
				{
	                echo "<script>alert('请填写完整信息！');</script>";
					$this->error('登录失败', U('Home/Login/login'),3);
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
				
				$phone = $_POST['login-name'];	//用户名 或 手机号码
				$password = md5($_POST['login-pwd']);//密码
                $loginByPhone = $teacher -> where("phone='%s' AND password='%s' ",$phone,$password)->find();
                $loginByName = $teacher -> where("tname='%s' AND password='%s' ",$phone,$password)->find();
				
				if($loginByPhone > 0 || $loginByName >0)
				{
				  $_SESSION['phone'] = $result['phone']; 
				  $_SESSION['tname'] = $result['phone']; 
                  $_SESSION['password'] = $result['password'];
				  
                  $this->success('登录成功', U('Home/Index/index'),3);
				}	
				else
				{
	                echo "<script>alert('信息有误，请尝试重新登陆！');</script>";
					$this->error('登录失败', U('Home/Login/login'),3);
                } 
				
			}
				else
				{
	                echo "<script>alert('请填写完整信息！');</script>";
					$this->error('登录失败', U('Home/Login/login'),3);
                } 
			
		 }
	   }
     } 	
	   
	   

	   /*
	   * 验证码
	   */
       public function verify()
       {
            $config =    array( 
            'fontSize'    =>    14,    // 验证码字体大小  
            'length'      =>    4,     // 验证码位数   
            'expire' => 60,//验证码的有效期（60秒）
            'useImgBg' => false,
            'codeSet' => '0123456789' //指定验证码的字符
//          'codeSet' => '0123456789abcdefghijklmnopqrstuvwxyz'  //指定验证码的字符
            );
            $Verify = new \Think\Verify($config);
            $Verify->entry();
       }
   
   
   /*
    *检测验证码是否正确 
     */
    public function check_verify( $id = '')
    {    
       $verify = new \Think\Verify();    
       $b=$verify->check($_POST['verify'], $id);
      if($b==false)
        $this->error('验证码错误，请重新输入',U('Home/Login/login'),3);
    }

/*
 * 退出登录函数
 */
    /*public  function logout()
    { 
        session(null);
        $this->success('欢迎再来',U('Home/Index/index'),1);
    }*/
}