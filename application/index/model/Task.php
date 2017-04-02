<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 10:29
 */

namespace app\index\model;
use think\Model;

class Task extends Model
{
    protected $insert = ['date'];
    //在新增任务时自动添加任务发布日期
    public function setDateAttr()
    {
        date_default_timezone_set("Asia/Chongqing");
        return date('Y-m-d');
    }
}