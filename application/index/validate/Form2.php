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
        'project_name'=>'require|max:25',
        'project_type'=>'require|max:25',
        'unit'=>'require|max:25',
        'contacts'=>'require|max:25',
        'contact_tel'=>'require|max:25',
        'text1'=>'require|max:1500',
        'text2'=>'require',
        'attachment_dir'=>'max:200',
        'attachment_name'=>'max:50'
    ];
    protected $message = [
        'project_name.require' => '项目名称不能为空',
        'project_name.max' => '项目名称不能超过25个字符',
        'project_type.require' => '项目类型不能为空',
        'project_type.max' => '项目类型不能超过25个字符',
        'unit.require'   => '申报单位不能为空',
        'unit.max'     => '申报单位不能超过25个字符',
        'contacts.require'   => '联系人不能为空',
        'contacts.max'     => '联系人不能超过25个字符',
        'contact_tel.require'   => '联系电话不能为空',
        'contact_tel.max'     => '联系电话不能超过25个字符',
        'text1.require' => '项目简介不能为空',
        'tex1.max' => '项目简介不能超过1500个字符',
        'text2.require' => '获奖情况不能为空',
        'attachment_dir.max' => '文件名太长',
        'attachment_name.max' => '文件名太长'
    ];
}