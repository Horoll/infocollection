<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 13:34
 */

namespace app\index\validate;
use think\Validate;

class Form2 extends Validate
{
    protected $rule = [
        'organization_name'=>'require|max:25',
        'build_date'=>'require|max:25',
        'num'=>'require|number',
        'text1'=>'require|max:500',
        'text2'=>'require',
        'text3'=>'require|max:1500',
        'text4'=>'require',
        'date'=>'date',
        'attachment'=>'max:25'
    ];
}