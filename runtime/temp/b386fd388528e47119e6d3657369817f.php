<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\wamp64\www\project\infocollection/application/index\view\admin\index.html";i:1491274829;}*/ ?>
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
                <li><a href="<?php echo url('Admin/index'); ?>"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
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
        <li class="menu-active"><a href="<?php echo url('Admin/index'); ?>"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
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
        <?php if(is_array($tasks) || $tasks instanceof \think\Collection || $tasks instanceof \think\Paginator): $i = 0; $__LIST__ = $tasks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
        <div class="well" id="<?php echo $task['id']; ?>">
            <h2><?php echo $task['taskname']; switch($name=$task['form_moudle']): case "1": ?> <span class="label label-info">表单一</span><?php break; case "2": ?> <span class="label label-info">表单二</span><?php break; case "3": ?> <span class="label label-info">表单三</span><?php break; default: ?> <span class="label label-info"> 自定义表格</span>
                <?php endswitch; ?>
                <small> 发布于：<?php echo $task['date']; ?></small>
            </h2>

            <!--起止时间-->
            <p>
                <h3><small>起止时间：</small></h3>
                <span class="time1"><?php echo $task['start_date']; ?></span>
                <span>到</span>
                <span class="time1"><?php echo $task['end_date']; ?></span>
            </p>
            <hr>

            <!--任务简介-->
            <h4>任务简介：</h4>
            <p class="intro"><?php echo $task['tasktext']; ?></p>

            <!--自定义表格格式-->
            <?php if($task['form_moudle'] == ''): ?>
            <div class="table-responsive">
                <hr>
                <h4>表格格式：</h4>
                <table class="table table-bordered">
                    <tr>
                        <?php 
                        $table_moudle_array = explode('<&>',$task['table_moudle']);
                        foreach($table_moudle_array as $value){
                        if(!empty($value))
                        echo '<th>'.$value.'</th>';
                        }
                         ?>
                    </tr>
                </table>
            </div>
            <?php endif; ?>

            <!--附件名称-->
            <?php if($task['attachment_name'] != null): ?>
            <hr>
            <h3>附件：<small><?php echo $task['attachment_name']; ?></small></h3>
            <?php endif; ?>

            <hr>

            <button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改</button>
            <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除</button>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <?php echo $tasks->render(); ?>
    </div>
</div>

<script src="http://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
<script src="__JS__/published.js"></script>
<script>
    /*给所有删除按钮绑定功能*/
    var deleteButton=document.getElementsByClassName("btn-danger");
    for(var i=0;i<deleteButton.length;i++){
        deleteButton[i].onclick=function () {
            var that=this;
            swal({
                title: "确定要删除这项任务吗？",
                type: "warning",
                showCancelButton:true,
                cancelButtonText:'返回',
                confirmButtonText: "确定",
                confirmButtonColor: "#ec6c62",
                closeOnConfirm: true,
                closeOnCancel: true
            },function (isConfirm) {
                if(isConfirm){
                    var well=that.parentNode.id;
                    $.post("<?php echo url('Admin/deleteTask'); ?>",{
                        id:well
                    },function (data,status) {
                        window.location.href="<?php echo url('Admin/index'); ?>";
                    });
                }
            });
        }
    }
</script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>