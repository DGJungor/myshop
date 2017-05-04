

				<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
								<?php 
								
								session_start();	
							
	
								if(empty($_SESSION['adminuser'])){
									echo "<a href=\"login.php\" target=\"_top\" class=\"h\">亲，请登录</a>&nbsp&nbsp&nbsp";
	 								echo "<a href=\"register.php\" target=\"_top\">免费注册</a>";	
								 }else{
								 	echo "你好! &nbsp&nbsp".$_SESSION['adminuser']['name'];
								 	echo "&nbsp&nbsp&nbsp";
								 	echo "<a href=\"./action/login/action.php?a=logout\" target=\"_top\" class=\"h\">退出登录</a>&nbsp&nbsp&nbsp";
								 }
							?> 
								</div>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="index.php" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="information.php" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="shopcart.php" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h"><?php echo $_SESSION['shopnum'];?></strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>
