<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

use app\admin\model\Course as courseModel;

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
}
