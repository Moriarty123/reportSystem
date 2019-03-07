<?php
namespace app\teacher\model;

use think\Model;
use traits\model\SoftDelete;

class Task extends Model
{
	use SoftDelete;//使用软删除

    protected $autoWriteTimeStamp = true;//自动写入时间戳
    protected $createTime = "createTime";//创建时间字段
    protected $updateTime = "updateTime";//更新时间字段
    protected $deleteTime = "deleteTime";//删除时间字段

	//获取器，预处理发布状态 
    public function getStatusAttr($value)
    {
        $status = [-1=>'未知',0=>'未发布',1=>'已发布'];
        return $status[$value];
    }
}
