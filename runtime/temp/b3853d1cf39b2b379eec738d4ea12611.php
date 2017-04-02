<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:90:"D:\wamp64\www\project\infomationcollection/application/index\view\accountmanage\admin.html";i:1491128743;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="__JS__/commom.js"></script>
    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/main.css">
    <link rel="stylesheet" href="__CSS__/account.css">
    <link rel="stylesheet" href="__CSS__/menu.css">
    <link rel="stylesheet" href="__CSS__/sweetalert.css">
    <title>账号管理</title>
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
                <li><a href="<?php echo url('Logout/index'); ?>"><span class="glyphicon glyphicon-off"></span>&emsp;退出登录</a></li>
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
        <li><a href="#"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
        <li><a href="<?php echo url('Releasetask/index'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</a></li>
        <li><a href="index.html"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</a></li>
        <li class="menu-active"><a href="<?php echo url('Accountmanage/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</a></li>
    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>账号管理</h1>
    <hr/>
    <div>
        <ul id="myTab" class="nav nav-tabs">
            <li>
                <a href="<?php echo url('Accountmanage/index'); ?>">
                    学院账号
                </a>
            </li>
            <li class="active">
                <a href="#admin" data-toggle="tab">
                    管理员账号
                </a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane in active fade" id="admin">
                <table class="table table-hover">
                    <tr>
                        <th>账号</th>
                        <th>密码</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($admins) || $admins instanceof \think\Collection || $admins instanceof \think\Paginator): $i = 0; $__LIST__ = $admins;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <form id="admin<?php echo $admin['id']; ?>" method="post">
                            <input type="hidden" name="identity" value="admin">
                            <input type="hidden" name="id" value="<?php echo $admin['id']; ?>">
                            <td>
                                <input type="text" name="adminname" value="<?php echo $admin['adminname']; ?>" placeholder="修改帐号" class="form-control">
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="修改密码（不填写则不修改密码）" class="form-control">
                            </td>
                            <td>
                                <buttom class="btn btn-success" onclick="changeaccount('admin<?php echo $admin['id']; ?>')"><span class="glyphicon glyphicon-pencil"></span>&nbsp;保存修改
                                </buttom>
                                <buttom class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除
                                </buttom>
                            </td>
                        </form>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                    <!--添加账号-->
                    <tr>
                        <form action="<?php echo url('Accountmanage/addAccount'); ?>" method="post">
                            <input type="hidden" name="identity" value="admin">
                            <td>
                                <input type="text" class="form-control" name="adminname" placeholder="添加管理员帐号">
                            </td>
                            <td>
                                <input type="password" class="form-control" name="password" placeholder="密码">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-plus"></span>&nbsp;添加账号
                                </button>
                            </td>
                        </form>
                    </tr>
                </table>
                <!--管理员帐号分页-->
                <?php echo $admins->render(); ?>
            </div>
        </div>
    </div>

</div>
<script src="__JS__/published.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
<script src="__JS__/sweetalert.js"></script>
<script>
    function changeaccount(accountid) {
        document.getElementById(accountid).action="<?php echo url('Accountmanage/changeAccount'); ?>";
        document.getElementById(accountid).submit();
    }
</script>
<script src="__JS__/account.js"></script>
</body>
</html>