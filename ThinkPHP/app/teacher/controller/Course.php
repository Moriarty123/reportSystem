<?php
namespace app\teacher\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\teacher\model\Teacher as teacherModel;
use app\teacher\model\Student as studentModel;
use app\teacher\model\Elective as electiveModel;
use app\teacher\model\Course as courseModel;

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
    	$teacherModel = new teacherModel();

    	$where = "teacherNo = '$account'";

    	$courseList = $teacherModel	->course()
			    				    ->where($where)
			    				    ->paginate(15);

		$courseNumber = $teacherModel    ->course()
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
        $teacherModel = new teacherModel();

        $teacherNoWhere = "teacherNo = '$account'";

        $courseList = $teacherModel ->course()
                                    ->where($teacherNoWhere)
                                    ->where($where)
                                    ->paginate(15);

        $courseNumber = $teacherModel   ->course()
                                        ->where($teacherNoWhere)
                                        ->where($where)
                                        ->count();

        //3.页面渲染
        $this->assign('courseList', $courseList);
        $this->assign('courseNumber', $courseNumber);


        return $this->fetch('courseList');
    }

    //查看学生
    public function studentList()
    {
        //0.测试
        // dump($_GET);
        Log::record('查看该课程学生');

        //1.获取数据
        //分页保存courseNo
        $courseNo = session('courseNo');
        if (empty($courseNo)) {
            $courseNo = input('get.courseNo');
            session('courseNo', $courseNo);
        }

        $account = session('account');

        //2.获取课程学生列表
        $electiveModel = new electiveModel();

        $where = "a.courseNo = '$courseNo'";
        $studentList = $electiveModel   ->where($where)
                                        ->alias('a')
                                        ->join('teacher b', 'a.teacherNo = b.teacherNo')
                                        ->join('student c', 'a.studentNo = c.studentNo')
                                        ->join('course d', 'a.courseNo = d.courseNo')
                                        ->paginate(15);

        $studentNumber = $electiveModel ->where($where)
                                        ->alias('a')
                                        ->join('teacher b', 'a.teacherNo = b.teacherNo')
                                        ->join('student c', 'a.studentNo = c.studentNo')
                                        ->join('course d', 'a.courseNo = d.courseNo')
                                        ->count();
        //3.页面渲染
        $this->assign('courseNo', $courseNo);
        $this->assign('studentList', $studentList);
        $this->assign('studentNumber',$studentNumber);

        return $this->fetch('studentList');
    }

    //实验课程删除(软删除)
    public function courseDelete()
    {
        //0.测试
        // dump($_POST);
        Log::record("实验课程删除");

        $courseNo = input("post.courseNo/a");

        //创建模型
        $courseModel = new courseModel();

        foreach ($courseNo as $key => $no) {
           $courseModel->destroy($no);
        }

        $this->success('删除成功！', '/teacher/course/courseList');
    }

}
