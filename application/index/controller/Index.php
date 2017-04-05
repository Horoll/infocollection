<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    //设置前置操作，在除了index方法外所有方法访问前都会先访问isLogin方法
    protected $beforeAction = ['isLogin'=>['except'=>'index']];

    //检测是否登录
    public function  isLogin(){
        if(!cookie('schoolname') || !cookie('schoolid')) {
            $this->error('请先登录','Login/index','',2);
        }
    }

    public function index(){
        if(cookie('schoolname') && cookie('schoolid')){
            $schoolname = cookie('schoolname');
            $task = model('Task');
            $tasks = $task->where(1)->paginate(2);
            $this->assign('schoolname',$schoolname);
            $this->assign('tasks',$tasks);
            return $this->fetch();
        }else{
            return $this->fetch('Login/index');
        }
    }

    //学生下载附件模版
    public function downloadAttachment(){
        $attachement_dir = input('post.attachment_dir');
        $attachement_name = input('post.attachment_name');
        download($attachement_dir,$attachement_name);
    }

    //提交任务页面
    public function submitTask(){
        if(!input('?get.id')){
            $this->error('非法访问');
        }
        //根据任务id来判断是表单任务还是表格任务
        $id = input('get.id');
        $task_data = db('task')->where('id', $id)->find();
        if($task_data==null){
            $this->error('该任务不存在');
        }

        //提交、修改表单页面
        if($task_data['form_moudle']){
            //根据task表中的form_moudle值到相应的form表中查找该学生
            switch($task_data['form_moudle']){

                case '1':
                    $form1_data = db('form1')->where('id',cookie('schoolid'))->find();
                    $this->assign('form1_data',$form1_data);
                    return $this->fetch('Index/submitForm1');
                    break;

                case '2':
                    $form2_data = db('form2')->where('id',cookie('schoolid'))->find();
                    $this->assign('form2_data',$form2_data);
                    return $this->fetch('Index/submitForm2');
                    break;

                case '3':
                    $form3_data = db('form3')->where('id',cookie('schoolid'))->find();
                    $this->assign('form1_data',$form3_data);
                    return $this->fetch('Index/submitForm3');
                    break;
            }
        }
        //提交、修改表格页面
        else{
            $table_data = db('table_data')->where('id',cookie('schoolid'))->find();
            $this->assign('table_data',$task_data);
            return $this->fetch('Index/submitTable');
        }
    }

    //处理提交的表单
    public function submitForm(){

    }

    //处理提交的表格
    public function submitTable(){

    }

};