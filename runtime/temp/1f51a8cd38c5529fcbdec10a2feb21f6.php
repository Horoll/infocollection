<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:82:"D:\wamp64\www\project\infocollection/application/index\view\releasetask\table.html";i:1492952125;s:41:"application/index/view/header/header.html";i:1491696943;}*/ ?>
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
        <a href="<?php echo url('Releasetask/index'); ?>"><li class="menu-active"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布新任务</li></a>
        <a href="<?php echo url('Checksubmited/index'); ?>"><li><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</li></a>
        <a href="<?php echo url('Accountmanage/index'); ?>"><li><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</li></a>

    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>发布任务</h1>
    <hr/>
    <ul id="mytab" class="nav nav-tabs">
        <li><a href="<?php echo url('Releasetask/index'); ?>">选择已有表单</a></li>
        <li class="active"><a href="<?php echo url('Releasetask/table'); ?>">自定义表格</a></li>
    </ul>
    <div class="content">
        <form action="/index/index/upload" enctype="multipart/form-data" method="post" id="form">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <span>任务名称：</span>
                        <input type="text" placeholder="任务名称" class="form-control" name="taskname">
                        <span>任务简介：</span>
                        <textarea name="tasktext" cols="30" rows="3" class="form-control" placeholder="任务简介（选填）"></textarea>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <span>任务开始时间：</span>
                        <input type="text" class="form-control timePicker" placeholder="任务开始时间" data-date-format="yyyy-mm-dd" name="start_date" readonly>
                        <span>任务结束时间：</span>
                        <input type="text" class="form-control timePicker" placeholder="任务结束时间" data-date-format="yyyy-mm-dd" name="end_date" readonly>
                    </div>
                </div>
            </div>


            <div>

                    <div id="userDefine">
                        <h3>自定义应填项目</h3>
                        <table class="table">
                            <tr>
                                <th>应填项目</th>
                                <th>操作</th>
                            </tr>
                            <tr class="item">
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-danger remove" type="button"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除本行</button>
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-danger remove" type="button"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除本行</button>
                                </td>
                            </tr>
                            <tr class="item">
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-danger remove" type="button"><span class="glyphicon glyphicon-trash"></span>&nbsp;删除本行</button>
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-info" id="add" type="button"><span class="glyphicon glyphicon-plus"></span>&nbsp;增加一列</button>
                    </div>


                    <br>
                    <button class="btn btn-success" type="button" id="publish"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;确认发布</button>


            </div>
        </form>
    </div>


</div>
<script src="__JS__/publish-table.js"></script>
<script>
    /*对publish按钮的绑定*/
    document.getElementById("publish").onclick=function(){

        var form=document.getElementById("form");
        if(checkInput()==true) {
            getData("<?php echo url('Releasetask/releaseTableTask'); ?>","<?php echo url('Admin/index'); ?>");
        }
    }
</script>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/sidebar.js"></script>

<script src="__JS__/bootstrap.js"></script>
</body>
</html>