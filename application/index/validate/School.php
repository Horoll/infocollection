<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 10:44
 */
namespace app\index\validate;
use think\Validate;

//验证器，验证学院帐号
class School extends Validate
{
    protected $rule = [
        'schoolname' => 'require|max:25|unique:school',
        'password' => 'require|max:50'
    ];
    protected $message = [
        'schoolname.require' => '帐号不能为空',
        'schoolname.max'     => '帐号最多不能超过25个字符',
        'schoolname.unique'   => '帐户名重复',
        'password.require'  => '密码不能为空',
        'password.max'        => '密码太长啦！',
        ];
}