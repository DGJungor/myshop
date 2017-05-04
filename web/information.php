<?php
	session_start();	
	if(empty($_SESSION['adminuser'])){
		header("Location:login.php");		
	 }
	 ?>
	
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="css/personal.css" rel="stylesheet" type="text/css">
		<link href="css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
			
	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<?php require"./include/top.php";?>


						<!--悬浮搜索框-->
						<?php require"./include/search.php";?>

						<!-- <div class="nav white">
							<div class="logoBig">
								<li><img src="images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form>
									<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>
 -->
						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div> 
	<?php

		require("../public/Model.class.php");
		require("../public/config.php");
		
		$id = $_SESSION['adminuser']['id'];
		
		$tableName = "users";
		$mod = new Model($tableName);
		$user = $mod->find($id);
		
	?>

			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img class="am-circle am-img-thumbnail" src="images/getAvatar.do.jpg" alt="" />
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i><?php echo $_SESSION['adminuser']['name'];?></i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
							</div>
						</div>
 
						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" action="./action/users?a=update" method="post">
							<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
						
								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content">
										<input type="text" id="user-name2" placeholder="name"  name="name" value="<?php echo $user['name']; ?>">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="1" data-am-ucheck <?php echo ($user['sex']==1)? "checked":'' ?>> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" name="sex" value="2" data-am-ucheck <?php echo ($user['sex']==2)? "checked":'' ?>> 女
										</label>										
									</div>
								</div>
 
							
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="phone" placeholder="telephonenumber" type="tel" value="<?php echo $user['phone']; ?>">
									</div>
								</div>
								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email" placeholder="Email" type="email" name="email" value="<?php echo $user['email']; ?>">
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">地址</label>
									<div class="am-form-content">
										<input id="user-phone"  placeholder="telephonenumber" type="tel" name="address" value="<?php echo $user['address']; ?>">
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">邮编</label>
									<div class="am-form-content">
										<input id="user-phone"  placeholder="telephonenumber" type="tel" name="code" value="<?php echo $user['code']; ?>" >
									</div>
								</div>


								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>
 
									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<div ><input type="submit" name="" value="保存修改" class="am-btn am-btn-danger"></div>
								</div>

							</form>
						</div>

					</div>

				</div>
				<!--底部-->
			<?php require "./include/footer.php";?>	
			</div>
		
			<?php require "./include/imenu.php";?>

		</div>

	</body>

</html>
