<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

use app\admin\model\Course as courseModel;
use app\admin\model\Teacher as teacherModel;
use app\admin\model\Grade as gradeModel;
use app\admin\model\Major as majorModel;
use app\admin\model\Classes as classModel;

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

        $courseModel = new courseModel();

        $courseList = $courseModel->paginate(15);
        $courseNumber = $courseModel->count();

        $this->assign("courseList", $courseList);
        $this->assign("courseNumber", $courseNumber);

        return $this->fetch("courseList");
    }

    //删除实验课程
    public function courseDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除实验课程", "notice");

        //1.获取courseNo
        $courseNo = input("get.courseNo");
        $courseWhere = "courseNo = '{$courseNo}'";
        $courseModel = new courseModel();
        $course = $courseModel->where($courseWhere)->find();

        if (empty($course) || $course == null) {
            Log::record("实验课程不存在！", "error");
            $this->error("实验课程不存在！", "/admin/course/courseList");
        }

        $courseModel->where($courseWhere)->delete();

        $this->success("删除课程信息成功", "/admin/course/courseList");
    }

    //批量删除
    public function checkedDelete()
    {
        //0.测试
        // dump($_POST);
        Log::record("批量删除课程信息", "notice");

        //1.获取courseNo数组
        $courseNos = input("courseNo/a");

        //创建模型
        $courseModel = new courseModel();

        foreach ($courseNos as $key => $no) {
           $courseModel->destroy($no);
        }

        $this->success('删除成功！', '/admin/course/courseList');
    }

    //模糊查找实验课程
    public function courseSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找实验课程','notice');

        //1.获取数据
        $search = input('post.search');
        $account = session('account');

        //2.获取实验课程
        //2.1构造搜索条件
        if(!empty($search)) {
            session('courseSearch', $search);
            $where['courseName|courseNo|teacherName|courseGrade|courseMajor|courseType|courseNature|coursePeriod|openTime|examType'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('teacherSearch');
            $where['courseName|courseNo|teacherName|courseGrade|courseMajor|courseType|courseNature|coursePeriod|openTime|examType'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的课程
        $courseModel = new courseModel();

        $courseList = $courseModel  ->where($where)
                                    ->paginate(15);

        $courseNumber = $courseModel   ->where($where)
                                        ->count();

        //3.页面渲染
        $this->assign('courseList', $courseList);
        $this->assign('courseNumber', $courseNumber);


        return $this->fetch('courseList');
    }

    //修改实验课程页面
    public function editPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("修改实验课程页面", "notice");

        //1.获取学生信息
        $courseNo = input("get.courseNo");
        $courseWhere = "courseNo = '{$courseNo}'";
        $courseModel = new courseModel();

        $course = $courseModel->where($courseWhere)->find();

        if (empty($course)) {
            Log::record("不存在该课程！", "error");
            $this->error("不存在该课程！", "/admin/course/courseList");
        }

        //2.获取teacherList
        $teacherModel = new teacherModel();
        $gradeModel = new gradeModel();
        $majorModel = new majorModel();
        $classModel = new classModel();

        $teacherList = $teacherModel->select();
        $gradeList = $gradeModel->select();
        $majorList = $majorModel->select();
        $classList = $classModel->select();

        //3.渲染页面
        $this->assign("course", $course);
        $this->assign("teacherList", $teacherList);
        $this->assign("gradeList", $gradeList);
        $this->assign("majorList", $majorList);
        $this->assign("classList", $classList);

        return $this->fetch("courseEdit");
    }

    //修改课程信息
    public function courseEdit()
    {
        //0.测试
        // dump($_POST);
        Log::record("修改实验课程", "notice");

        //1.获取数据
        $courseNo = input("post.courseNo");
        $courseNum = input("post.courseNum");
        $courseName = input("post.courseName");
        $teacherNo = input("post.teacherNo");
        $teacherName = input("post.teacherName");
        $grade = input("post.grade");
        $major = input("post.major");
        $courseType = input("post.courseType");
        $courseNature = input("post.courseNature");
        $coursePeriod = input("post.coursePeriod");
        $testPeriod = input("post.testPeriod");
        $openTime = input("post.openTime");
        $credit = input("post.credit");
        $examType = input("post.examType");
        $classesArr = input("post.classes/a");


        if ($classesArr != null) {
            // dump($classesArr);
            $classes = "";

            foreach ($classesArr as $key => $value) {
                $classes .= $value;
                $classes .= ",";
            }

            $classes = substr($classes,0,strlen($classes)-1); 
        }
        

        //2.构建数据
        $data = [
            'courseNo' => $courseNo,
            'courseNum' => $courseNum,
            'courseName' => $courseName,
            'teacherNo' => $teacherNo,
            'teacherName' => $teacherName,
            'courseGrade' => $grade,
            'courseMajor' => $major,
            'courseType' => $courseType,
            'courseNature' => $courseNature,
            'coursePeriod' => $coursePeriod,
            'testPeriod' => $testPeriod,
            'openTime' => $openTime,
            'credit' => $credit,
            'examType' => $examType,
            'courseClass' => $classes,
            'updateTime' => time()
        ];


        // dump($data);

        //3.更新数据库
        $courseModel = new courseModel();
        $courseWhere = "courseWhere = '{$courseNo}'";

        $course = $courseModel->update($data, $courseWhere);

        if (empty($course) || $course == null) {
            Log::record("修改实验课程失败！", "error");
            $this->error("修改实验课程失败！请稍后再试。", "/admin/course/courseList");
        }

        //4.后续操作
        $this->success("修改实验课程成功！", "/admin/course/courseList");


    }

    //实验课程详细信息页面
    public function detailPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("实验课程详细信息页面", "notice");

        //1.获取学生信息
        $courseNo = input("get.courseNo");
        $courseWhere = "courseNo = '{$courseNo}'";
        $courseModel = new courseModel();

        $course = $courseModel->where($courseWhere)->find();

        if (empty($course)) {
            Log::record("不存在该课程！", "error");
            $this->error("不存在该课程！", "/admin/course/courseList");
        }

        //2.获取teacherList
        $teacherModel = new teacherModel();
        $gradeModel = new gradeModel();
        $majorModel = new majorModel();
        $classModel = new classModel();

        $teacherList = $teacherModel->select();
        $gradeList = $gradeModel->select();
        $majorList = $majorModel->select();
        $classList = $classModel->select();

        //3.渲染页面
        $this->assign("course", $course);
        $this->assign("teacherList", $teacherList);
        $this->assign("gradeList", $gradeList);
        $this->assign("majorList", $majorList);
        $this->assign("classList", $classList);

        return $this->fetch("courseDetail");
    }

    //添加课程信息页面
    public function addPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("添加课程信息页面", "notice");

        //2.获取teacherList
        $teacherModel = new teacherModel();
        $gradeModel = new gradeModel();
        $majorModel = new majorModel();
        $classModel = new classModel();

        $teacherList = $teacherModel->select();
        $gradeList = $gradeModel->select();
        $majorList = $majorModel->select();
        $classList = $classModel->select();

        //3.渲染页面
        $this->assign("teacherList", $teacherList);
        $this->assign("gradeList", $gradeList);
        $this->assign("majorList", $majorList);
        $this->assign("classList", $classList);

        return $this->fetch("courseAdd");
    }

    //添加课程信息
    public function courseAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record("添加课程信息", "notice");

        //1.获取数据
        $courseNum = input("post.courseNum");

        $courseWhere = "courseNum = '{$courseNum}'";
        $courseModel = new courseModel();

        $course = $courseModel->where($courseWhere)->find();

        if (!empty($course) || $course != null) {
            Log::record("已存在该课程！", "error");
            $this->error("已存在该课程！", "/admin/course/courseList");
        }

        $courseName = input("post.courseName");
        $teacherNo = input("post.teacherNo");
        $teacherName = input("post.teacherName");
        $grade = input("post.grade");
        $major = input("post.major");
        $courseType = input("post.courseType");
        $courseNature = input("post.courseNature");
        $coursePeriod = input("post.coursePeriod");
        $testPeriod = input("post.testPeriod");
        $openTime = input("post.openTime");
        $credit = input("post.credit");
        $examType = input("post.examType");
        $classesArr = input("post.classes/a");


        if ($classesArr != null) {
            // dump($classesArr);
            $classes = "";

            foreach ($classesArr as $key => $value) {
                $classes .= $value;
                $classes .= ",";
            }

            $classes = substr($classes,0,strlen($classes)-1); 
        }
        

        //2.构建数据
        $data = [
            'courseNum' => $courseNum,
            'courseName' => $courseName,
            'teacherNo' => $teacherNo,
            'teacherName' => $teacherName,
            'courseGrade' => $grade,
            'courseMajor' => $major,
            'courseType' => $courseType,
            'courseNature' => $courseNature,
            'coursePeriod' => $coursePeriod,
            'testPeriod' => $testPeriod,
            'openTime' => $openTime,
            'credit' => $credit,
            'examType' => $examType,
            'courseClass' => $classes,
            'updateTime' => time(),
            'createTime' => time()
        ];


        dump($data);

        //3.更新数据库
        $courseModel = new courseModel();
        

        $course = $courseModel->create($data);

        if (empty($course) || $course == null) {
            Log::record("添加实验课程信息失败！", "error");
            $this->error("添加实验课程信息失败！请稍后再试。", "/admin/course/addPage");
        }

        //4.后续操作
        $this->success("添加实验课程成功！", "/admin/course/addPage");
    }


}
