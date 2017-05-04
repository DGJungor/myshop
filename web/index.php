<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>首页</title>

		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />

		<link href="css/hmstyle.css" rel="stylesheet" type="text/css" />
		<script src="AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>
		<div class="hmtop">
			<!--顶部导航条 -->
			<?php 	require"./include/top.php";					
				  	require("../public/Model.class.php");
				  	require("../public/config.php");

				 	$mod = new Model("type");
					$map = "concat(path,id)";
					$list = $mod->order($map)->where("pid=0")->select();


					// var_dump($list);die();
			?>

				<!--悬浮搜索框-->
<?php require"./include/search.php";?>

			<!-- 	<div class="nav white">
					<div class="logo"><img src="images/logo.png" /></div>
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
			
			
			<div class="banner">
                      <!--轮播 -->
						<div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
							<ul class="am-slides">
								<li class="banner1"><a href="introduction.html"><img src="images/ad1.jpg" /></a></li>
								<li class="banner2"><a><img src="images/ad2.jpg" /></a></li>
								<li class="banner3"><a><img src="images/ad3.jpg" /></a></li>
								<li class="banner4"><a><img src="images/ad4.jpg" /></a></li>

							</ul>
						</div>
						<div class="clear"></div>	
			</div>						
			
			<div class="shopNav">
				<div class="slideall">
			        
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
		        				
						<!--侧边导航 -->
