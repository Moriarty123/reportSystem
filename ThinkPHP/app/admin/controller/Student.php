<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;

use app\common\controller\Common;

use app\admin\model\Student as studentModel;
use app\admin\model\Institute as instituteModel;
use app\admin\model\Grade as gradeModel;
use app\admin\model\Major as majorModel;
use app\admin\model\Classes as classesModel;

class Student extends Common
{
	// 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //学生列表
    public function studentList()
    {
        //0.测试
        // dump($_POST);

        $studentModel = new studentModel();
        $studentList = $studentModel->paginate(15);
        $studentNumber = $studentModel->count();

        $this->assign('studentList', $studentList);
        $this->assign('studentNumber', $studentNumber);

        return $this->fetch("studentList");
    }

    //模糊查找学生
    public function studentSearch()
    {
        //0.测试
        // dump($_POST); 
        Log::record('模糊查找学生','notice');

        //1.获取数据
        $search = input('post.search');

        //2.获取学生列表
        //2.1构造搜索条件
        if(!empty($search)) {
            session('studentSearch', $search);
            $where['studentName|studentNo|sex|institute|major|grade|classes|roleNo'] = array('like','%'.$search.'%');//封装模糊查询 赋值到数组  
        }
        else 
        {
            $search = session('studentSearch');
            $where['studentName|studentNo|sex|institute|major|grade|classes|roleNo'] = array('like','%'.$search.'%');    
        }

        //2.2获取符合条件的学生
        $studentModel = new studentModel();

        $studentList = $studentModel ->where($where)
                                     ->paginate(15);

        $studentNumber = $studentModel  ->where($where)
                                        ->count();

        //3.页面渲染
        $this->assign('studentList', $studentList);
        $this->assign('studentNumber', $studentNumber);

        return $this->fetch('studentList');
    }

    //删除学生信息
    public function studentDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除学生信息", "notice");

        //1.获取teacherNo
        $studentNo = input("get.studentNo");
        $studentWhere = "studentNo = '{$studentNo}'";
        $studentModel = new studentModel();
        $student = $studentModel->where($studentWhere)->find();

        if (empty($student) || $student == null) {
            Log::record("该学生不存在！", "error");
            $this->error("该学生不存在！", "/admin/student/studentList");
        }

        $studentModel->where($studentWhere)->delete();

