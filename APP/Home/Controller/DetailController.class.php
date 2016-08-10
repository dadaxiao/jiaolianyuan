<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class DetailController extends Controller {
    public function detail(){
    	
		$name=$_SESSION['name'];
		$face = $_SESSION['face'];
        $this->assign('name',$name);
		$this->assign('face',$face);
		
		$classBasicInfo = $this -> getBasicInfo();
		$this -> assign('classBasicInfo', $classBasicInfo);
		
		$ProjectInfo = $this -> getProjectInfo();
		$this -> assign('ProjectInfo', $ProjectInfo);
		
		//第一个框
		$studentData = $this -> getComment();
		$this -> assign('studentData', $studentData);
		
		//第二个框
		$studentData2 = $studentData;
		$this -> assign('studentData2', $studentData2);
		
		
        $this -> display();
		
	}
	
	/*
	 * 获取班级的基本信息 : 班级详情图  班级名  平均同期  价格  班级简介
	 */
	 public function getBasicInfo()
	 {
	 	$class = M("class");
		$classId = urldecode($_GET['id']); 
		$classId = (int)($classId);
		$where['id'] = $classId;
		$classBasicInfo = $class -> field('id,className,classPrice,avePeriod,classIntro,detailPic') -> where($where) -> select(); 
		return $classBasicInfo;
		
	 }
	 
	 /*
	  * 获取班级的项目信息
	  */
	  public function getProjectInfo()
	  {
	  	$model = new Model();
//	  	$class = M("class");
		$class_project = M('class_project');
		$project = M('project');
		
		$classId = urldecode($_GET['id']); 
		$classId = (int)($classId);
		$where['classId'] = $classId;
		
		//在class_project中找出该班级所对应项目的ID
		$projectId = $class_project -> field('projectId') -> where($where) ->select();
		//在project中查找出项目名称   ---先找出全部东西先
//		$map['id'] = array ('in',$projectId);
//		$projectData = $project -> where($map) -> select();

       try{
            $projectData = $model -> query("select * from project where id in (select projectId from `class_project` where classId=$classId)");
          }catch(Exception $e){
          	
          }
		 return $projectData;
//		$this -> ajaxReturn($projectData);
		
	  }
	  
	  
	  /*
	  * 获取班级的评论信息，        ---评论内容，评论时间暂无---
	  */
	  public function getComment()
	  {
	  	$model = new Model();
	  	$classId = urldecode($_GET['id']); 
		$classId = (int)($classId);
		$where['classId'] = $classId;
		
		//第一个框的评论 头像 名字 评论内容 时间  ;  第二个框的 头像 名字 
        $studentData = $model -> query("select id,stuName,face from student where id in (select stuId from `stu_class` where classId=$classId) limit 0,17");
	  	return $studentData;
		
	  }
	  

	  
	  
	
}