<div id="nav" class="navfull">
<div class="area clearfix">
<div class="category-content" id="guide_2">
	
	<div class="category">
		<ul class="category-list" id="js_climit_li">
			<li class="appliance js_toggle relative first">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/cake.png"> --></i><a class="ml-22" title="点心"><?php echo "{$list['0']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">

<dl class="dl-sort"><dt><span> >>>>> </span></dt>
<?php 
	$pid = $list['0']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>
</dl>


								</div>
							</div>
						</div>
					</div>
				</div>
			<b class="arrow"></b>	
			</li>
			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/cookies.png"> --></i><a class="ml-22" title="饼干、膨化"><?php echo "{$list['1']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span> >>>>> </span></dt>
<?php 
	$pid = $list['1']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
             <b class="arrow"></b>
			</li>

			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/meat.png"> --></i><a class="ml-22" title="熟食、肉类"><?php echo "{$list['2']['name']}";?></a></h3>
					<em>&gt;</em></div>

				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
<?php 
	$pid = $list['2']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>										


									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
            <b class="arrow"></b>
			</li>


			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/bamboo.png"> --></i><a class="ml-22" title="素食、卤味"><?php echo "{$list['3']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
<?php 
	$pid = $list['3']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>											
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
             <b class="arrow"></b>
			</li>
			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/nut.png"> --></i><a class="ml-22" title="坚果、炒货"><?php echo "{$list['4']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
										
<?php 
	$pid = $list['4']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>	

									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
				<b class="arrow"></b>
			</li>
			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/candy.png"> --></i><a class="ml-22" title="糖果、蜜饯"><?php echo "{$list['5']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
<?php 
	$pid = $list['5']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>											

									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
            <b class="arrow"></b>
			</li>
			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/chocolate.png"> --></i><a class="ml-22" title="巧克力"><?php echo "{$list['6']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
										
<?php 
	$pid = $list['6']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>	
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
				<b class="arrow"></b>
			</li>
			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/fish.png"> --></i><a class="ml-22" title="海味、河鲜"><?php echo "{$list['7']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
<?php 
	$pid = $list['7']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>											

									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
             <b class="arrow"></b>
			</li>
			<li class="appliance js_toggle relative">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/tea.png"> --></i><a class="ml-22" title="花茶、果茶"><?php echo "{$list['8']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
<?php 
	$pid = $list['8']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>											

									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>
				<b class="arrow"></b>
			</li>
			<li class="appliance js_toggle relative last">
				<div class="category-info">
					<h3 class="category-name b-category-name"><i><!-- <img src="images/package.png"> --></i><a class="ml-22" title="品牌、礼包"><?php echo "{$list['9']['name']}";?></a></h3>
					<em>&gt;</em></div>
				<div class="menu-item menu-in top">
					<div class="area-in">
						<div class="area-bg">
							<div class="menu-srot">
								
								<div class="brand-side">
									<dl class="dl-sort"><dt><span>>>>>></span></dt>
<?php 
	$pid = $list['9']['id'];
	$list_0 = $mod->order($map)->where("pid={$pid}")->select();
	foreach($list_0 as $row){

		echo "<dd><a rel=\"nofollow\" title=\"{$row['name']}\" target=\"_blank\" href=\"./shop_list.php?id={$row['id']}\" rel=\"nofollow\"><span  class=\"red\" >{$row['name']}</span></a></dd>";
	}

?>										
<!-- 
										<dd><a title="琳琅鞋业" target="_blank" href="#" rel="nofollow"><span >琳琅鞋业</span></a></dd>
										<dd><a title="宏利鞋业" target="_blank" href="#" rel="nofollow"><span >宏利鞋业</span></a></dd>
										<dd><a title="比爱靓点鞋业" target="_blank" href="#" rel="nofollow"><span >比爱靓点鞋业</span></a></dd>
										<dd><a title="浪人怪怪" target="_blank" href="#" rel="nofollow"><span >浪人怪怪</span></a></dd> -->
									
									</dl>
								</div>
							</div>
						</div>
					</div>
				</div>

			</li>
		</ul>
	</div>
</div>

							</div>
						</div>
						<!--轮播 -->
						<script type="text/javascript">
							(function() {
								$('.am-slider').flexslider();
							});
							$(document).ready(function() {
								$("li").hover(function() {
									$(".category-content .category-list li.first .menu-in").css("display", "none");
									$(".category-content .category-list li.first").removeClass("hover");
									$(this).addClass("hover");
									$(this).children("div.menu-in").css("display", "block")
								}, function() {
									$(this).removeClass("hover")
									$(this).children("div.menu-in").css("display", "none")
								});
							})
						</script>


					<!--小导航 -->
					<div class="am-g am-g-fixed smallnav">
						<div class="am-u-sm-3">
							<a href="sort.html"><img src="images/navsmall.jpg" />
								<div class="title">商品分类</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="images/huismall.jpg" />
								<div class="title">大聚惠</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="images/mansmall.jpg" />
								<div class="title">个人中心</div>
							</a>
						</div>
						<div class="am-u-sm-3">
							<a href="#"><img src="images/moneysmall.jpg" />
								<div class="title">投资理财</div>
							</a>
						</div>
					</div>

					<!--走马灯 -->

					<div class="marqueen">
						<span class="marqueen-title">商城头条</span>
						<div class="demo">

							<ul>
								<li class="title-first"><a target="_blank" href="#">
									<img src="images/TJ2.jpg"></img>
									<span>[特惠]</span>商城爆品1分秒								
								</a></li>
								<li class="title-first"><a target="_blank" href="#">
									<span>[公告]</span>商城与广州市签署战略合作协议
								     <img src="images/TJ.jpg"></img>
								     <p>XXXXXXXXXXXXXXXXXX</p>
							    </a></li>
							    
						<div class="mod-vip">
							<div class="m-baseinfo">
								<a href="person/index.html">
									<img src="images/getAvatar.do.jpg">
								</a>
								<em>
									Hi,<span class="s-name"><?php echo $_SESSION['adminuser']['name'];?></span>
									<a href="#"><p>点击更多优惠活动</p></a>									
								</em>
							</div>
							<div class="member-logout">
							<?php 
								if(empty($_SESSION['adminuser'])){
									echo "<a class=\"am-btn-warning btn\" href=\"login.php\">登录</a>";
									echo "<a class=\"am-btn-warning btn\" href=\"register.php\">注册</a>";
								}
							?>
							</div>
						<!-- 	<div class="member-logout">
								<a class="am-btn-warning btn" href="login.html">登录</a>
								<a class="am-btn-warning btn" href="register.html">注册</a>
							</div> -->
							<div class="member-login">
								<a href="#"><strong>0</strong>待收货</a>
								<a href="#"><strong>0</strong>待发货</a>
								<a href="#"><strong>0</strong>待付款</a>
								<a href="#"><strong>0</strong>待评价</a>
							</div>
							<div class="clear"></div>	
						</div>																	    
							    
								<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>
								<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>
								<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>
								
							</ul>
                        <div class="advTip"><img src="images/advTip.jpg"/></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<script type="text/javascript">
					if ($(window).width() < 640) {
						function autoScroll(obj) {
							$(obj).find("ul").animate({
								marginTop: "-39px"
							}, 500, function() {
								$(this).css({
									marginTop: "0px"
								}).find("li:first").appendTo(this);
							})
						}
						$(function() {
							setInterval('autoScroll(".demo")', 3000);
						})
					}
				</script>
			</div>
			<div class="shopMainbg">
				<div class="shopMain" id="shopmain">

					<!--今日推荐 -->

					<div class="am-g am-g-fixed recommendation">
						<div class="clock am-u-sm-3" ">
							<img src="images/2016.png "></img>
							<p>今日<br>推荐</p>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>真的有鱼</h3>
								<h4>开年福利篇</h4>
							</div>
							<div class="recommendationMain ">
								<img src="images/tj.png "></img>
							</div>
						</div>						
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>囤货过冬</h3>
								<h4>让爱早回家</h4>
							</div>
							<div class="recommendationMain ">
								<img src="images/tj1.png "></img>
							</div>
						</div>
						<div class="am-u-sm-4 am-u-lg-3 ">
							<div class="info ">
								<h3>浪漫情人节</h3>
								<h4>甜甜蜜蜜</h4>
							</div>
							<div class="recommendationMain ">
								<img src="images/tj2.png "></img>
							</div>
						</div>

					</div>
					<div class="clear "></div>
					<!--热门活动 -->

					<div class="am-container activity ">
						<div class="shopTitle ">
							<h4>活动</h4>
							<h3>每期活动 优惠享不停 </h3>
							<span class="more ">
                              <a class="more-link " href="# ">全部活动</a>
                            </span>
						</div>
					
					  <div class="am-g am-g-fixed ">
						<div class="am-u-sm-3 ">
							<div class="icon-sale one "></div>	
								<h4>秒杀</h4>							
							<div class="activityMain ">
								<img src="images/activity1.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>														
						</div>
						
						<div class="am-u-sm-3 ">
						  <div class="icon-sale two "></div>	
							<h4>特惠</h4>
							<div class="activityMain ">
								<img src="images/activity2.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>								
							</div>							
						</div>						
						
						<div class="am-u-sm-3 ">
							<div class="icon-sale three "></div>
							<h4>团购</h4>
							<div class="activityMain ">
								<img src="images/activity3.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>							
						</div>						

						<div class="am-u-sm-3 last ">
							<div class="icon-sale "></div>
							<h4>超值</h4>
							<div class="activityMain ">
								<img src="images/activity.jpg "></img>
							</div>
							<div class="info ">
								<h3>春节送礼优选</h3>
							</div>													
						</div>

					  </div>
                   </div>
					<div class="clear "></div>

					<!--甜点-->
					
					<!--坚果-->
					
					
					<div class="clear "></div>
						
					<?php require "./include/footer.php";?>
					</div>
			</div>
		</div>
		</div>	
	</body>

</html>