        $this->success("删除学生信息成功", "/admin/student/studentList");
    }

    //批量删除
    public function checkedDelete()
    {
        //0.测试
        // dump($_POST);
        Log::record("批量删除学生信息", "notice");

        //1.获取teacherNo数组
        $studentNos = input("studentNo/a");

        // dump($teacherNos);

        //创建模型
        $studentModel = new studentModel();

        foreach ($studentNos as $key => $no) {
           $studentModel->destroy($no);
        }

        $this->success('删除成功！', '/admin/student/studentList');
    }

    //修改学生信息页面
    public function editPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("修改学生信息页面", "notice");

        //1.获取学生信息
        $studentNo = input("get.studentNo");
        $studentWhere = "studentNo = '{$studentNo}'";
        $studentModel = new studentModel();

        $student = $studentModel->where($studentWhere)->find();

        if (empty($student)) {
            Log::record("不存在该学生！", "notice");
            $this->error("不存在该学生！", "/admin/student/studentList");
        }

        //2.获取insititue grade major classes
        $instituteModel = new instituteModel();
        $gradeModel = new gradeModel();
        $majorModel = new majorModel();
        $classesModel = new classesModel();

        $institute = $instituteModel->select();
        $grade = $gradeModel->select();
        $major = $majorModel->select();
        $classes = $classesModel->select();

        //2.渲染
        $this->assign("student", $student);
        $this->assign("institute", $institute);
        $this->assign("grade", $grade);
        $this->assign("major", $major);
        $this->assign("classes", $classes);

        //3.后续操作
        return $this->fetch("studentEdit");
    }

    //修改学生信息
    public function studentEdit()
    {
        //0.测试
        // dump($_POST);
        Log::record("修改学生信息", "notice");

        //1.获取数据
        $studentNo = input("post.studentNo");
        $studentName = input("post.studentName");
        $instituteNo = input("post.institute");
        $major = input("post.major");
        $grade = input("post.grade");
        $classes = input("post.classes");
        $sex = input("post.sex");
        $headImg = input("post.headImg");

        //2.创建数据
        $instituteModel = new instituteModel();
        $instituteWhere = "instituteNo = '{$instituteNo}'";
        $institute = $instituteModel->where($instituteWhere)->find();
        $instituteName = $institute->instituteName;    

        if ($headImg == "") {
            $headImg = "/uploads/default/headImg.jpg";
        }

        //data
        $data = [
            'studentName' => $studentName,
            'institute' => $instituteName,
            'major' => $major,
            'grade' => $grade,
            'classes' => $classes,
            'sex' => $sex,
            'headImg' => $headImg
        ];

        //3.存入数据库
        $studentWhere = "studentNo = '{$studentNo}'";
        $studentModel = new studentModel();
        $student = $studentModel->update($data, $studentWhere);

        if (empty($student) || $student == null) {
            Log::record("修改学生信息失败！", "error");
            $this->error("修改学生信息失败！请稍后再试。", "/admin/student/studentList");
        }

        //4.后续操作
        $this->success("修改学生信息成功！", "/admin/student/studentList");

    }

    //获取指定学院的专业
    public function getMajor()
    {
        //0.测试
        // dump($_GET);
        Log::record("获取指定学院的专业", "notice");

        //1.获取major
        $instituteNo = input("get.instituteNo");
        $instituteWhere = "instituteNo = '{$instituteNo}'";
        $majorModel = new majorModel();
        $major = $majorModel->where($instituteWhere)->select();

        $html = "";
        // foreach ($major as $key => $value) {
        //     // echo json($value);
        //     echo json_encode($value);
        //     // $option = "<option>".$value."</option>";
        //     // $html .= $option;
        // }
        // echo json_encode($html);
        return json($major);
        // $this->ajaxReturn($major);
    }

    //查看学生信息
    public function detailPage() {
        //0.测试
        // dump($_GET);
        Log::record("查看学生信息", "notice");

        //1.获取学生信息
        $studentNo = input("get.studentNo");
        $studentWhere = "studentNo = '{$studentNo}'";
        $studentModel = new studentModel();

        $student = $studentModel->where($studentWhere)->find();

        if (empty($student)) {
            Log::record("不存在该学生！", "notice");
            $this->error("不存在该学生！", "/admin/student/studentList");
        }

        //2.获取insititue grade major classes
        $instituteModel = new instituteModel();
        $gradeModel = new gradeModel();
        $majorModel = new majorModel();
        $classesModel = new classesModel();

        $institute = $instituteModel->select();
        $grade = $gradeModel->select();
        $major = $majorModel->select();
        $classes = $classesModel->select();

        //2.渲染
        $this->assign("student", $student);
        $this->assign("institute", $institute);
        $this->assign("grade", $grade);
        $this->assign("major", $major);
        $this->assign("classes", $classes);

        //3.后续操作
        return $this->fetch("studentDetail");
    }

    //添加学生信息界面
    public function addPage()
    {
        //0.测试
        // dump($_GET);
        Log::record("添加学生信息页面", "notice");

        //1.获取instutite major grade classes
        $instituteModel = new instituteModel();
        $gradeModel = new gradeModel();
        $majorModel = new majorModel();
        $classesModel = new classesModel();

        $institute = $instituteModel->select();
        $grade = $gradeModel->select();
        $major = $majorModel->select();
        $classes = $classesModel->select();

        //2.渲染
        $this->assign("institute", $institute);
        $this->assign("grade", $grade);
        $this->assign("major", $major);
        $this->assign("classes", $classes);

        //3.后续操作
        return $this->fetch("studentAdd");
    }

    //添加学生信息
    public function studentAdd()
    {
        //0.测试
        // dump($_GET);
        Log::record("添加学生信息", "notice");

        //1.获取数据
        $studentNo = input("post.studentNo");

        //1.1判断学生身份存在
        $studentWhere = "studentNo = '{$studentNo}'";
        $studentModel = new studentModel();
        $student = $studentModel->where($studentWhere)->find();


        if (!empty($student || $student != null)) {
            Log::record("该学生已存在！", "notice");
            $this->error("该学生已存在！", "/admin/student/addPage");
        }

        //1.2获取数据
        $studentName = input("post.studentName");
        $instituteNo = input("post.institute");
        $major = input("post.major");
        $grade = input("post.grade");
        $classes = input("post.classes");
        $sex = input("post.sex");
        $headImg = input("post.headImg");

        //2.创建数据
        $instituteModel = new instituteModel();
        $instituteWhere = "instituteNo = '{$instituteNo}'";
        $institute = $instituteModel->where($instituteWhere)->find();
        $instituteName = $institute->instituteName;    

        if ($headImg == "") {
            $headImg = "/uploads/default/headImg.jpg";
        }

        //data
        $data = [
            'studentNo' => $studentNo,
            'studentName' => $studentName,
            'password' => md5("dgut".$studentNo),
            'institute' => $instituteName,
            'major' => $major,
            'grade' => $grade,
            'classes' => $classes,
            'sex' => $sex,
            'headImg' => $headImg,
            'roleNo' => 2
        ];

        //3.存入数据库
        
        $student = $studentModel->create($data);

        if (empty($student) || $student == null) {
            Log::record("添加学生信息失败！", "error");
            $this->error("添加学生信息失败！请稍后再试。", "/admin/student/studentList");
        }

        //4.后续操作
        $this->success("添加学生信息成功！", "/admin/student/studentList");
    }
}
