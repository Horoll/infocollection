<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"D:\wamp64\www\project\infocollection/application/index\view\checksubmited\index.html";i:1491712186;s:41:"application/index/view/header/header.html";i:1491696943;}*/ ?>

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
    <title>查看已提交的任务</title>
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
        <li><a href="<?php echo url('Admin/index'); ?>"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
        <li><a href="<?php echo url('Releasetask/index'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</a></li>
        <li class="menu-active"><a href="<?php echo url('Checksubmited/index'); ?>"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</a></li>
        <li><a href="<?php echo url('Accountmanage/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</a></li>
    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>查看已提交的任务</h1>
    <hr/>
    <div class="container-fluid">
        <div class="row">
            <?php if(is_array($tasks_list) || $tasks_list instanceof \think\Collection || $tasks_list instanceof \think\Paginator): $i = 0; $__LIST__ = $tasks_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$task_list): $mod = ($i % 2 );++$i;?>
            <div class="well col-lg-6 col-sm-12">
                <h2><?php echo $task_list['taskname']; ?>&nbsp;
                    <?php switch($task_list['form_moudle']): case "1": ?><span class="label label-info">表单一</span><?php break; case "2": ?><span class="label label-info">表单二</span><?php break; case "3": ?><span class="label label-info">表单三</span><?php break; default: ?><span class="label label-info">自定义表格</span>
                    <?php endswitch; ?>
                </h2>
                <?php 
                switch($task_list['form_moudle']){
                    case '1';
                        $form_table = 'form1';
                        break;
                    case '2';
                        $form_table = 'form2';
                        break;
                    case '3';
                        $form_table = 'form3';
                        break;
                    default:
                        $form_table = 'table_data';
                        break;
                }
                $form_data = db($form_table)->where('task_id',$task_list['id'])->order('id desc')->select();
                $schoolnames = [];
                 ?>
                <table class="table table-condensed">
                    <tr>
                        <th>提交单位</th>
                        <th>操作</th>
                    </tr>
                    <?php if(is_array($form_data) || $form_data instanceof \think\Collection || $form_data instanceof \think\Paginator): $i = 0; $__LIST__ = $form_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$info): $mod = ($i % 2 );++$i;
                        $schoolname = db('school')->where('id',$info['school_id'])->value('schoolname');
                        if(in_array($schoolname,$schoolnames)){
                            continue;
                        }
                        array_push($schoolnames,$schoolname);
                     ?>
                    <tr>
                        <td><?php echo $schoolname; ?></td>
                        <td>
                            <a href="<?php echo url('Checksubmited/check'.$form_table).'?taskid='.$task_list['id'].'&schoolid='.$info['school_id']; ?>">
                            <button class="btn btn-info btn-sm">
                                <span class="glyphicon glyphicon-search"></span>
                                &nbsp;查看详情
                            </button>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <?php echo $tasks_list->render(); ?>
</div>

<script src="http://cdn.bootcss.com/jquery/3.2.0/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>