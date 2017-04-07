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
        'date'=>'date',
        'attachment_dir'=>'max:200',
        'attachment_name'=>'max:50'
    ];
}