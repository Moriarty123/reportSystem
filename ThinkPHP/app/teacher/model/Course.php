<?php
namespace app\teacher\model;

use think\Model;
use traits\model\SoftDelete;

class Course extends Model
{
	use SoftDelete;//使用软删除

    protected $autoWriteTimeStamp = true;//自动写入时间戳
    protected $createTime = "createTime";//创建时间字段
    protected $updateTime = "updateTime";//更新时间字段
    protected $deleteTime = "deleteTime";//删除时间字段

}
