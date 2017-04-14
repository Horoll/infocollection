<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/27
 * Time: 22:02
 */

namespace app\index\controller;
use think\Controller;

class Login extends Controller
{
    public function index(){
        return $this->fetch();
    }

    //学院登录
    public function schoolLogin(){
        $schoolname = strtolower(input('post.schoolname'));
        $password = input('post.password');
        $school = model('School');
        $result = $school->where('schoolname',$schoolname)->find();
        if($result){
            if($result['password']==sha1(md5($password))){
                cookie('schoolname',$schoolname);
                cookie('schoolid',$result['id']);
                $this->redirect('Index/index','');
            }else{
                $this->error('密码输入错误！');
            }
        }else{
            $this->error('没有找到该用户！');
        }
    }

    //管理员登录
    public function adminLogin(){
        $adminname = strtolower(input('post.adminname'));
        $password = input('post.password');
        $admin = model('Admin');
        $result = $admin->where('adminname',$adminname)->find();
        if($result){
            if($result['password']==sha1(md5($password))){
                cookie('adminname',$adminname);
                cookie('adminid',$result['id']);
                if(strtolower($adminname)=='root'){
                    cookie('superadmin','root');
                }
                $this->redirect('Admin/index');
            }else{
                $this->error('密码输入错误！');
            }
        }else{
            $this->error('没有找到该管理员！');
        }
    }
}