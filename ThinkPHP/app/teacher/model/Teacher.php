<?php
namespace app\teacher\model;

use think\Model;

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
}
