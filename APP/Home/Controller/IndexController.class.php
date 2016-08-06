<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
    	
    	$getCourseCate = $this -> getCourseCate();
		$this -> assign('getCourseCate', $getCourseCate);
		
		$classList = $this -> getClassList();
		$this -> assign('classList',$classList);
		
		$hotClassList = $this -> hotClass();
		$this -> assign('hotClassList',$hotClassList);

        $phpData = $this -> phpEngineer();
		$this -> assign('phpData',$phpData);
		

        $this -> display();
	}
	
	
	  /** 
		* getFirstCate 
		* 
		* 获取课程分类栏
		* 
		* @param  无
		* 
		*
		*/ 
	    public function getCourseCate()
	 {
	 	$cate = M("course");
		$getCourseCate = $cate -> field('cname') -> select();
		return $getCourseCate;
//		var_dump($getCourseCate);
		// $this -> assign('getCourseCate', $getCourseCate);
    
	 }
		
		
		/*
		 *获取大的分类栏下的班级，  有点问题，要传参数++
		 */
		public function getClassList()
	 {
	 	 $class = M("class");
		 $classList = $class -> field('id,className') ->select();
		 return $classList;
		
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

		 $course = M('course');
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
		
		
	
	
}