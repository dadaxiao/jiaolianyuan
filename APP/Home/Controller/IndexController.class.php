<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
    	
		$name = $_SESSION['name'];
		$face = $_SESSION['face'];
        $this->assign('name',$name);
		$this->assign('face',$face);
		
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
		 *获取大的分类栏下的班级，要传参数++
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
	/*   public function hotClass()
	 {
	 	 $class = M("class");
//		 $stu_class = M('stu_class');
		 $hotClassList = $class -> field('id,classPic,className,classIntro') -> limit(0,5) ->select() ;
		 return $hotClassList;
	}*/
	 
	 
	  /*
	  * 获取热门班级的人数
	  */
	  public function hotClass()
	 {

		 $model= new Model();
		 for($i = 1; $i < 6; $i++ )
		 {
		  $data[$i] = $model -> query("select * from (select class.id,className,classIntro,classPic from `class` left join `stu_class` on class.id = classId) as a where id=$i");
		  $data += $data;
		 }
		 return $data;
		 
		 
		 
	}
	 
	 
	 /*
	  * PHP工程师,
	  */
	 	public function phpEngineer() 
		{
			$model =new Model();
		 $course = M('cate');
		 $class = M("class");
		 $cname = 'PHP工程师';
		 $where['cname'] = $cname;
          
         //这两句找出PHP工程师对应的id ,即是父级ID
		 $result = $course -> field('id') -> where($where) -> limit(0,1) -> select();
		 $id = (int)($result[0]['id']);
		 //找出8张PHP工程师的班级的图片
		 
//		  $data[$i] = $model -> query("select * from (select class.id,className,classIntro,classPic from `class` left join `cate` on class.id = classId where classId=$id) as a ");
//		  $data['php'] = $model -> query("select * from ((select class.id,className,classIntro,classPic from `class` where classCate=$id) as a left join `stu_class` on a.id=`stu_class`.classId)");
		 $data = $class -> field('id,classPic,classIntro,className') ->where('classCate='.$id) -> limit(3,8) -> select();
//		 dump($data);
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