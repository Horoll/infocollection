<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 13:34
 */

namespace app\index\validate;
use think\Validate;

class Form1 extends Validate
{
    protected $rule = [
        'unit'=>'require|max:25',
        'secretary_name'=>'require|max:20',
        'num1'=>'require|number',
        'num2'=>'require|number',
        'num3'=>'require|number',
        'text1'=>'require',
        'text2'=>'require|max:2000',
        'text3'=>'require',
        'date'=>'date',
        'attachment'=>'max:50'
    ];
}