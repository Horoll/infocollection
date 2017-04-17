<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp64\www\project\infocollection/application/index\view\index\index.html";i:1492411087;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="__JS__/commom.js"></script>
    <script src="__JS__/jquery-3.0.0.min.js"></script>
    <script src="__JS__/bootstrap.js"></script>
    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/main.css">
    <link rel="stylesheet" href="__CSS__/home.css">

    <title>学院用户</title>
</head>
<body>
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
            <a class="navbar-brand" href="#"><?php echo $schoolname; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo url('Logout/index'); ?>"><span class="glyphicon glyphicon-off"></span>&emsp;退出登录</a></li>
            </ul>
        </div>
    </div>
</nav>
<div id="main">
    <header class="jumbotron">
        <div class="container">
            <h1>欢迎使用校团委信息采集平台</h1>
        </div>
    </header>
    <div id="display" class="table-responsive well">

        <table class="table table-bordered table-hover">
            <tr>
                <th>任务名称</th>
                <th>任务简介</th>
                <th>任务时间</th>
                <th>附件</th>
                <th>查看详情</th>
            </tr>
            <?php if(is_array($tasks) || $tasks instanceof \think\Collection || $tasks instanceof \think\Paginator): $i = 0; $__LIST__ = $tasks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
            <tr>
                <td><?php echo $task['taskname']; ?></td>
                <td><?php echo $task['tasktext']; ?></td>
                <td><?php echo $task['start_date']; ?> 至 <?php echo $task['end_date']; ?></td>
                <td><?php echo $task['attachment_name']; ?></td>
                <td>
                    <a href="<?php echo url('Index/detail').'?id='.$task['id'].'&form_moudle='.$task['form_moudle']; ?>"><button class="btn btn-info"><span class="glyphicon glyphicon-search"></span>&nbsp;查看详情</button></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <?php echo $tasks->render(); ?>
    </div>
</div>
<script src="__JS__/ie9-color.js"></script>
<script src="http://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
</body>
</html>
