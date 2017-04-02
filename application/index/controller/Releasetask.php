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
    public function _initialize(){
        if(!cookie('adminname')){
            $this->error('请先登录','Login/index','',2);
        }
    }
    public function index(){
        return $this->fetch();
    }

    public function releaseTask(){
        //接收前端的任务发布数据
        $data_array = json_decode(input('post.data'));
        

        //用验证器验证数据格式
        $validate = validate('Task');
        if(!$validate->check($data)){
            $this->error($validate->getError());
        }

        //将这条任务新增到数据库
        $task = model('Task');
        $task->data($data);
        if($task->save()){
            $this->success('任务发布成功!','Admin/index','',2);
        }else{
            $this->error('任务发布失败');
        }
    }

    public function uploadAttachment(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('uploadfile');
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息
            // 输出 jpg
            echo $info->getExtension();
            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getSaveName();
            // 输出 42a79759f284b767dfcb2a0197904287.jpg
            echo $info->getFilename();
        }else{
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }
}