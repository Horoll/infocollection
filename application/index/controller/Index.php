<?php
namespace app\index\controller;
use think\Controller;
class Index extends Controller
{
    //设置前置操作，在除了index方法外所有方法访问前都会先访问isLogin方法
    protected $beforeAction = ['isLogin'=>['except'=>'index']];

    //检测是否登录
    public function  isLogin(){
        if(!cookie('schoolname')) {
            $this->error('请先登录','Login/index','',2);
        }
    }

    public function index(){
        if(cookie('schoolname')){
            $schoolname = cookie('schoolname');
            $schoolid = cookie('schoolid');
            $task = model('Task');
            $result = $task->where(1)->select();
            return $this->fetch();
        }else{
            return $this->fetch('Login/index');
        }
    }
}
