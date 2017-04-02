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
}