<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\wamp64\www\project\infomationcollection/application/index\view\releasetask\index.html";i:1491056385;}*/ ?>
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
                <li><a href="#"><span class="glyphicon glyphicon-off"></span>&emsp;退出登录</a></li>
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
        <li><a href="index.html"><span class="glyphicon glyphicon-th-list"></span>&emsp;已发布的任务</a></li>
        <li class="menu-active"><a href="<?php echo url('Releasetask/index'); ?>"><span class="glyphicon glyphicon-list-alt"></span>&emsp;发布任务</a></li>
        <li><a href="index.html"><span class="glyphicon glyphicon-check"></span>&emsp;查看已提交的任务</a></li>
        <li><a href="<?php echo url('Accountmanage/index'); ?>"><span class="glyphicon glyphicon-cog"></span>&emsp;账户管理</a></li>

    </ul>
</div>

<!--内容栏-->
<div id="container">
    <h1>发布任务</h1>
    <hr/>
    <div class="content">
        <form action="" id="detail">
        <input type="text" placeholder="任务名称" class="form-control" name="name">
        <input type="text" class="form-control timePicker" placeholder="任务开始时间" data-date-format="yyyy-mm-dd" name="startTime">
        <input type="text" class="form-control timePicker" placeholder="任务结束时间" data-date-format="yyyy-mm-dd" name="endTime">
        <textarea name="intro" cols="30" rows="3" class="form-control" placeholder="任务简介"></textarea>
        </form>
        <form action="" id="form">
        <div>
            <span>表单类型：</span>
            <select name="form_model" id="formType" class="form-control">
                <option value="1" selected="selected">表单一</option>
                <option value="2">表单二</option>
                <option value="3">表单三</option>
                <option value="4">自定义表单</option>
            </select>
            <div id="formSelect">
                <div>
                    <img src="__IMG__/form1.png" alt="表单一" class="img-responsive">

                </div>
                <div>
                    <img src="__IMG__/form2.png" alt="表单二" class="img-responsive">
                </div>
                <div>
                    <img src="__IMG__/form3.png" alt="表单三" class="img-responsive">
                </div>

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
                <form action="/index/index/upload" enctype="multipart/form-data" method="post">
                    <input type="file" name="uploadfile" class="btn btn-info" value="上传附件"/>
                    <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-open"></span>&nbsp;确认上传</button>
                </form>
                <br>
                <button class="btn btn-success" type="button" id="publish"><span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;确认发布</button>

            </div>
        </div>
        </form>
    </div>


</div>
<script src="__JS__/publish.js"></script>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
</body>
</html>