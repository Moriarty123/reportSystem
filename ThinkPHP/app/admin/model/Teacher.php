<?php
namespace app\admin\model;

use think\Model;
use app\admin\model\Role as roleModel;

class Teacher extends Model
{
    //关联course表
    public function course() 
    {
    	return $this->hasMany('Course');
    }

    //关联task表
    public function task()
    {
    	return $this->hasMany('Task');
    }

    //关联guide表
    public function guide()
    {
        return $this->hasMany('Guide');
    }

    //关联report表
    public function report()
    {
        return $this->hasMany('Guide');
    }

    //教师角色获取器
    public function getRoleNoAttr($value)
    {
        $roleWhere = "roleNo = {$value}";
        $roleModel = new roleModel();
        $roleList = $roleModel->where($roleWhere)->column('roleName');

        return $roleList[0];
    }

    //性别获取器
    public function getSexAttr($value) 
    {
        $sex = [
            0 => '未知',
            1 => '男',
            2 => '女'
        ];

        if (empty($value)) {
            return $sex[1];
        }
        return $value;
    }

    //头像获取器
    public function getHeadImgAttr($value)
    {
        if (empty($value) || ($value == NULL)) {
            return "/uploads/default/headImg.jpg";
        }
    }
}
