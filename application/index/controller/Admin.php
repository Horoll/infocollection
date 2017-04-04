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
    public function _initialize(){
        if(!cookie('adminname')){
            $this->error('请先登录','Login/index','',2);
        }
    }

    //查看所有已经发布的任务
    public function index(){
        //从数据库中找出所有已经发布的任务(倒排序)
        $tasks = DB('task')->where(1)->order('id desc')->paginate(2);
        $this->assign('tasks',$tasks);
        return $this->fetch();
    }

    public function changeTask(){
        $id = input('post.id');
    }

}