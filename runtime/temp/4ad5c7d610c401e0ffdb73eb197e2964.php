<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:89:"D:\wamp64\www\project\infocollection/application/index\view\checksubmited\checkform3.html";i:1491717355;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="__JS__/commom.js"></script>
    <script src="__JS__/sweetalert.js"></script>

    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/main.css">
    <link rel="stylesheet" href="__CSS__/menu.css">
    <link rel="stylesheet" href="__CSS__/sweetalert.css">

    <link rel="stylesheet" href="__CSS__/table.css">

    <title>查看提交的表单</title>
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
            <a class="navbar-brand" href="#">管理员</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo url('Checksubmited/index'); ?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>&emsp;返回上页</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div id="display">
    <div id="info" class="well">
        <h1><?php echo $task['taskname']; ?></h1>
        <p>完成时间：<span class="time">
                    <?php echo $task['start_date']; ?>
                </span>到
            <span class="time">
                    <?php echo $task['end_date']; ?>
                </span></p>
        <p>任务简介：<?php echo $task['tasktext']; ?></p>
        <p>提交学院：<span class="school"><?php echo $schoolname; ?></span>
        </p>
        <p>提交的附件：<span><?php echo $data['attachment_name']; ?></span>
        <form action="<?php echo url('Checksubmited/downloadAttachment'); ?>" method="post">
            <input type="hidden" name="attachment_dir" value="<?php echo $data['attachment_dir']; ?>">
            <input type="hidden" name="attachment_name" value="<?php echo $data['attachment_name']; ?>">
            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-save"></span>&nbsp;下载附件</button>
        </form>
        </p>
    </div>
    <div id="table">
        <h1>优秀分团委申报表</h1>
        <table class="table table-bordered">
            <tr>
                <td class="table-width-s">单位</td>
                <td colspan="3"><?php echo $data['unit']; ?></td>
                <td class="table-width-s">书记姓名</td>
                <td colspan="2"><?php echo $data['secretary_name']; ?></td>
            </tr>
            <tr>
                <td class="table-width-s">基本情况</td>
                <td class="table-width-s">团支部数</td>
                <td><?php echo $data['num1']; ?></td>
                <td class="table-width-s">团员总数</td>
                <td><?php echo $data['num2']; ?></td>
                <td class="table-width-s">年度推优入党人数</td>
                <td><?php echo $data['num3']; ?></td>
            </tr>
            <tr>
                <td class="table-height-xl">获奖情况</td>
                <td colspan="6"><?php echo $data['text1']; ?></td>
            </tr>
            <tr>
                <td class="table-height-xl">一年来开展的主要工作、特色及成效</td>
                <td colspan="6"><?php echo $data['text2']; ?></td>
            </tr>
            <tr>
                <td class="table-height-xl">学院党委意见</td>
                <td colspan="6"><?php echo $data['text3']; ?></td>
            </tr>
        </table>
        <button class="btn btn-success"><span class="glyphicon glyphicon-log-out"></span>&nbsp;导出成word</button>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>
