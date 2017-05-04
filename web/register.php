<!DOCTYPE html>
<html>
 
	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="stylesheet" href="AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="css/dlstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="index.php"><img alt="logo" src="images/logobig.png" /></a>
		</div>
 
		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">快速注册</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form action="./action/users?a=add" name="loginform" method="post">
						  		<input type="hidden" name="name" value="">
						  		<input type="hidden" name="sex" value="1">
						  		<input type="hidden" name="address" value="">
						  		<input type="hidden" name="code" value="">
						  		<input type="hidden" name="phone" value="">
						  		<input type="hidden" name="email" value="">
						  		<input type="hidden" name="state" value="1"> 
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="username" id="user" placeholder="要注册的账号">
                 </div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pass" id="password" placeholder="注册的密码">
                 </div>
            
           </div>
            
            <div class="login-links">
               
								<!-- <a href="#" class="am-fr">忘记密码</a> -->
								<a href="./login.php" class="zcnext am-fr am-btn-default">登录</a>
								<br />
            </div>
								<div class="am-cf">
									<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm">
								</div>
					  </form>
			
						
						<div>
							  <span style="color:red;">
				                <?php               
				                // if(isset($_GET["eno"])){ 
				                //     switch($_GET['eno']){
				                //         case 1: echo "验证码错误！"; break;
				                //         case 2: echo "账号错误！"; break;
				                //         case 3: echo "密码错误！"; break;
				                //         case 4: echo "非后台管理员！"; break;
				                //     }
				                // }   
				                
				             ?>
						</div>
				</div>
			</div>
		</div>

		<?php require "./include/footer.php";?>
	</body>

</html>
