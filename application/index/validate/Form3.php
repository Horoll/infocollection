<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 13:34
 */

namespace app\index\validate;
use think\Validate;

class Form3 extends Validate
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
        'attachment_dir'=>'max:200',
        'attachment_name'=>'max:50'
    ];

    protected $message = [
        'unit.require'=>'单位名不能为空',
        'secretary_name.require'=>'书记姓名不能为空',
        'num1.require'=>'团支部数不能为空',
        'num2.require'=>'团员总数不能为空',
        'num3.require'=>'年度推优入党人数不能为空',
        'text1.require'=>'获奖情况不能为空',
        'text2.require'=>'主要成就不能为空',
        'text3.require'=>'学院党委意见不能为空',
        'unit.max'=>'单位名称字数不能超过25',
        'secretary_name.max'=>'书记姓名不能超过20个字',
        'num1.number'=>'团支部数只能为数字',
        'num2.number'=>'团员总数只能为数字',
        'num3.number'=>'年度推优入党人数只能为数字',
        'text2.max'=>'主要成就字数不能超过2000',
        'attachment_name'=>'文件名太长',
        'attachment_dir'=>'文件名太长'
    ];
}