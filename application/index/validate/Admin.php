<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 11:14
 */
namespace app\index\validate;
use think\Validate;

//验证器，验证管理员帐号
class Admin extends Validate
{
    protected $rule = [
        'adminname' => 'require|max:25|unique:admin',
        'password' => 'require|max:50'
    ];
    protected $message = [
        'adminname.require' => '帐号不能为空',
        'adminname.max'     => '帐号最多不能超过25个字符',
        'adminname.unique'   => '帐户名重复',
        'password.require'  => '密码不能为空',
        'password.max'        => '密码太长啦！',
    ];
}