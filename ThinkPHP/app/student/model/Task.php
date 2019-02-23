<?php
namespace app\student\model;

use think\Model;

class Task extends Model
{
	//获取器，预处理发布状态 
    public function getStatusAttr($value)
    {
        $status = [-1=>'未知',0=>'未发布',1=>'已发布'];
        return $status[$value];
    }
}
