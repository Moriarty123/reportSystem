<?php
namespace app\admin\controller;

use think\Controller;
use think\Log;
use app\common\controller\Common;

use app\admin\model\Role as roleModel;
use app\admin\model\Functions as functionsModel;
use app\admin\model\User as userModel;

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
        
        //获取角色列表
        $roleModel = new roleModel();
        $roleList = $roleModel->select();
        $this->assign("roleList", $roleList);

        //获取方法列表
        $functionsModel = new functionsModel();
        $functionsList = $functionsModel->select();
        $this->assign("functionsList", $functionsList);

        return $this->fetch("roleList");
    }

    //添加系统角色
    public function roleAdd()
    {
        //0.测试
        // dump($_POST);
        Log::record("添加系统角色", "notice");

        //1、获取数据
        $roleName = input("post.roleName");
        $roleDescribe = input("post.roleDescribe");
        $permission = input("post.permission");
        $functions = input("post.functions");

        $data = [
            "roleName" => $roleName,
            "roleDescribe" => $roleDescribe,
            "permission" => $permission,
            "functions" => $functions
        ];
        // dump($data);

        //2、添加到数据库
        $roleModel = new roleModel();
        $role = $roleModel->save($data);
        if (empty($role)) {
            Log::record("添加系统角色失败！", "error");
            $this->error("添加系统角色失败！", "/admin/role/roleList");
        }

        //3、后续操作
        $this->success("添加系统角色成功！", "/admin/role/roleList");

    }

    //删除系统角色
    public function roleDelete()
    {
        //0.测试
        // dump($_GET);
        Log::record("删除系统角色", "notice");

        //1、获取roleNo
        $roleNo = input("get.roleNo");

        if ($roleNo == "1" || $roleNo == "2" || $roleNo == "3") {
            Log::record("基本角色不可删除！", "error");
            $this->error("基本角色不可删除！", "/admin/role/roleList");
        }

        //2、从数据库删除
        $roleModel = new roleModel();

        $role = $roleModel->find($roleNo);
        if (empty($role)) {
            Log::record("该角色不存在！", "error");
            $this->error("该角色不存在！", "/admin/role/roleList");
        }

        $roleModel->destroy($roleNo);

        //3、后续操作
        $this->success("删除系统角色成功！", "/admin/role/roleList");
    }

    //设置用户权限
    public function roleSet()
    {
        //0.测试
        // dump($_GET);
        Log::record("设置用户权限", "notice");

        //1.获取数据
        $account = input("get.account");
        $roleNo = input("get.roleNo");

        //2.更新数据库
        $userModel = new userModel();
        $userWhere = "account = {$account}";
        $data = [
            "account" => $account,
            "roleNo" => $roleNo
        ];
        $user = $userModel->update($data, $userWhere);

        if (empty($user)) {
            Log::record("设置用户权限失败！", "error");
            $this->error("设置用户权限失败！", "/admin/teacher/teacherList");
        }

        //3.后续操作
        $this->success("设置用户权限成功！", "/admin/teacher/teacherList");
    }

}
