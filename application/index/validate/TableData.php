<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 11:28
 */

namespace app\index\validate;
use think\Validate;

//验证上传的表格数据
class TableData extends Validate
{
    protected $rule = [
        'table_data'=>'require',
        'table_id'=>'require|number',
        'task_id'=>'require|number',
        'school_id'=>'require|number',
    ];
}