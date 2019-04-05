<?php
namespace app\admin\controller;

use think\Controller;

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
}
