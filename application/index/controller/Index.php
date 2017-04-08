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
            $tasks = $task->where(1)->order('id desc')->paginate(2);
            $this->assign('schoolname',$schoolname);
            $this->assign('tasks',$tasks);
            return $this->fetch();
        }else{
            return $this->fetch('Login/index');
        }
    }

    //学生下载附件模版
    public function downloadAttachment(){
        $attachement_dir = ROOT_PATH.'public/uploads/'.input('post.attachment_dir');
        $attachement_name = input('post.attachment_name');
        download($attachement_dir,$attachement_name);
    }

    //提交任务页面
    public function submitTask(){
        if(!input('?get.id')){
            $this->error('非法访问');
        }

        //根据任务id来判断任务是否存在
        $id = input('get.id');
        $task_data = db('task')->where('id', $id)->find();
        if($task_data==null){
            $this->error('该任务不存在');
        }

        //判断时间是否在任务有效日期内
        $start_date = $task_data['start_date'];
        $end_date = $task_data['end_date'];
        if(!(strtotime($start_date)<time() && strtotime($end_date)>time())){
            $this->error('当前时间不在任务允许提交时间范围内！');
        }

        //判断是表单任务还是表格任务
        if($task_data['form_moudle']){
            //任务要求
            $this->assign('task_data',$task_data);

            //根据task表中的form_moudle值到相应的form表中查找该学生
            switch($task_data['form_moudle']){

                case '1':
                    $form1_data = db('form1')->where('school_id',cookie('schoolid'))->where('task_id',$id)->find();
                    $this->assign('form1_data',$form1_data);
                    return $this->fetch('Index/submitform1');
                    break;

                case '2':
                    $form2_data = db('form2')->where('school_id',cookie('schoolid'))->where('task_id',$id)->find();
                    $this->assign('form2_data',$form2_data);
                    return $this->fetch('Index/submitform2');
                    break;

                case '3':
                    $form3_data = db('form3')->where('school_id',cookie('schoolid'))->where('task_id',$id)->find();
                    $this->assign('form3_data',$form3_data);
                    return $this->fetch('Index/submitform3');
                    break;
            }
        }
        //表格任务
        else{
            //解析table_moudle格式
            $table_moudle_array = explode('<&>',$task_data['table_moudle']);
            $table_data = db('table_data')->where('school_id',cookie('schoolid'))->where('task_id',$id)->select();
            $this->assign('table_data',$table_data);
            $this->assign('task_data',$task_data);
            $this->assign('table_moudel_array',$table_moudle_array);
            return $this->fetch('Index/submittable');
        }
    }

    //处理提交的表单数据
    public function submitForm(){

        $data = $_POST;

        //调用文件上传函数
        if(isset($_FILES['uploadfile']['name']) && $_FILES['uploadfile']['name']!=null){
            $upload_data = uploadAttachement($filedir='schools/');
            if(!is_array($upload_data)){
                $this->error($upload_data);
            }
            $data['attachment_dir'] = $upload_data['attachment_dir'];
            $data['attachment_name'] = $upload_data['attachment_name'];
        }

        //判断是那种表单
        $form_moudel = input('post.form_moudle');
        switch ($form_moudel){
            case '1':
                $form_moudel = 'Form1';
                break;
            case '2':
                $form_moudel = 'Form2';
                break;
            case '3':
                $form_moudel = 'Form3';
                break;
        }
        unset($data['form_moudle']);

        $this->updateForm($data,$form_moudel);
    }

    //根据表单类型对相应数据表新增或修改数据
    private function updateForm($data,$form_moudle){
        //验证器验证
        $validate = validate($form_moudle);
        if(!$validate->check($data)){
            $this->error($validate->getError());
        }
        //添加学院id
        $data['school_id']=cookie('schoolid');
        //添加对应的任务id
        $data['task_id']=input('post.task_id');
        $form = model($form_moudle);

        //判断是第一次提交表单还是修改表单（有无提交任务id）
        if(input('post.id')!=null){
            //修改已提交的任务
            if($form->where('id',input('post.id'))->update($data)){
                $this->success('修改成功','Index/index');
            }else{
                $this->error('没有修改任何数据');
            }
        }else{
            //第一次提交任务
            $form->allowField(true)->save($data);
            $this->success('提交成功','Index/index');
        }
    }

    //处理提交的表格
    public function submitTable(){
        //接收前端的任务发布数据
        $json = '';
        foreach ($_POST as $key=>$value){
            $json .= $key;
        }
        $table_array = json_decode($json,true);
        $task_id = $table_array['task_id'];
        foreach ($table_array as $key1=>$row) {
            if (!is_numeric($key1)){
                continue;
            }
            //将二维数组中的数据连成字符串
            $table_data = '';
            foreach ($row as $key2 => $value) {
                if ($key2 === 'id'){
                    continue;
                }
                $table_data .= $value . '<&>';
            }
            $data = [
                'id' => isset($row['id'])?$row['id']:null,
                'table_data' => $table_data,
                'task_id' => $task_id,
                'school_id'=>cookie('schoolid')
            ];

            //插入或更新
            if(isset($row['id']) && $row['id']!=null){
                db('table_data')->update($data);
            }else{
                db('table_data')->insert($data);
            }
        }
        return '1';
    }
};