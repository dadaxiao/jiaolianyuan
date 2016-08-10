<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function register(){
    	
    	$this -> display();
		
    }
	

    public function do_register()
    {
      $this -> check_verify();  //检测验证码是否正确
    	// 学生注册
    	if($_POST['position']=="student")
		{
			if($_POST['submit']="立即注册")
			{
				if($_POST['set-pwd'] ==$_POST['confirm-pwd'] )
				{
					if($_POST['mes-codes'] != "" && $_POST['mes-codes'] == session('phoneCode') ) //手机验证码比较
					{
	                   session('phoneCode',null); //验证码正确,清除
				    //判断这些字段有没有空的
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
                                  $this->error("注册失败", U('Home/Register/register'),3);
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
                                  $this->error("注册失败", U('Home/Register/register'),3);
						      }
						    if($result > 0){
						    	$this->success('注册成功,三秒后跳转登录页', U('Home/Login/login'),3);
						    }else{
                              $this->error("注册失败", U('Home/Register/register'),3);
                             }


					        
					    }
					    else
					    {
					    	echo "<script>alert('该手机号码已被注册');</script>";
					    	$this->error("注册失败", U('Home/Register/register'),3);
					    }

					} //是否为空 
					 else
			          {
			    	     echo "<script>alert('请填写完整注册内容');</script>";
			    	     $this->error("注册失败", U('Home/Register/register'),3);
			          }
					  
			       } //手机验证码
			       else
			          {
			    	     echo "<script>alert('手机验证码错误');</script>";
			    	     $this->error("注册失败", U('Home/Register/register'),3);
			          }
			        
			    }//两次密码是否一致
			     else
		          {
		    	     echo "<script>alert('两次输入密码不一致，请确认');</script>";
		    	     $this->error("注册失败", U('Home/Register/register'),3);
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
						
					if($_POST['mes-codes'] != "" && $_POST['mes-codes'] == session('phoneCode') ) //手机验证码比较
					{
	                   session('phoneCode',null); //验证码正确,清除
	
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
                                  $this->error("注册失败", U('Home/Register/register'),3);
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
                                  $this->error("注册失败", U('Home/Register/register'),3);
						      }
						    if($result > 0){
						    	$this->success('注册成功,三秒后跳转登录页', U('Home/Login/login'),3);
						    }else{
                              $this->error("注册失败", U('Home/Register/register'),3);
                             }
					    }
					    else
					    {
					    	echo "<script>alert('该手机号码已被注册');</script>";
					    	$this->error("注册失败", U('Home/Register/register'),3);
					    }

					} //是否为空 
					 else
			          {
			    	     echo "<script>alert('请填写完整注册内容');</script>";
			    	     $this->error("注册失败", U('Home/Register/register'),3);
			          }
					  
                     } //手机验证码
			       else
			          {
			    	     echo "<script>alert('手机验证码错误');</script>";
			    	     $this->error("注册失败", U('Home/Register/register'),3);
			          }
					  
			    }//两次密码是否一致
			     else
		          {
		    	     echo "<script>alert('两次输入密码不一致，请确认');</script>";
		    	     $this->error("注册失败", U('Home/Register/register'),3);
		          }
			  
		    }//点了立即注册		

       }//学生注册

   }//函数括号
   
       /*
	   * thinkphp验证码
	   */
       public function verify()
       {
            $config =    array( 
            'fontSize'    =>    12,    // 验证码字体大小  
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
    *检测thinkphp验证码是否正确 
    */
    public function check_verify( $id = '')
    {    
       $verify = new \Think\Verify();    
       $b=$verify->check($_POST['verify'], $id);
      if($b==false)
        $this->error('验证码错误，请重新输入',U('Home/Register/register'),3);
    }
      

    /*
	 * 发送短信验证码
	 */ 
	 public function sendPhoneMessage(){
         
        $options['accountsid']='8c4bc35c271a16de86bb74bcab05a198'; 
        $options['token']='df8ce7355a042b29556e248cb7614511'; 
		
        $ucpass = new \Org\Util\Ucpaas($options);
                
        //随机生成6位验证码
        srand((double)microtime()*1000000);//create a random number feed.
//      $ychar="0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z";
        $ychar="0,1,2,3,4,5,6,7,8,9";
        $list=explode(",",$ychar);
        for($i=0;$i<6;$i++)
        {
	        $randnum=rand(0,9); // 10+26;
	        $authnum.=$list[$randnum];
        }

        //短信验证码
        $appId = "0203050235fe4b369b4a72c18fc1f3f3";  
        $to = $_GET['phoneNo'];
        $templateId = "27574";
        $param = $authnum;    
       
    $arr = $ucpass -> templateSMS($appId,$to,$templateId,$param);
    if (substr($arr,21,6) == 000000) 
    {
       //发送短信验证码成功
			 echo "验证码已发送给:".$_GET['phoneNo'];
			 session('phoneCode',$param);
	}
    else{
              //发送短信验证码失败
			 echo "短信验证码发送失败，请重试";
        }
        
    }



}

                    