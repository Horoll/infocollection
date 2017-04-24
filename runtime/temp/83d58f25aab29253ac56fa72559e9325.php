<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:90:"D:\wamp64\www\project\infocollection/application/index\view\checksubmited\checkschool.html";i:1493039592;s:41:"application/index/view/header/header.html";i:1491696943;}*/ ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="__JS__/commom.js"></script>
    <script src="__JS__/jquery-3.0.0.min.js"></script>
    <script src="__JS__/sweetalert.js"></script>
    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/main.css">
    <link rel="stylesheet" href="__CSS__/sweetalert.css">
    <link rel="stylesheet" href="__CSS__/check.css">
    <link rel="stylesheet" href="__CSS__/menu.css">
    <title>查看已提交的任务</title>
</head>
<body>
<!--导航条-->
<!--导航条-->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">管理员</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">管理员</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo url('Logout/index'); ?>"><span class="glyphicon glyphicon-off"></span>&emsp;退出登录</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="sideBarTop">
                <li><a href="<?php echo url('Admin/index'); ?>"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
                <li><a href="<?php echo url('Releasetask/index'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</a></li>
                <li><a href="<?php echo url('Checksubmited/index'); ?>"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</a></li>
                <li><a href="<?php echo url('Accountmanage/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--侧边栏-->
<div id="sideBar">
    <ul class="menu">
        <a href="<?php echo url('Admin/index'); ?>"><li><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</li></a>
        <a href="<?php echo url('Releasetask/index'); ?>"><li><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</li></a>
        <a href="<?php echo url('Checksubmited/index'); ?>"><li class="menu-active"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</li></a>
        <a href="<?php echo url('Accountmanage/index'); ?>"><li><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</li></a>
    </ul>
</div>

<!--内容栏-->
<div id="container">
    <br>
    <div>
        <div class="well">
            <h2><?php echo $task['taskname']; ?>&nbsp;
                <?php switch($task['form_moudle']): case "1": ?><span class="label label-info">表单一</span><?php break; case "2": ?><span class="label label-info">表单二</span><?php break; case "3": ?><span class="label label-info">表单三</span><?php break; default: ?><span class="label label-info">自定义表格</span>
                <?php endswitch; ?>
            </h2>
            <p>
                <span class="finish">完成时间：</span>
                <span class="time1"><?php echo $task['start_date']; ?></span>
                到
                <span class="time1"><?php echo $task['end_date']; ?></span>
            </p>
            <p>
                任务简介：
                <span><?php echo $task['tasktext']; ?></span>
            </p>
            <hr>
            <h2><?php echo $schoolname; ?>的提交</h2>
            <hr>
            <table class="table table-bordered">
                <?php if(is_array($school) || $school instanceof \think\Collection || $school instanceof \think\Paginator): $i = 0; $__LIST__ = $school;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$submit): $mod = ($i % 2 );++$i;?>
                <tr>
                    <?php 
                    $i = 0;
                    foreach($submit as $vo){
                    if($i<3){
                    $i++;
                    continue;
                    }elseif($i>7){
                    break;
                    }
                     ?>
                    <td><?php echo $vo; ?></td>
                    <?php  $i++;} ?>
                    <td>
                        <a href="<?php echo url('Checksubmited/checkForm'.$task['form_moudle']).'?schoolid='.$submit['school_id'].'&id='.$submit['id']; ?>" class="btn btn-primary submit" role="button">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;查看/修改
                        </a>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
        </div>
    </div>

</div>
<script src="__JS__/sidebar.js"></script>
<script src="__JS__/table-limit.js"></script>
<script src="http://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>