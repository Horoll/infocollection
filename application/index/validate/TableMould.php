<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 11:30
 */

namespace app\index\validate;
use think\Validate;

//验证表格模版
class TableMould extends Validate
{
    protected $rule = [
        'data'=>'require'
    ];
}