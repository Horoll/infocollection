<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:94:"D:\wamp64\www\project\infocollection/application/index\view\checksubmited\checktable_data.html";i:1491716198;}*/ ?>
<DOCTYPE html/>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="__JS__/commom.js"></script>
    <script src="__JS__/sweetalert.js"></script>
    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/sweetalert.css">
    <link rel="stylesheet" href="__CSS__/main.css">
    <link rel="stylesheet" href="__CSS__/menu.css">
    <link rel="stylesheet" href="__CSS__/user-form.css">

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
    </div>
    <div id="table">
        <table class="table table-bordered">
            <tr>
                <?php if(is_array($table_moudle) || $table_moudle instanceof \think\Collection || $table_moudle instanceof \think\Paginator): $i = 0; $__LIST__ = $table_moudle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cell): $mod = ($i % 2 );++$i;?>
                <th><?php echo $cell; ?></th>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>
            <?php if(is_array($data) || $data instanceof \think\Collection || $data instanceof \think\Paginator): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?>
            <tr class="item">
                <?php if(is_array($row['cell']) || $row['cell'] instanceof \think\Collection || $row['cell'] instanceof \think\Paginator): $i = 0; $__LIST__ = $row['cell'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cell): $mod = ($i % 2 );++$i;?>
                <td><?php echo $cell; ?></td>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
    <br>
    <br>
    <button class="btn btn-success" id="submit"><span class="glyphicon glyphicon-log-out"></span>&nbsp;导出为ecexl</button>


</div>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>