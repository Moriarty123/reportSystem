<?php
namespace app\student\model;

use think\Model;

class Student extends Model
{
    //关联course表(实验课程表)
    public function course() 
    {
    	return $this->hasMany('Course');
    }

    //关联elective表(选修课程学生列表)
    public function elective()
    {
    	return $this->hasMany('Elective');
    }

}
