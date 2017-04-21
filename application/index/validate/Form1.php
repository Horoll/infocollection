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
        'organization_name'=>'require|max:25',
        'build_date'=>'require|max:25',
        'num'=>'require|number|between:0,99999',
        'text1'=>'require|max:500',
        'text2'=>'require',
        'text3'=>'require|max:1500',
        'text4'=>'require',
        'attachment_dir'=>'max:200',
        'attachment_name'=>'max:50'
    ];
    protected $message = [
        'organization_name.require' => '组织名称不能为空',
        'organization_name.max'     => '组织名称不能超过25个字符',
        'build_date.require'   => '成立时间不能为空',
        'build_date.max'     => '成立时间不能超过25个字符',
        'num.require' => '注册志愿者人数不能为空',
        'num.number' => '注册志愿者人数只能为整数',
        'num.between' => '注册志愿者人数太大',
        'text1.require' => '主要服务内容不能为空',
        'tex1.max' => '主要服务内容不能超过500个字符',
        'text2.require' => '获奖情况不能为空',
        'text3.require' => '主要事迹不能为空',
        'tex3.max' => '主要事迹不能超过1500个字符',
        'text4.require' => '学院团委意见不能为空',
        'attachment_dir.max' => '文件名太长',
        'attachment_name.max' => '文件名太长'
    ];
}