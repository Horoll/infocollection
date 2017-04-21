<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\wamp64\www\project\infocollection/application/index\view\Index\submitform2.html";i:1492614551;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="__JS__/commom.js"></script>
    <script src="__JS__/check-form2.js"></script>
    <script src="__JS__/sweetalert.js"></script>
    <link rel="stylesheet" href="__CSS__/bootstrap.css">
    <link rel="stylesheet" href="__CSS__/main.css">
    <link rel="stylesheet" href="__CSS__/menu.css">
    <link rel="stylesheet" href="__CSS__/sweetalert.css">
    <link rel="stylesheet" href="__CSS__/table.css">

    <title>填写表单</title>
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
            <a class="navbar-brand" href="#">学院用户</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" onClick="javascript :history.back(-1);"><span class="glyphicon glyphicon-circle-arrow-left"></span>&emsp;返回</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div id="display">
    <div id="info" class="well">
        <h1><?php echo $task_data['taskname']; ?></h1>
        <p>完成时间：<span class="time">
            <?php echo $task_data['start_date']; ?>
        </span>到
            <span class="time">
            <?php echo $task_data['end_date']; ?>
        </span></p>
        <p>任务简介：<?php echo $task_data['tasktext']; ?></p>
    </div>
    <div id="table">
        <h1>优秀志愿服务项目申报表</h1>
        <form action="<?php echo url('Index/submitForm'); ?>" enctype="multipart/form-data" method="post" id="form">
            <!--对应的哪个任务的id-->
            <input type="hidden" name="task_id" value="<?php echo $task_data['id']; ?>">

            <!--是否有form2中的id（有则表示已经提交过）-->
            <input type="hidden" name="id" value="<?php echo $form2_data['id']; ?>">

            <input type="hidden" name="form_moudle" value="2">
            <table class="table table-bordered">
                <tr>
                    <td class="table-width-s">项目名称</td>
                    <td colspan="3">
                        <textarea class="form-control" rows="1" placeholder="文字" name="project_name"><?php echo $form2_data['project_name']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="table-width-s">项目类型</td>
                    <td colspan="3">
                        <textarea class="form-control" rows="1" placeholder="文字" name="project_type"><?php echo $form2_data['project_type']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="table-width-s">申报单位</td>
                    <td colspan="3">
                        <textarea class="form-control" rows="1" placeholder="文字" name="unit"><?php echo $form2_data['unit']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="table-width-s">联系人</td>
                    <td>
                        <textarea class="form-control" rows="1" placeholder="文字" name="contacts"><?php echo $form2_data['contacts']; ?></textarea>
                    </td>
                    <td class="table-width-s">联系电话</td>
                    <td>
                        <textarea class="form-control" rows="1" placeholder="号码" name="contact_tel"><?php echo $form2_data['contact_tel']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="table-width-s table-height-xxl">项目简介</td>
                    <td colspan="3">
                        <textarea class="form-control" rows="19" name="text1" placeholder="文字(1500字以内，涵盖项目内容、社会反响、获奖或资助情况等)+图片（单张不大于5M）"><?php echo $form2_data['text1']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="table-width-s table-height-l">校（区）、院团委意见</td>
                    <td colspan="3">
                        <textarea class="form-control" rows="6" placeholder="文字" name="text2"><?php echo $form2_data['text2']; ?></textarea>
                    </td>
                </tr>
            </table>
            <h3>上传附件模版 <small>*修改表单时如不上传，则保持原有的附件</small></h3>
            <div class="new-contentarea tc">
                <a href="javascript:void(0)" class="upload">
                    <label for="upload-file">上传文件</label></a>
                <input type="text" id="textName" />
                <input type="file" name="uploadfile" class="btn btn-info" id="chooseFileButton" onchange="document.getElementById('textName').value=this.value.substring(12)"/>

            </div>
            <!--<input type="file" name="uploadfile" class="btn btn-info" id="chooseFileButton"/>-->
            <small style="color: red">*上传附件格式只能为.doc、.docx、.xls、.xlsx、.rar、.zip，且文件大小不能超过50M</small><br>
            <small style="color: red">*如需要上传多个文件，请先打包成压缩格式</small>
            <br>
            <br>
            <button class="btn btn-success"><span class="glyphicon glyphicon-check"></span>提交表单</button>
        </form>
    </div>
</div>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
<script src="__JS__/check-form2.js"></script>
</body>
</html>
