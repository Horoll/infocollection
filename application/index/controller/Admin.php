<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/28
 * Time: 19:30
 */

namespace app\index\controller;
use think\Controller;

class Admin extends Controller
{
    //Admin控制器初始化方法，检测是否管理员登录
    public function _initialize()
    {
        if (!cookie('adminname')) {
            $this->error('请先登录', 'Login/index', '', 2);
        }
    }

    //查看所有已经发布的任务
    public function index()
    {
        //从数据库中找出所有已经发布的任务(倒排序)
        $tasks = DB('task')->where(1)->order('id desc')->paginate(2);
        $this->assign('tasks', $tasks);
        return $this->fetch();
    }

    //显示修改任务页面
    public function changeTask()
    {
        if(!input('?get.id')){
            $this->error('非法访问');
        }
        $id = input('get.id');
        $task_data = db('task')->where('id', $id)->find();
        if($task_data==null){
            $this->error('该任务不存在');
        }
        $this->assign('task_data',$task_data);
        //修改表单页面
        if ($task_data['form_moudle']) {
            return $this->fetch('Admin/changeform');
        }
        //修改表格页面
        else {
            $table_moudle = explode('<&>',$task_data['table_moudle']);
            array_pop($table_moudle);
            $this->assign('table_moudle',$table_moudle);
            return $this->fetch('Admin/changetable');
        }
    }

    //处理修改表单的信息
    public function changeForm(){
        if(!isset($_POST)){
            $this->error('非法访问');
        }
        //接收表单数据
        $data = $_POST;

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

        $id = $data['id'];
        unset($data['id']);
        unset($data['MAX_FILE_SIZE']);

        //修改数据库
        $task = model('Task');
        if($task->where('id',$id)->update($data)){
            $this->success('任务修改成功!','Admin/index','',2);
        }else{
            $this->error('没有任何修改');
        }
    }

    //处理修改表格的信息
    public function changeTable(){
        if(!isset($_POST)){
            $this->error('非法访问');
        }
        //接收前端的任务发布数据
        $json = '';
        foreach ($_POST as $key=>$value){
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
                    $table_moudle_str.=$table_value.'<&>';
                }
                $data[$key] = $table_moudle_str;
                continue;
            }
            $data[$key] = $value;
        }

        //用验证器验证数据格式
        $validate = validate('Task');
        if(!$validate->check($data)){
            return $validate->getError();
        }

        //将这条任务新增到数据库
        $id=$data['id'];
        unset($data['id']);
        $task = model('Task');
        if($task->where('id',$id)->update($data)){
            return '1';
        }else{
            return '发布失败！';
        }
    }

    //删除任务
    public function deleteTask(){
        if (!isset($_POST)){
            $this->error('非法访问');
        }
        $id = input('post.id');
        $task = model('Task');
        if($task->where('id',$id)->delete()){
            return '1';
        }else{
            return '2';
        }
    }
}