<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\wamp64\www\project\infocollection/application/index\view\Index\submittable.html";i:1491649827;}*/ ?>
<DOCTYPE html/>
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
    <link rel="stylesheet" href="__CSS__/user-form.css">

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
        <p><?php echo $task_data['tasktext']; ?></p>
    </div>

    <!--属于哪个任务-->
    <input type="hidden" name="task_id" value="<?php echo $task_data['id']; ?>">

    <div id="table">
        <table class="table table-bordered">
            <tr id="biaotou">
                <th></th>
                <?php if(is_array($table_moudel_array) || $table_moudel_array instanceof \think\Collection || $table_moudel_array instanceof \think\Paginator): $i = 0; $__LIST__ = $table_moudel_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table_moudel): $mod = ($i % 2 );++$i;?>
                    <th><?php echo $table_moudel; ?></th>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>

            <?php if(($table_data==null)): ?>
            <tr class="item">
                <td>
                    <button class="btn btn-danger">删除本行</button>
                </td>
                <?php if(is_array($table_moudel_array) || $table_moudel_array instanceof \think\Collection || $table_moudel_array instanceof \think\Paginator): $i = 0; $__LIST__ = $table_moudel_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table_moudel): $mod = ($i % 2 );++$i;?>
                    <td>
                        <input type="text" class="form-control">
                    </td>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>
            <tr class="item">
                <td>
                    <button class="btn btn-danger">删除本行</button>
                </td>
                <?php if(is_array($table_moudel_array) || $table_moudel_array instanceof \think\Collection || $table_moudel_array instanceof \think\Paginator): $i = 0; $__LIST__ = $table_moudel_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table_moudel): $mod = ($i % 2 );++$i;?>
                <td>
                    <input type="text" class="form-control">
                </td>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>
            <tr class="item">
                <td>
                    <button class="btn btn-danger">删除本行</button>
                </td>
                <?php if(is_array($table_moudel_array) || $table_moudel_array instanceof \think\Collection || $table_moudel_array instanceof \think\Paginator): $i = 0; $__LIST__ = $table_moudel_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table_moudel): $mod = ($i % 2 );++$i;?>
                <td>
                    <input type="text" class="form-control">
                </td>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tr>
            <?php else: if(is_array($table_data) || $table_data instanceof \think\Collection || $table_data instanceof \think\Paginator): $i = 0; $__LIST__ = $table_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table_data_row): $mod = ($i % 2 );++$i;
                    $table_data_array=explode('<&>',$table_data_row['table_data']);
                    array_pop($table_data_array);
                 ?>
                <tr class="item">
                    <td>
                        <button class="btn btn-danger">删除本行</button>
                    </td>
                    <?php if(is_array($table_data_array) || $table_data_array instanceof \think\Collection || $table_data_array instanceof \think\Paginator): $i = 0; $__LIST__ = $table_data_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$table_data_cell): $mod = ($i % 2 );++$i;?>
                        <td>
                            <input type="text" class="form-control" value="<?php echo $table_data_cell; ?>">
                        </td>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $table_data_row['id']; ?>">
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </table>
    </div>
    <button class="btn btn-info" id="add"><span class="glyphicon glyphicon-plus"></span>&nbsp;添加一条记录</button>
    <br>
    <br>
    <button class="btn btn-success" id="submit"><span class="glyphicon glyphicon-check"></span>&nbsp;提交表单</button>


</div>
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="__JS__/bootstrap.js"></script>
<script src="__JS__/user-from.js"></script>
<script>
    /*为提交按钮绑定功能*/
    document.getElementById("submit").onclick=function () {
        if(checkinput()===false){
            swal({
                title: "你还有没有填写的项目",
                type: "error",
                confirmButtonText: "知道了",
            });
        }
        else {
            sendData("<?php echo url('Index/submitTable'); ?>","<?php echo url('Index/index'); ?>");
        }
    }
</script>
</body>
</html>