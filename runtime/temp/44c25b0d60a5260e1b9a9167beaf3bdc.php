<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\wamp64\www\project\infomationcollection/application/index\view\login\index.html";i:1491054850;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="__JS__/commom.js"></script>
		<script src="__JS__/sweetalert.js"></script>
		<link rel="stylesheet" href="__CSS__/bootstrap.css">
		<link rel="stylesheet" href="__CSS__/main.css">
		<link rel="stylesheet" href="__CSS__/login.css">
		<link rel="stylesheet" href="__CSS__/sweetalert.css">
		<title>登录</title>
	</head>
	<body>
		<div class="main">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-11 col-lg-5 login">
						<h3>校团委组织部评信息收集系统</h3>
						<div class="loginbody">
							<!--标签页头-->
							<ul id="myTab" class="nav nav-tabs">
								<li class="active">
									<a href="#userlogin" data-toggle="tab">
										学院登录
									</a>
								</li>
								<li>
									<a href="#adminlogin" data-toggle="tab">
										管理员登录
									</a>
								</li>
							</ul>
							<!--标签页内容-->
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade in active login-form" id="userlogin">
									<form action="<?php echo url('Login/schoolLogin'); ?>" method="post" id="userloginform">
										<input type="text" class="form-control" placeholder="账号" name="schoolname" id="userLoginUserName">
										<input type="password" class="form-control" placeholder="密码" name="password" id="userLoginPassword">
										<input type="button" name="" id="userloginbutton" class="btn btn-info" value="学院登录">
									</form>
								</div>
								<div class="tab-pane fade login-form" id="adminlogin">
									<form action="<?php echo url('Login/adminLogin'); ?>" method="post" id="adminloginform">
										<input type="text" class="form-control" placeholder="账号" name="adminname" id="adminLoginUserName">
										<input type="password" class="form-control" placeholder="密码" name="password" id="adminLoginPassword">
										<input type="button" name="" id="adminloginbutton" class="btn btn-success" value="管理员登录">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="__JS__/login.js"></script>
		<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
		<script src="__JS__/bootstrap.js"></script>
	</body>
</html>
