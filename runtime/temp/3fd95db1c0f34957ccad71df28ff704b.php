<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\wamp64\www\project\infocollection/application/index\view\Admin\changetable.html";i:1491696944;s:41:"application/index/view/header/header.html";i:1491696943;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="__JS__/commom.js"></script>
    <script src="__JS__/jquery-3.0.0.min.js"></script>
    <script src="__JS__/bootstrap-datetimepicker.min.js"></script>
    <script src="__JS__/locales/bootstrap-datetimepicker.zh-CN.js"></script>
    <script src="__JS__/sweetalert.js"></script>
    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/main.css">
    <link rel="stylesheet" href="__CSS__/skins/square/blue.css">
    <link rel="stylesheet" href="__CSS__/publish.css">
    <link rel="stylesheet" href="__CSS__/bootstrap-datetimepicker.css">
    <link rel="stylesheet" href="__CSS__/sweetalert.css">
    <link rel="stylesheet" href="__CSS__/menu.css">
    <title>修改自定义任务</title>
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
        <li class="menu-active"><a href="<?php echo url('Admin/index'); ?>"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
        <li><a href="<?php echo url('Releasetask/index'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</a></li>
        <li><a href="<?php echo url('Checksubmited/index'); ?>"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</a></li>
        <li><a href="<?php echo url('Accountmanage/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</a></li>

    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>修改任务</h1>
    <hr/>

    <div class="content">
        <form action="/index/index/upload" enctype="multipart/form-data" method="post" id="form">
            <input type="hidden" name="id" value="<?php echo $task_data['id']; ?>">
            <input type="text" value="<?php echo $task_data['taskname']; ?>" placeholder="修改任务名称" class="form-control" name="taskname">
            <input type="text" class="form-control timePicker" value="<?php echo $task_data['start_date']; ?>" placeholder="修改任务开始时间" data-date-format="yyyy-mm-dd" name="start_date" readonly>
            <input type="text" class="form-control timePicker" value="<?php echo $task_data['end_date']; ?>" placeholder="修改任务结束时间" data-date-format="yyyy-mm-dd" name="end_date" readonly>
            <textarea name="tasktext" cols="30" rows="3" class="form-control" placeholder="修改任务简介（选填）"><?php echo $task_data['tasktext']; ?></textarea>
            <div>
                <div id="userDefine">
                    <h3>修改项目名称</h3>
                    <table class="table table-bordered">
                        <tr>
                            <?php if(is_array($table_moudle) || $table_moudle instanceof \think\Collection || $table_moudle instanceof \think\Paginator): $i = 0; $__LIST__ = $table_moudle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?>
                            <th>
                                <input type="text" value="<?php echo $value; ?>" class="form-control item">
                            </th>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                    </table>   
                </div>
                <br>
                <button class="btn btn-success" type="button" id="publish"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;确认修改</button>
            </div>
        </form>
    </div>
</div>
<script src="__JS__/change-table.js"></script>
<script>
    /*对publish按钮的绑定*/
    document.getElementById("publish").onclick=function(){
        if(checkInput()==true){
            getData("<?php echo url('Admin/changeTable'); ?>","<?php echo url('Admin/index'); ?>");
        }
    };
</script>
<script src="http://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>