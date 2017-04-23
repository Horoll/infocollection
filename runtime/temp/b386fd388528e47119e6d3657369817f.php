<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"D:\wamp64\www\project\infocollection/application/index\view\admin\index.html";i:1492952013;s:41:"application/index/view/header/header.html";i:1491696943;}*/ ?>
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
        <a href="<?php echo url('Admin/index'); ?>"><li class="menu-active"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</li></a>
        <a href="<?php echo url('Releasetask/index'); ?>"><li><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</li></a>
        <a href="<?php echo url('Checksubmited/index'); ?>"><li><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</li></a>
        <a href="<?php echo url('Accountmanage/index'); ?>"><li><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</li></a>

    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>查看已发布的任务</h1>
    <hr/>
    <div id="content">
        <table class="table table-bordered">
            <tr>
                <th>任务名称</th>
                <th>任务简介</th>
                <th>查看</th>
                <th>修改</th>
                <th>删除</th>
            </tr>
            <?php if(is_array($tasks) || $tasks instanceof \think\Collection || $tasks instanceof \think\Paginator): $i = 0; $__LIST__ = $tasks;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task): $mod = ($i % 2 );++$i;?>
            <tr id="<?php echo $task['id']; ?>">
                <td><?php echo $task['taskname']; ?></td>
                <td class="short-intro"><?php echo $task['tasktext']; ?></td>
                <td>
                    <a href="<?php echo url('Admin/checkTask').'?id='.$task['id']; ?>"><button class="btn btn-info"><span class="glyphicon glyphicon-search"></span>&nbsp;查看</button></a>
                </td>
                <td>
                    <a href="<?php echo url('Admin/changeTask').'?id='.$task['id']; ?>"><button class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span>&nbsp;修改</button></a>
                </td>
                <td>
                    <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除</button>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
    </div>
    <?php echo $tasks->render(); ?>
</div>

<script src="http://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
<script src="__JS__/sidebar.js"></script>
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
                cancelButtonText:'取消',
                confirmButtonText: "确定",
                confirmButtonColor: "#ec6c62",
                closeOnConfirm: true,
                closeOnCancel: true
            },function (isConfirm) {
                if(isConfirm){
                    var id=that.parentNode.parentNode.id;
                    $.post("<?php echo url('Admin/deleteTask'); ?>",{
                        id:id
                    },function (data,status) {
                        window.location.href="<?php echo url('Admin/index'); ?>";
                    });
                }
            });
        }
    }
</script>
<script src="__JS__/short-intro.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>