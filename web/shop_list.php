<?php 
	session_start();
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>商品列表</title>

		<link href="./AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="./AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="./basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="./css/seastyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="./basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="./js/script.js"></script>
	</head>

	<body>

		<!--顶部导航条 -->
		<?php require"./include/top.php"; ?>

			<!--悬浮搜索框-->
		<?php require"./include/search.php";?>

			<!-- <div class="nav white">
				<div class="logo"><img src="./images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="./images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn"  value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>
 -->
			<div class="clear"></div>
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
			<div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="./index.php">首页</a></li>
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
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">
	                  	<div class="theme-popover">														
							<div class="searchAbout">
								<span class="font-pale">相关搜索：</span>
								<a title="" href="#"></a>
								<a title="" href="#"></a>
								<a title="" href="#"></a>

							</div>
							


							<div class="clear"></div>
                        </div>
							<div class="search-content">
								<div class="sort">
									<li class="first"><a title="综合">综合排序</a></li>
									<li><a title="销量">销量排序</a></li>
									<li><a title="价格">价格优先</a></li>
									<li class="big"><a title="评价" href="#">评价为主</a></li>
								</div>
								<div class="clear"></div>
								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
<?php

	require("../public/Model.class.php");
	require("../public/config.php");

	// var_dump($_GET['a']);die();
	$typeid = $_GET['id']+0;

////////////
	// $typeid = 4;
/////////

	$tableName = "goods"; 
	$mod = new Model($tableName);
	$goods = $mod->where("typeid={$typeid}")->select();
	// var_dump($_SESSION['search']);die();

	if($_GET['a']=='search'){

		foreach($_SESSION['search'] as $row){

			
			if($row['state'] != 3){
				echo "<li>";
				echo "<div class=\"i-pic limit\">";
				echo "<a href=\"./introduction.php?id={$row['id']}\">";
				echo "<img src=\"../public/uploads/m_{$row['picname']}\" />	";
				echo "<p class=\"title fl\">{$row['goods']}</p>";
				echo "<p class=\"price fl\">
					<b>¥</b>
					<strong>{$row['price']}</strong>
					</p>";
				echo "	<p class=\"number fl\">
						销量<span>{$row['num']}</span>
						</p>";
				echo "</a>";
				echo "</div>";
				echo "</li>";
			}
		}
		
				
	}else{
		foreach($goods as $row){

			if($row['state'] != 3){
				echo "<li>";
				echo "<div class=\"i-pic limit\">";
				echo "<a href=\"./introduction.php?id={$row['id']}\">";
				echo "<img src=\"../public/uploads/m_{$row['picname']}\" />	";
				echo "<p class=\"title fl\">{$row['goods']}</p>";
				echo "<p class=\"price fl\">
					<b>¥</b>
					<strong>{$row['price']}</strong>
					</p>";
				echo "	<p class=\"number fl\">
						销量<span>{$row['num']}</span>
						</p>";
				echo "</a>";
				echo "</div>";
				echo "</li>";
			}
			
		}
	}
?>
	
<!-- 
									<li>
										<div class="i-pic limit"><a href="#">
											
											<img src="./images/imgsearch1.jpg" />
											<p class="title fl">【良品铺子旗舰店】手剥松子218g 坚果炒货零食新货巴西松子包邮</p>
											<p class="price fl">
												<b>¥</b>
												<strong>56.90</strong>
											</p>
											<p class="number fl">
												销量<span>1110</span>
											</p></a>
										</div>
									</li> -->
						
								</ul>
							</div>
							<div class="search-side">

								<div class="side-title">
									热门推介
								</div>

								<li>
									<div class="i-pic check">
										<img src="./images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="./images/cp2.jpg" />
										<p class="check-title">ZEK 原味海苔</p>
										<p class="price fl">
											<b>¥</b>
											<strong>8.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>
								<li>
									<div class="i-pic check">
										<img src="./images/cp.jpg" />
										<p class="check-title">萨拉米 1+1小鸡腿</p>
										<p class="price fl">
											<b>¥</b>
											<strong>29.90</strong>
										</p>
										<p class="number fl">
											销量<span>1110</span>
										</p>
									</div>
								</li>

							</div>
							<div class="clear"></div>
							<!--分页 -->
							<ul class="am-pagination am-pagination-right">
								<li class="am-disabled"><a href="#">&laquo;</a></li>
								<li class="am-active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">5</a></li>
								<li><a href="#">&raquo;</a></li>
							</ul>

						</div>
					</div>
					
					<!-- 导入尾部 -->
					<?php require"./include/footer.php"; ?>
				</div>

			</div>

		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="./person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>

	
		
		<script>
			window.jQuery || document.write('<script src="basic/js/jquery-1.9.min.js"><\/script>');
		</script>
		<script type="text/javascript" src="./basic/js/quick_links.js"></script>

<div class="theme-popover-mask"></div>

	</body>

</html>
