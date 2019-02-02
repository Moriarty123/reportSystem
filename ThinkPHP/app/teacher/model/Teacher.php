<?php
namespace app\teacher\model;

use think\Model;

class Teacher extends Model
{
    //关联course表
    public function courses() 
    {
    	return $this->hasMany('Course');
    }
}
