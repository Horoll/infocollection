<?php
/**
 * Created by PhpStorm.
 * User: Horol
 * Date: 2017/4/1
 * Time: 14:19
 */

namespace app\index\controller;
use think\Controller;

class Logout extends Controller
{
    public function index(){
        cookie('schoolname', null);
        cookie('schoolid', null);
        cookie('adminname', null);
        cookie('adminid', null);
        cookie('superadmin', null);
        $this->redirect('Login/index');
    }
}