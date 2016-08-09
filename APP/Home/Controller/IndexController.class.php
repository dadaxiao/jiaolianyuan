<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
    	
		$name=$_SESSION['name'];
        $this->assign('name',$name);
		$phone=$_SESSION['phone'];
        $this->assign('phone',$phone);
		
    	$getCourseCate = $this -> getCourseCate();
		$this -> assign('getCourseCate', $getCourseCate);
		
		$hotClassList = $this -> hotClass();
		$this -> assign('hotClassList',$hotClassList);

        $phpData = $this -> phpEngineer();
		$this -> assign('phpData',$phpData);
		

        $this -> display();
	}
	
	
	  /** 
		* 
		* 获取课程分类栏
		* 
		* @param  无
		* 
		*
		*/ 
	    public function getCourseCate()
	 {
	 	$cate = M("cate");
		$getCourseCate = $cate -> field('id,cname') -> select();
		return $getCourseCate;
    
	 }
		
		
		/*
		 *获取大的分类栏下的班级，  有点问题，要传参数++
		 */
		public function getClassList()
	 {
	 	// $cname = $_GET['cname'];
	     // $cname = "PHP工程师";
         $where['cname'] = $_GET['cname'];
	 	 $class = M("class");
		 $course = M('cate');
		 //获取分类栏课程的id
		 $courseId = $course -> field('id') -> where($where) -> select(); 
         $courseId = (int)($courseId[0]['id']);

		
		 $classList = $class -> field('id,className') ->where('classCate='.$courseId) ->select();
		 if ($classList  != NULL) {
			$return["ret"] = "200";
			$return["data"] = $classList;
			$return["msg"] = "";
			// S("$cacheIndex",$return,120); //写入缓存，时间120s  
			$this -> ajaxReturn($return);
		} 
		else 
		{
			$return["ret"] = "400";
			//无班级
			$return["data"] = "此课程暂无班级";
			$return["msg"] = "";
			// S("$cacheIndex",$return,120); //写入缓存，时间120s  
			$this -> ajaxReturn($return);
		}
		
	}	
	 
	 
	 /*
	  * 热门教程
	  */
	   public function hotClass()
	 {
	 	 $class = M("class");
		 $hotClassList = $class -> field('id,classPic') -> limit(0,5) ->select() ;
//		 var_dump($hotClassList);
		 return $hotClassList;
		
	}
	 
	 /*
	  * PHP工程师
	  */
	 	public function phpEngineer() 
		{
		 $course = M('cate');
		 $class = M("class");
		 $cname = 'PHP工程师';
		 $where['cname'] = $cname;
          
         //这两句找出PHP工程师对应的id 
		 $result = $course -> field('id') -> where($where) -> limit(0,1) -> select();
		 $id = (int)($result[0]['id']);
		 //找出8张PHP工程师的班级的图片
		 $data = $class -> field('id,classPic') ->where('classCate='.$id) -> limit(3,8) -> select();
		 // var_dump($data);
		 return $data;
		}
		
		
	/*
	 * 搜索
	 */
	 public function search()
	 {
	 	$data['ret'] = "200";
	 	
	 	$data['data'] = "无";
		
		$this -> ajaxReturn($data);
	 }
	
}