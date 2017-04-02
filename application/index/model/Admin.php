<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 10:29
 */

namespace app\index\model;
use think\Model;

class Admin extends Model
{
    //在给密码赋值的时候自动完成密码加密功能
    public function setPassWordAttr($value)
    {
        return sha1(md5($value));
    }

}