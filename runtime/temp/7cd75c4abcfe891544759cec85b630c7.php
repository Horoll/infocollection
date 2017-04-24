<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"D:\wamp64\www\project\infocollection/application/index\view\index\detail.html";i:1493039240;}*/ ?>
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
            <a class="navbar-brand" href="#">学院用户</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo url('Logout/index'); ?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>&emsp;退出</a></li>
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
        <a href="#" onClick="javascript :history.back(-1);"><button class="btn btn-primary col-md-offset-1"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;返回上页</button></a>

    <div id="display">
        <div class="well">
            <h2><?php echo $task['taskname']; ?> <small><?php echo $task['date']; ?></small></h2>
            <div class="container">
                <div>
                    <p>
                        <span class="finish">完成时间：</span><br>
                        <span class="time"><?php echo $task['start_date']; ?></span>
                        到
                        <span class="time"><?php echo $task['end_date']; ?></span>
                    </p>
                </div>
                <div>
                    <h4>任务简介：</h4>
                    <p id="intro"><?php echo $task['tasktext']; ?></p>
                </div>
            </div>
            <?php if(($task['attachment_dir']!=null) AND ($task['attachment_name']!=null)): ?>
                <form action="<?php echo url('index/downloadAttachment'); ?>" method="post">
                    <h4>附件:</h4><span class="download"><?php echo $task['attachment_name']; ?></span>&nbsp;&nbsp;
                    <input type="hidden" name="attachment_dir" value="<?php echo $task['attachment_dir']; ?>">
                    <input type="hidden" name="attachment_name" value="<?php echo $task['attachment_name']; ?>">
                    <button type="submit" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-save"></span>&nbsp;下载附件</button>
                </form>
            <?php endif; ?>
        </div>

        <!--显示表单-->
        <?php if($task['form_moudle']!==null): ?>
        <div class="row">
            <h2 class="col-md-10 col-sm-12 col-md-offset-1">我的提交</h2>
            <div class=" col-md-10 col-sm-12 col-md-offset-1">
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
                            <a href="<?php echo url('Index/submitTask').'?taskid='.$task['id'].'&submitid='.$submit['id']; ?>" class="btn btn-primary submit" role="button"><span class="glyphicon glyphicon-pencil"></span>&nbsp;查看/修改</a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
        </div>
        <a href="<?php echo url('Index/submitTask').'?taskid='.$task['id']; ?>" class="btn btn-success col-md-offset-1 submit" role="button">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;提交新表单
        </a>

        <!--显示表格-->
        <?php else: ?>
        <div class="row">
            <h2 class="col-md-10 col-sm-12 col-md-offset-1">我的提交</h2>
            <div class=" col-md-10 col-sm-12 col-md-offset-1">
                <table class="table table-bordered">
                    <tr>
                        <?php foreach($table_moudle as $cell): ?>
                        <th><?php echo $cell; ?></th>
                        <?php endforeach; ?>
                    </tr>

                    <?php foreach($school as $row): 
                        $table_data = explode('<&>',$row['table_data']);
                        array_pop($table_data);
                     ?>
                    <tr>
                        <?php foreach($table_data as $cell): ?>
                        <td><?php echo $cell; ?></td>
                        <?php endforeach; ?>
                    </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <a href="<?php echo url('Index/submitTask').'?taskid='.$task['id']; ?>" class="btn btn-success col-md-offset-1 submit" role="button">
            <span class="glyphicon glyphicon-plus"></span>&nbsp;修改
        </a>
        <?php endif; ?>

    </div>
</div>
<script src="__JS__/ie9-color.js"></script>
<script src="__JS__/font-limit.js"></script>
<script src="__JS__/intro-limit.js"></script>

<script src="http://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
</body>
</html>
