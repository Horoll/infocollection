<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\wamp64\www\project\infocollection/application/index\view\Index\submitform1.html";i:1491566016;}*/ ?>
<!DOCTYPE html>
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
        <link rel="stylesheet" href="__CSS__/table.css">

		<title>提交任务</title>
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
                <li><a href="<?php echo url('Index/index'); ?>"><span class="glyphicon glyphicon-circle-arrow-left"></span>&emsp;返回</a></li>
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
                <h1>优秀青年志愿者队伍申报表</h1>
                <form action="<?php echo url('Index/submitForm'); ?>" enctype="multipart/form-data" method="post" id="form">
                    <!--对应的哪个任务的id-->
                    <input type="hidden" name="task_id" value="<?php echo $task_data['id']; ?>">

                    <!--是否有表单1中的id（有则表示已经提交过）-->
                    <input type="hidden" name="id" value="<?php echo $form1_data['id']; ?>">

                    <input type="hidden" name="form_moudle" value="1">
                    <table class="table table-bordered">
                        <tr>
                            <td class="table-width-s table-height-s">组织名称</td>
                            <td class="table-width-l">
                                <textarea class="form-control" rows="1" placeholder="文字" name="organization_name"><?php echo $form1_data['organization_name']; ?></textarea>
                            </td>
                            <td rowspan="2" class="table-width-s">注册志愿者人数</td>
                            <td rowspan="2" class="table-width-s">
                                <textarea class="form-control" rows="4" placeholder="数字" name="num"><?php echo $form1_data['num']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-width-s table-height-s">成立时间</td>
                            <td>
                                <textarea class="form-control" rows="1" placeholder="文字" name="build_date"><?php echo $form1_data['build_date']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-height-l">主要服务内容</td>
                            <td colspan="3">
                                <textarea class="form-control" rows="6" placeholder="文字表述（500字以内）" name="text1"><?php echo $form1_data['text1']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-height-l">获奖情况</td>
                            <td colspan="3">
                                <textarea class="form-control" rows="6" placeholder="文字表述" name="text2"><?php echo $form1_data['text2']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-height-l">主要事迹</td>
                            <td colspan="3">
                                <textarea class="form-control" rows="6" placeholder="文字表述（1500字以内）" name="text3"><?php echo $form1_data['text3']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td class="table-height-l">学院团委意见</td>
                            <td colspan="3">
                                <textarea class="form-control" rows="6" placeholder="" name="text4"><?php echo $form1_data['text4']; ?></textarea>

                            </td>
                        </tr>
                    </table>
                    <h3>上传附件模版 <small>*修改表单时如不上传，则保持原有的附件</small></h3>
                    <input type="file" name="uploadfile" class="btn btn-info" id="chooseFileButton"/>
                    <small style="color: red">*上传附件格式只能为.doc、.docx、.xls、.xlsx、.rar、.zip，且文件大小不能超过50M</small><br>
                    <small style="color: red">*如需要上传多个文件，请先打包成压缩格式</small>
                    <br>
                    <br>
                    <button class="btn btn-success"><span class="glyphicon glyphicon-check"></span>&nbsp;提交表单</button>
                </form>
            </div>


        </div>
		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
		<script src="__JS__/bootstrap.js"></script>
		<script src="__JS__/check-form1.js"></script>
	</body>
</html>
