<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/3/31
 * Time: 13:30
 */

namespace app\index\controller;
use think\Controller;

class Accountmanage extends Controller
{
    //检测是超级管理员管理员
    public function _initialize(){
        if(!cookie('adminname')){
            $this->error('请先登录','Login/index','',2);
        }elseif(!cookie('superadmin')){
            $this->error('你不是超级管理员，没有操作权限');
        }
    }

    //学院帐号管理
    public function index(){
        $schools = DB('school')->where(1)->paginate(7);
        $this->assign('schools',$schools);
        return $this->fetch();
    }

    //管理员帐号管理
    public function admin(){
        $admins = DB('admin')->where(1)->paginate(7);
        $this->assign('admins',$admins);
        return $this->fetch();
    }

    //添加账号
    public function addAccount(){
        //判断身份信息
        $identity = input('post.identity');
        if($identity=='admin'){
            $admin = model('Admin');
            $data['adminname'] = strtolower(input('post.adminname'));
            $data['password'] = input('post.password');
            //验证器验证
            $result = $this->validate($data,'Admin');
            if(true !== $result){
                // 验证失败 输出错误信息
                $this->error($result);
            }
            if($admin->allowField(true)->save($data)){
                $this->success('添加管理员成功！','Accountmanage/admin','',2);
            }else{
                $this->success('添加管理员失败');
            }
        }elseif($identity=='school'){
            $school = model('School');
            $data['schoolname'] = strtolower(input('post.schoolname'));
            $data['password'] = input('post.password');
            //验证器验证
            $result = $this->validate($data,'School');
            if(true !== $result){
                // 验证失败 输出错误信息
                $this->error($result);
            }
            if($school->allowField(true)->save($data)){
                $this->success('添加学院帐号成功！','Accountmanage/index','',2);
            }else{
                $this->success('添加学院帐号失败');
            }
        }else{
            $this->error('身份信息错误！');
        }
    }

    //删除帐号
    public function deleteAccount(){
        //判断身份信息
        $identity = input('post.identity');
        $id = input('post.id');
        if($identity=='admin'){
            $admin = model('Admin');
            if($admin->where('id',$id)->delete()){
                $this->success('删除管理员成功！','Accountmanage/admin','',2);
            }else{
                $this->success('删除管理员失败');
            }
        }elseif($identity=='school'){
            $school = model('School');
            if($school->where('id',$id)->delete()){
                $this->success('删除学院帐号成功！','Accountmanage/index','',2);
            }else{
                $this->success('删除学院帐号失败');
            }
        }else{
            $this->error('身份信息错误！');
        }
    }

    //修改帐号
    public function changeAccount(){
        //判断身份信息
        $identity = input('post.identity');
        $id = input('post.id');
        if($identity=='admin'){
            $admin = model('Admin');
            $data = ['adminname'=>strtolower(input('post.adminname'))];
            //判断是否有密码输入，若有则说明更改了密码
            if(!empty(input('post.password'))){
                $data['password']=input('post.password');
            }

            //验证
            $result = $this->validate(
                $data,
                [
                    'adminname'  => 'require|max:25',
                ],
                [
                    'adminname.require' =>'帐户不能为空',
                    'adminname.max' =>'帐户长度不能超过25',
                ]
            );
            if($result!==true){
                $this->error($result);
            }

            if($admin->save($data,['id'=>$id])){
                $this->success('更新成功！','Accountmanage/admin','',2);
            }else{
                $this->error('没有修改任何信息');
            }
        }elseif($identity=='school'){
            $school = model('School');
            $data = ['schoolname'=>input('post.schoolname')];
            //判断是否有密码输入，若有则说明更改了密码
            if(!empty(input('post.password'))){
                $data['password']=strtolower(input('post.password'));
            }
            //验证
            $result = $this->validate(
                $data,
                [
                    'schoolname'  => 'require|max:25',
                ],
                [
                    'schoolname.require' =>'帐户不能为空',
                    'schoolname.max' =>'帐户长度不能超过25',
                ]
            );
            if($result!==true){
                $this->error($result);
            }
            if($school->save($data,['id'=>$id])){
                $this->success('更新成功！','Accountmanage/index','',2);
            }else{
                $this->error('没有修改任何信息');
            }
        }else{
            $this->error('身份信息错误！');
        }
    }
}