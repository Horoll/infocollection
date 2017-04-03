<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp64\www\project\infocollection/application/index\view\admin\index.html";i:1491208810;}*/ ?>
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
    <title>发布任务</title>
</head>
<body>
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
                <li><a href="#"><span class="glyphicon glyphicon-off"></span>&emsp;退出登录</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="sideBarTop">
                <li><a href="index.html"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
                <li><a href="<?php echo url('Releasetask/index'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</a></li>
                <li><a href="index.html"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</a></li>
                <li><a href="<?php echo url('Accountmanage/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<!--侧边栏-->
<div id="sideBar">
    <ul class="menu">
        <li class="menu-active"><a href="index.html"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
        <li><a href="<?php echo url('Releasetask/index'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布任务</a></li>
        <li><a href="index.html"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</a></li>
        <li><a href="<?php echo url('Accountmanage/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</a></li>

    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>查看已发布的任务</h1>
    <hr/>
    <div id="content">
        <div class="well">
            <h2>任务标题&nbsp;<span class="label label-info">表格一</span></h2>
            <p>
                <span class="time1">2017 09-33</span>
                <span>到</span>
                <span class="time1">2017 11-04</span>
            </p>
            <hr>
            <p class="intro">这是任务的简介零零落落零零落落零零落落公认的给人打工让德国人的个人</p>
            <button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改</button>
            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除</button>
        </div>
        <div class="well">
            <h2>任务标题&nbsp;<span class="label label-success">自定义表格</span></h2>
            <p>
                <span class="time2">2017 09-33</span>
                <span>到</span>
                <span class="time2">2017 11-04</span>
            </p>
            <hr>
            <p class="intro">这是任务的简介零零落落零零落落零零落落如果德国日地广人多公认的给人打工</p>
            <hr>
            <div>
                <h4>自定义项目</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>姓名</th>
                        <th>专业和年级</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>志愿信息</th>
                    </tr>
                </table>
            </div>
            <button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改</button>
            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除</button>
        </div>
    </div>



</div>

<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>