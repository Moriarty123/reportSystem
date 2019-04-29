<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;
use app\common\controller\Common;

use app\admin\model\Role as roleModel;

class Role extends Common
{
    // 首页
    public function index()
    {
        return $this->fetch('index');
    }

    //权限列表
    public function roleList()
    {
        //0.测试
        // dump($_POST);
        Log::record("权限列表", "notice");

        $roleModel = new roleModel();

        $roleList = $roleModel->select();
        
        $this->assign('roleList', $roleList);

        return $this->fetch("roleList");
    }

    // //用户权限设置
    // public function roleUser()
    // {
    //     //0.测试
    //     // dump($_POSt);
    //     Log::record("用户权限设置", "notice");

    //     //1、获取功能列表
    //     $roleName = input("post.roleName");
    //     $functionNos = input("post.function");

    //     //2、保存系统角色
    //     $data = [
    //         'roleName' = $roleName
    //     ];

    //     $roleModel = new roleModel();
    //     $role = $roleModel->save($data);

    //     //3、保存系统角色所有功能
    //     $functionModel = new functionModel();
    //     $roleNo = $role->roleNo;
    //     foreach ($functionNos as $key => $no) {
    //         //获取函数
    //         $function = $functionModel->get($no);
    //         $data = [
    //             'roleNo' => $roleNo,
    //             'function' => $function->functionPath;
    //         ];
    //        $functionModel->save($no);
    //     }

    // }
}
