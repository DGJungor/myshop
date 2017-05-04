<?php
    session_start();  
 ?>
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

		<link rel="stylesheet" href="../AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="../css/dlstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="../index.php"><img alt="logo" src="../images/logobig.png" /></a>
		</div>
 
		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="../images/big.jpg" /></div>
				<div class="login-box">

							 <?php 
				// var_dump($_POST);die();
				//1.导入配置文件 
				require("../../public/config.php");
				require("../../public/Model.class.php");
				//2.实例化Stu表信息操作的对象
				$mod = new Model("users");
				//4.根据参数a的值执行对应操作
				
				
				switch($_GET['a']){ 
					case "add"://执行添加
						//执行添加并判断
						$data = $_POST;
						$data['addtime'] = time(); 
						// var_dump($data);
						// die();
						if($mod->insert($data)>0){
							echo "注册成功";
						}else{
							echo "注册失败";
						}
						break;
				 
					case "update"://执行修改
						//执行修改并判断
						
						// var_dump($_POST);
						$data = $_POST;
						// $data['addtime'] = time();
						if($mod->update($data)>0){
							echo "修改成功";
							$uid = $_SESSION['adminuser']['id'];
							$map = "id='".$uid."'";
							$result = $mod->where($map)->select();
							$_SESSION['adminuser'] = $result[0];
							$_SESSION['adminuser']['pass'] = md5($result[0]['pass']);
							// var_dump($_SESSION);die(); 
						}else{
							echo "修改失败";
						}
						break;
				}
				
 
			 ?>
			 <br>
		    <br>
		    <a href="../index.php" >返回首页</a>
			 <!-- <div class="login-banner">
			 	<a href="/index.php" class="zcnext am-fr am-btn-default">返回首页</a>
			 </div>
			 -->
						
						<div>
							  <span style="color:red;">
				  
						</div>
				</div>
			</div>
		</div>

		<?php 
					require("../../public/config.php");
					require("../../public/Model.php");

					 date_default_timezone_set("PRC");
					  
					  $mod = new Model_n("friendlink");
					  $total = $mod->total();
				  
					  $list = $mod->select();
					  // var_dump($list);

 
?>
					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<em>友情连接</em>
								<?php
									foreach($list as $row){
										  if($row['state']==1){
										  	echo "<a href=\"{$row['link']} \">{$row['linkname']}</a>
											<b>|</b>";
										  }
   
									}
								?>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
		

	</body>

</html>
