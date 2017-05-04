<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="keywords" content="商品后台管理系统">
	<meta name="description" content="">
    <title>首页</title>
	
	<link rel="stylesheet" href="./include/common/layui/css/layui.css">
	<link rel="stylesheet" href="./include/common/css/sccl.css">
    
  </head>
  
  <body class="login-bg">
    <div class="login-box">
        <header>
            <h1>商城后台管理系统</h1>
        </header>
        <div class="login-main">
			<form action="useraction.php?a=dologin" class="layui-form" method="post">
				<input name="__RequestVerificationToken" type="hidden" value="">                
				<div class="layui-form-item">
					<label class="login-icon">
						<i class="layui-icon"></i>
					</label>
					<input type="text" name="username" lay-verify="userName" autocomplete="off" placeholder="这里输入登录名" class="layui-input">
				</div>
				<div class="layui-form-item">
					<label class="login-icon">
						<i class="layui-icon"></i>
					</label>
					<input type="password" name="pass" lay-verify="password" autocomplete="off" placeholder="这里输入密码" class="layui-input">
				</div>
                <div class="layui-form-item">
                    <label class="login-icon">
                        <i class="layui-icon"></i>
                    </label>
                    <input type="text" name="code" lay-verify="userName" autocomplete="off" placeholder="这里输入验证码" class="layui-input">
                </div>
				<div class="layui-form-item">
					<div class="pull-left login-remember">
						<!-- <img src="../public/Code.code.php?b=1" onclick="this.src='../public/Code.class.php?b=1&id='+Math.random();"> -->

				                  
                        <img src="../public/Code.class.php?b=1" class="code1" onclick="this.src='../public/Code.class.php?b=1&id='+Math.random();">

					</div>
					<div class="pull-right">
						<button class="layui-btn layui-btn-primary" lay-submit="" lay-filter="login">
							<i class="layui-icon"></i> 登录
						</button>
					</div>
					<div class="clear"></div>
					<span style="color:red;">
			<?php 
				
				if(isset($_GET["eno"])){ 
					switch($_GET['eno']){
						case 1: echo "验证码错误！"; break;
						case 2: echo "账号错误！"; break;
						case 3: echo "密码错误！"; break;
						case 4: echo "非后台管理员！"; break;
					}

				}	
				
			 ?>
				</div>
			</form>        
		</div>
        <footer>
           
        </footer>
  
  
  </body>
</html>
