<?php
namespace app\student\model;

use think\Model;

class Elective extends Model
{
    //与student表关联
    public function student()
    {
    	return $this->hasOne('Student');
    }

    //与teacher表关联
    public function teacher()
    {
    	return $this->hasOne('Teacher');
    }

    //与course表关联
    public function course()
    {
    	return $this->hasOne('course');
    }
}
