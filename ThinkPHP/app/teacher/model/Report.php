<?php
namespace app\teacher\model;

use think\Model;

class Report extends Model
{
    //学生提交状态获取器
    public function getSubmitStatusAttr($value)
    {
        $status = [-1=>'未知',0=>'未提交',1=>'已提交'];
        return $status[$value];
    }

    //学生提交结果获取器
    public function getSubmitResultAttr($value)
    {
        $status = [-1=>'未知',0=>'正常提交',1=>'迟交'];
        return $status[$value];
    }

    //教师批阅状态获取器
    public function getReviewStatusAttr($value)
    {
        $status = [-1=>'未知',0=>'未批阅',1=>'已批阅'];
        return $status[$value];
    }
}
