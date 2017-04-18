<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/4/8
 * Time: 21:52
 */

namespace app\index\controller;
use think\Controller;

class Checksubmited extends Controller
{
    //Admin控制器初始化方法，检测是否管理员登录
    public function _initialize()
    {
        if (!cookie('adminname')) {
            $this->error('请先登录', 'Login/index', '', 2);
        }
    }

    public function index(){
        $task = model('Task');
        $tasks_list = $task->where(1)->order('id desc')->paginate(1);
        $this->assign('tasks_list',$tasks_list);
        return $this->fetch();
    }

    public function checkSchool(){
        $task_id = input('taskid');
        $school_id = input('schoolid');
        $school_name = db('school')->where('id',$school_id)->value('schoolname');
        $task_data = db('task')->where('id',$task_id)->find();
        if(!$task_data){
            $this->error('该任务不存在');
        }
        switch ($task_data['form_moudle']){
            case '1':
                $table = 'form1';
                break;
            case '2':
                $table = 'form2';
                break;
            case '3':
                $table = 'form3';
                break;
            default:
                $this->error('非法访问');
                break;
        }
        $school_data = db($table)->where('school_id',$school_id)->where('task_id',$task_id)->select();
        $this->assign('schoolname',$school_name);
        $this->assign('task',$task_data);
        $this->assign('school',$school_data);
        return $this->fetch();
    }

    public function checkForm1(){
        $this->checkForm('form1');
        return $this->fetch();
    }

    public function checkForm2(){
        $this->checkForm('form2');
        return $this->fetch();
    }

    public function checkForm3(){
        $this->checkForm('form3');
        return $this->fetch();
    }

    private function checkForm($formtable){
        $id = input('get.id');
        $schoolid = input('get.schoolid');
        $schoolname = db('school')->where('id',$schoolid)->value('schoolname');
        $data = db($formtable)->where('id',$id)->find();
        $this->assign('schoolname',$schoolname);
        $this->assign('data',$data);
    }

    public function checkTable_data(){
        $taskid = input('get.taskid');
        $schoolid = input('get.schoolid');
        $task = db('task')->where('id',$taskid)->find();
        $schoolname = db('school')->where('id',$schoolid)->value('schoolname');
        $data = db('table_data')->where('task_id',$taskid)->where('school_id',$schoolid)->select();
        foreach ($data as $key=>$row){
            $data[$key]['cell']=explode('<&>',$row['table_data']);
            array_pop($data[$key]['cell']);
        }
        $table_moudle = explode('<&>',$task['table_moudle']);
        array_pop($table_moudle);

        $this->assign('task',$task);
        $this->assign('schoolname',$schoolname);
        $this->assign('schoolid',$schoolid);
        $this->assign('data',$data);
        $this->assign('table_moudle',$table_moudle);
        return $this->fetch();
    }

    //下载学生上传的附件
    public function downloadAttachment(){
        $attachement_dir = ROOT_PATH.'public/uploads/'.input('post.attachment_dir');
        $attachement_name = input('post.attachment_name');
        download($attachement_dir,$attachement_name);
    }
}