<?php
namespace app\student\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;
use app\student\model\Teacher as teacherModel;
use app\student\model\Guide as guideModel;
use app\student\model\Course as courseModel;
use app\student\model\Task as taskModel;

class Guide extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //查看实验指导
    public function taskGuide()
    {
        //0.测试
        // dump($_GET);
        Log::record('显示实验指导列表','notice');

        //1.获取账号
        $account = session('account');
        $taskNo = input('get.taskNo');

        //2.获取该账号教师的实验实验指导
        $teacherModel = new teacherModel();

        $where = "a.teacherNo = '$account' and taskNo = '$taskNo'";

        $guideList = $teacherModel  ->guide()
                                    ->where($where)
                                    ->alias('a')
                                    ->join('course b', 'a.courseNo = b.courseNo')
                                    // ->join('task c', 'a.taskNo = c.taskNo')
                                    ->paginate(15);

        $guideNumber = $teacherModel    ->guide()
                                        ->where($where)
                                        ->alias('a')
                                        ->join('course b', 'a.courseNo = b.courseNo')
                                        // ->join('task c', 'a.taskNo = c.taskNo')
                                        ->count();

        //3.页面渲染
        $this->assign('guideList', $guideList);
        $this->assign('guideNumber', $guideNumber);

        return $this->fetch('guideList');
    }

    // //显示实验指导
    // public function guideShow() 
    // {
    //     //0.测试
    //     // dump($_GET);

    //     //1.获取该ID的实验指导
    //     $guideNo = input('get.guideNo');

    //     //1.1创建guideModel,获取实验指导
    //     $guideModel = new guideModel();
    //     $where = "guideNo = '$guideNo'";
    //     $guide = $guideModel->where($where)->find();
    //     // dump($where);
    //     // dump($guide);
    //     //获取实验指导数据
    //     $guideName = $guide['guideName'];
    //     $testAim = $guide['testAim'];
    //     $testEnvironment = $guide['testEnvironment'];
    //     $testRequire = $guide['testRequire'];
    //     $testTask = $guide['testTask'];
    //     $testContent = $guide['testContent'];
    //     $courseNo = $guide['courseNo'];

    //     //1.2创建courseModel,获取课程名称
    //     $where = "courseNo = '$courseNo'";
    //     $courseModel = new courseModel();
    //     $course = $courseModel->where($where)->find();
    //     $courseName = $course['courseName'];

    //     //生成pdf
    //     $html = 
    //         '<p style="font-size:24px;"><strong>实验指导名称</strong></p>'
    //         .$guideName.
    //         '<p style="font-size:24px;"><strong>实验课程</strong></p>'.$courseName.
    //         '<p style="font-size:24px;"><strong>实验目的</strong></p>'.$testAim.
    //         '<p style="font-size:24px;"><strong>实验环境</strong></p>'.$testEnvironment.
    //         '<p style="font-size:24px;"><strong>实验要求</strong></p>'.$testRequire.
    //         '<p style="font-size:24px;"><strong>实验任务</strong></p>'.$testTask.
    //         '<p style="font-size:24px;"><strong>实验内容</strong></p>'.$testContent;

    //     // dump($html);
    //     guidePdf($html);
    //     //2.跳转到实验指导列表
    //     // $this->redirect('teacher/guide/guideList');

    // }

    //显示实验指导
    public function guideShow() 
    {
        //0.测试
        //dump($_GET);
        Log::record("显示实验指导", "notice");

        //1.获取该ID的实验指导
        $guideNo = input('get.guideNo');

        //1.1创建guideModel,获取实验指导
        $guideModel = new guideModel();
        $where = "guideNo = $guideNo";
        $guide = $guideModel->where($where)->find();

        //2.获取实验指导文本
        //2.1获取文本路径
        $txtPath = $guide['txtPath'];


        //2.2读取文件
        if(file_exists($txtPath)){

            $fp= fopen($txtPath,"r");
            $html = fread($fp,filesize($txtPath));//指定读取大小，这里把整个文件内容读取出来
            fclose($fp);
        }
        else {
            $html = "";
        }

        //3.PDF显示
        guidePdf($html);

        //2.跳转到实验指导列表
        // $this->redirect('teacher/guide/guideList');

    }
}
