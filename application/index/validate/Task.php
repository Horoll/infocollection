<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 11:17
 */

namespace app\index\validate;
use think\Validate;

//验证任务列表
class Task extends Validate
{
    protected $rule = [
        'taskname' => 'require|max:25',
        'start_date' => 'require|date',
        'end_date' => 'require|date',
        'form_moudle' => 'number'
    ];

    protected $message = [
        'taskname.require'=>'任务名不能为空',
        'taskname.max'=>'任务名长度不能超过25个字',
        'start_date.require'=>'开始时间不能为空',
        'end_date.require'=>'截止时间不能为空',
        'form_moudle.number'=>'表单模版编号必须是数字',
        'start_date.date'=>'开始时间格式错误',
        'end_date.date'=>'结束时间格式错误',
    ];
}