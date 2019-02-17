<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\student\model\Teacher as teacherModel;
use app\student\model\Student as studentModel;
use app\student\model\Elective as electiveModel;

class Course extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //课程列表
    public function courseList()
    {
        //0.测试
        // dump($_POST);
        Log::record('显示课程列表','notice');

    	//1.获取账号
    	$account = session('account');

    	//2.获取该账号教师的实验课程
    	$electiveModel = new electiveModel();

    	$where = "a.studentNo = '$account'";

    	$courseList = $electiveModel    ->alias('a')
                                        ->join('teacher b', 'a.teacherNo = b.teacherNo')
                                        ->join('student c', 'a.studentNo = c.studentNo')
                                        ->join('course d', 'a.courseNo = d.courseNo')
			    				        ->where($where)
			    				        ->paginate(15);

		$courseNumber = $electiveModel  ->alias('a')
                                        ->join('teacher b', 'a.teacherNo = b.teacherNo')
                                        ->join('student c', 'a.studentNo = c.studentNo')
                                        ->join('course d', 'a.courseNo = d.courseNo')
                                        ->where($where)
                                        ->count();

    	//3.页面渲染
		$this->assign('courseList', $courseList);
		$this->assign('courseNumber', $courseNumber);

		return $this->fetch('courseList');
    }

    //模糊查找课程
    public function courseSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找课程','notice');

        //1.获取数据
        $search = input('post.search');
        $account = session('account');

        //2.获取该账号教师的实验课程
        //2.1构造搜索条件
        if(!empty($search)) {
            session('courseearch', $search);
            $where['courseName'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('courseearch');
            $where['courseName'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的课程
        $electiveModel = new electiveModel();

        $studentWhere = "a.studentNo = '$account'";

        $courseList = $electiveModel    ->alias('a')
                                        ->join('teacher b', 'a.teacherNo = b.teacherNo')
                                        ->join('student c', 'a.studentNo = c.studentNo')
                                        ->join('course d', 'a.courseNo = d.courseNo')
                                        ->where($where)
                                        ->where($studentWhere)
                                        ->paginate(15);

        $courseNumber = $electiveModel  ->alias('a')
                                        ->join('teacher b', 'a.teacherNo = b.teacherNo')
                                        ->join('student c', 'a.studentNo = c.studentNo')
                                        ->join('course d', 'a.courseNo = d.courseNo')
                                        ->where($where)
                                        ->where($studentWhere)
                                        ->count();

        //3.页面渲染
        $this->assign('courseList', $courseList);
        $this->assign('courseNumber', $courseNumber);


        return $this->fetch('courseList');
    }

}
