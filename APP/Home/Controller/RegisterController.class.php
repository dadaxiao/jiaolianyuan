<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function register(){
    	$this -> display();
        

    }

    public function do_register()
    {
    	// 学生注册
    	if($_POST['position']=="student")
		{
			if($_POST['submit']="立即注册")
			{
				if($_POST['set-pwd'] ==$_POST['confirm-pwd'] )
				{
	
				    //判断这些字段有没有空的，两个验证码先不加
					if($_POST['register-phone']!=""&&$_POST['set-pwd']!=""&&$_POST['confirm-pwd']!="")
					{   
					     $student = M('student');

					     $map['phone']=array('eq',$_POST['register-phone']);
			            //判断该手机号码是否注册过
			            try{
			            	$res = $student -> where($map) -> select();

			            }catch(\Exception $e)
						      {
                                  echo "<script>alert('注册异常，请重试');</script>";
						      }

			            
			           
			            if($res==null)
			            {
					  	
					      
					       $registerData['phone'] = $_POST['register-phone'];
					       $registerData['password'] = md5($_POST['set-pwd']);
					       $registerData['regtime'] = date('y-m-d',time()); 
					        
					       try{
					          	$result = $student -> add( $registerData);
					       }catch(\Exception $e)
						      {
                                  echo "<script>alert('注册异常，请重试');</script>";
						      }
						    if($result > 0){
						    	$this->success('注册成功,三秒后跳转登录页', U('Home/Login/login'),3);
						    }else{
                              $this->error("注册失败");
                             }


					        
					    }
					    else
					    {
					    	echo "<script>alert('该手机号码已被注册');</script>";
					    }

					} //是否为空 
					 else
			          {
			    	     echo "<script>alert('请填写完整注册内容');</script>";
			          }
					  
			    }//两次密码是否一致
			     else
		          {
		    	     echo "<script>alert('两次输入密码不一致，请确认');</script>";
		          }
			  
		    }//点了立即注册		

       }//学生注册



       // 教练注册
    	if($_POST['position']=="coach")
		{
			if($_POST['submit']="立即注册")
			{
				if($_POST['set-pwd'] ==$_POST['confirm-pwd'] )
				{
	
				    //判断这些字段有没有空的，两个验证码先不加
					if($_POST['register-phone']!=""&&$_POST['set-pwd']!=""&&$_POST['confirm-pwd']!="")
					{   
					     $teacher = M('teacher');

					     $map['phone']=array('eq',$_POST['register-phone']);
			            //判断该手机号码是否注册过
			            try{
			            	$res = $teacher -> where($map) -> select();

			            }catch(\Exception $e)
						      {
                                  echo "<script>alert('注册异常，请重试');</script>";
						      }

			            
			           
			            if($res==null)
			            {
					  	
					      
					       $registerData['phone'] = $_POST['register-phone'];
					       $registerData['password'] = md5($_POST['set-pwd']);
					       $registerData['regtime'] = date('y-m-d',time()); 
					       $registerData['auditStatus'] = "待审核";
					        
					       try{
					          	$result = $teacher -> add( $registerData);
					       }catch(\Exception $e)
						      {
                                  echo "<script>alert('注册异常，请重试');</script>";
						      }
						    if($result > 0){
						    	$this->success('注册成功,三秒后跳转登录页', U('Home/Login/login'),3);
						    }else{
                              $this->error("注册失败");
                             }


					        
					    }
					    else
					    {
					    	echo "<script>alert('该手机号码已被注册');</script>";
					    }

					} //是否为空 
					 else
			          {
			    	     echo "<script>alert('请填写完整注册内容');</script>";
			          }
					  
			    }//两次密码是否一致
			     else
		          {
		    	     echo "<script>alert('两次输入密码不一致，请确认');</script>";
		          }
			  
		    }//点了立即注册		

       }//学生注册

   }//函数括号
}

                    