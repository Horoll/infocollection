<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\wamp64\www\project\infocollection/application/index\view\accountmanage\index.html";i:1491821346;s:41:"application/index/view/header/header.html";i:1491696943;}*/ ?>
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
        <a href="<?php echo url('Checksubmited/index'); ?>"><li><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</li></a>
        <a href="<?php echo url('Accountmanage/index'); ?>"><li class="menu-active"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</li></a>
    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>账号管理</h1>
    <hr/>
    <div>
        <ul id="myTab" class="nav nav-tabs">
            <li class="active">
                <a href="#user" data-toggle="tab">
                    学院账号
                </a>
            </li>
            <li>
                <a href="<?php echo url('Accountmanage/admin'); ?>">
                    管理员账号
                </a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="user">
                <table class="table table-hover">
                    <tr>
                        <th>账号</th>
                        <th>密码</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($schools) || $schools instanceof \think\Collection || $schools instanceof \think\Paginator): $i = 0; $__LIST__ = $schools;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$school): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <form  id="school<?php echo $school['id']; ?>" method="post">
                            <input type="hidden" name="identity" value="school">
                            <input type="hidden" name="id" value="<?php echo $school['id']; ?>">
                            <td>
                                <input type="text" name="schoolname" placeholder="修改帐号" value="<?php echo $school['schoolname']; ?>" class="form-control">
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="修改密码（不填写则不修改密码）" class="form-control">
                            </td>
                            <td>
                                <buttom class="btn btn-success" onclick="changeaccount('school<?php echo $school['id']; ?>')"><span class="glyphicon glyphicon-pencil"></span>&nbsp;保存修改
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
                            <input type="hidden" name="identity" value="school">
                            <td>
                                <input type="text" class="form-control" name="schoolname" placeholder="添加学院帐号">
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
                <!--学院帐号分页-->
                <?php echo $schools->render(); ?>
            </div>
        </div>
    </div>

</div>
<script src="__JS__/sidebar.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
<script src="__JS__/sweetalert.js"></script>
<script>
    function changeaccount(accountid) {
        document.getElementById(accountid).action="<?php echo url('Accountmanage/changeAccount'); ?>";
        document.getElementById(accountid).submit();
    }
    function deleteaccount(accountid) {
        document.getElementById(accountid).action="<?php echo url('Accountmanage/deleteAccount'); ?>";
        document.getElementById(accountid).submit();
    }
</script>
<script src="__JS__/account.js"></script>
</body>
</html>