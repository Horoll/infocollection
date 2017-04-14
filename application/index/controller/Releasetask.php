<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/31
 * Time: 9:46
 */

namespace app\index\controller;
use think\Controller;

class Releasetask extends Controller
{
    //检测是否管理员登录
    //检测是否管理员登录
    public function _initialize(){
        if(!cookie('adminname')){
            $this->error('请先登录','Login/index','',2);
        }
    }
    public function index(){
        return $this->fetch();
    }

    public function table(){
        return $this->fetch();

    }

    //接受处理发布的表单任务
    public function releaseFormTable(){
        //接收表单数据
        $data = input('post.');

        //调用文件上传函数
        if($_FILES['uploadfile']['name']){
            $upload_data = uploadAttachement($filedir='admin/');
            if(!is_array($upload_data)){
                $this->error($upload_data);
            }
            $data['attachment_dir'] = $upload_data['attachment_dir'];
            $data['attachment_name'] = $upload_data['attachment_name'];
        }

        //用验证器验证数据格式
        $validate = validate('Task');
        if(!$validate->check($data)){
            $this->error($validate->getError());
        }

        //将这条任务新增到数据库
        $task = model('Task');
        $task->data($data);
        if($task->allowField(true)->save()){
            $this->success('任务发布成功!','Admin/index','',2);
        }else{
            $this->error('任务发布失败');
        }
    }

    //接受处理发布的自定义表格任务
    public function releaseTableTask(){
        //接收前端的任务发布数据
        $json = '';
        foreach (input('post.') as $key=>$value){
            $json .= $key;
        }
        //将json转化成数组
        $data_array = json_decode($json,true);
        $data = [];
        //遍历json数组，给data数组赋值
        foreach ($data_array as $key=>$value){
            //如果是表格模版的话，则把它转换成字符串，用<&>连接
            if($key == 'table_moudle'){
                $table_moudle_array = $value;
                $table_moudle_str = '';
                foreach ($table_moudle_array as $table_value){
                    $table_moudle_str.=htmlspecialchars($table_value).'<&>';
                }
                $data[$key] = $table_moudle_str;
                continue;
            }
            $data[$key] = htmlspecialchars($value);
        }

        //用验证器验证数据格式
        $validate = validate('Task');
        if(!$validate->check($data)){
            return $validate->getError();
        }

        //将这条任务新增到数据库
        $task = model('Task');
        $task->data($data);
        if($task->save()){
            return '1';
        }else{
            return '发布失败！';
        }
    }
}