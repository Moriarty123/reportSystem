<?php
namespace app\admin\model;

use think\Model;
use app\admin\model\Role as roleModel;

class Student extends Model
{

    //学生角色获取器
    public function getRoleNoAttr($value)
    {
        $roleWhere = "roleNo = {$value}";
        $roleModel = new roleModel();
        $roleList = $roleModel->where($roleWhere)->column('roleName');

        return $roleList[0];
    }
}
