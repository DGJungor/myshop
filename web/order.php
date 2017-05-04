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

		<title>订单管理</title>

		<link href="./AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="./AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="./css/personal.css" rel="stylesheet" type="text/css">
		<link href="./css/orstyle.css" rel="stylesheet" type="text/css">

		<script src="./AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="./AmazeUI-2.4.2/assets/js/amazeui.js"></script>

	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
						<?php require "./include/top.php"; ?>


					<!--悬浮搜索框-->

					<?php require"./include/search.php";?>

						<!-- <div class="nav white">
							<div class="logoBig">
								<li><img src="./images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form>
									<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div> -->

						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="index.php">首页</a></li>
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
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
						<div><center><strong class="am-text-danger am-text-lg">
							<?php
								if($_GET['a']==1){
									echo "已提醒买家发货";
								}


							?>
						</strong></center></div>

					<div class="user-order">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">所有订单</a></li>
								<li><a href="#tab2"></a></li>
								<li><a href="#tab3"></a></li>
								<li><a href="#tab4"></a></li>
								<li><a href="#tab5"></a></li>
							</ul>

							<div class="am-tabs-bd">
<div class="am-tab-panel am-fade am-in am-active" id="tab1">
	<div class="order-top">
		<div class="th th-item">
			<td class="td-inner">商品</td>
		</div>
		<div class="th th-price">
			<td class="td-inner">单价</td>
		</div>
		<div class="th th-number">
			<td class="td-inner">数量</td>
		</div>
		<div class="th th-operation">
			<td class="td-inner">商品操作</td>
		</div>
		<div class="th th-amount">
			<td class="td-inner">合计</td>
		</div>
		<div class="th th-status">
			<td class="td-inner">交易状态</td>
		</div>
		<div class="th th-change">
			<td class="td-inner">交易操作</td>
		</div>
	</div>

	<div class="order-main">
		<div class="order-list">
<?php 
require "../public/Model.class.php";
require "../public/config.php";

$id = $_SESSION['adminuser']['id'];

$mod_od = new Model("orders");
$orders = $mod_od->where("uid={$id}")->select();  
$mod_dt = new Model("detail");
$mod_gd = new Model("goods");
// var_dump($_SESSION);die();
date_default_timezone_set('PRC');
// var_dump($orders);die();
$state = ['0'=>"新订单",'1'=>"已发货",'2'=>"已收货",'3'=>"无效订单"];
?>


<?php
foreach($orders as $row){
		$odid = $row['orderid'];		
		$detail = $mod_dt->where("orderid={$odid}")->select(); 
		$a = 0;
		$sum = 0;
	
		// var_dump($row);
	
	
?>
			<!--交易成功-->
			
			<div class="order-status5">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;"><?php echo $row['orderid'];?></a></div>
					<span>成交时间：<?php echo date("Y-m-d H:i:s",$row['addtime']);?></span>
					<!--    <em>店铺：小桔灯</em>-->
				</div>
				<div class="order-content">
					<div class="order-left">

<?php
	foreach($detail as $row2){
			// var_dump($row2);
			$goodsid = $row2['goodsid'];
			// var_dump($row2);
			$goods = $mod_gd->where("id={$goodsid}")->select();
			// var_dump($row2);
			 // var_dump($row['orderid']);
			 // var_dump($goods['0']);
			 $a += ($goods['0']['price']*$goods['0']['num']);
			
			 $sum=sprintf("%.2f", $a);

?>

						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="../public/uploads/s_<?php echo $goods['0']['picname']; ?>" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p><?php echo "".$goods[0]['goods']; ?></p>
											<p class="info-little">颜色：
												<br/>包装： </p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									<?php echo $goods[0]['price'];?>
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span><?php echo $goods[0]['num'];?>
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									
								</div>
							</li>
						</ul>

						

<?php
			}
?>  
					</div>
					<div class="order-right">
						<li class="td td-amount">
							<div class="item-amount">
								合计：<?php echo $sum;?>
								<p>含运费：<span>10.00</span></p>
							</div>
						</li>
						<div class="move-right">
							<li class="td td-status">
								<div class="item-status">
									<p class="Mystatus"><?php echo "{$state[$row['status']]}";?></p>
									<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
									<p class="order-info"><a href="logistics.html">查看物流</a></p>
								</div>
							</li>
							<li class="td td-change">
								<form  action="orderaction.php?a=<?php echo $row['status'];?>" method="post">
								<input type="hidden" name="status" value="<?php echo $row['orderid']; ?>"> 
								<input type="hidden" name="id" value="<?php echo $row['id']; ?>"> 
									<?php 
									// var_dump($row['status']);die();
									
									switch($row['status']){
							            case "0":  
							          		echo "<input name=\"\" type=\"submit\" value=\"&nbsp&nbsp提醒发货&nbsp&nbsp\" class=\"am-btn am-btn-danger\">";
							                break;
							            case "1":  
							          		echo "<input name=\"\" type=\"submit\" value=\"&nbsp&nbsp确认收货&nbsp&nbsp\" class=\"am-btn am-btn-danger\">";
							                break;
							             case "2":  
							          		echo "<input name=\"\" type=\"submit\" value=\"&nbsp&nbsp删除订单&nbsp&nbsp\" class=\"am-btn am-btn-danger\">";
							                break;
							             case "3":  
							          		echo "<input name=\"\" type=\"submit\" value=\"&nbsp&nbsp删除订单&nbsp&nbsp\" class=\"am-btn am-btn-danger\">";
							                break;
   
							            }


									?>
									
								</form>
							</li>
						</div>
					</div>
				</div>
			</div>
			
<?php 
		
	}
?>			
			
			<!--交易失败-->
			<!-- <div class="order-status0">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
					<span>成交时间：2015-12-20</span>
					    <em>店铺：小桔灯</em>
				</div>
				<div class="order-content">
					<div class="order-left">
						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
											<p class="info-little">颜色：12#川南玛瑙
												<br/>包装：裸装 </p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									
								</div>
							</li>
						</ul>

						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
											<p class="info-little">颜色分类：李清照
												<br/>尺码：均码</p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									
								</div>
							</li>
						</ul>

						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
											<p class="info-little">颜色：12#川南玛瑙
												<br/>包装：裸装 </p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									
								</div>
							</li>
						</ul>
					</div>
					<div class="order-right">
						<li class="td td-amount">
							<div class="item-amount">
								合计：676.00
								<p>含运费：<span>10.00</span></p>
							</div>
						</li>
						<div class="move-right">
							<li class="td td-status">
								<div class="item-status">
									<p class="Mystatus">交易关闭</p>
								</div>
							</li>
							<li class="td td-change">
								<div class="am-btn am-btn-danger anniu">
									删除订单</div>
							</li>
						</div>
					</div>
				</div>
			</div>											
			 -->
			<!--待发货-->
			<!-- <div class="order-status2">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
					<span>成交时间：2015-12-20</span>
					    <em>店铺：小桔灯</em>
				</div>
				<div class="order-content">
					<div class="order-left">
						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
											<p class="info-little">颜色：12#川南玛瑙
												<br/>包装：裸装 </p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									<a href="refund.html">退款</a>
								</div>
							</li>
						</ul>

						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
											<p class="info-little">颜色分类：李清照
												<br/>尺码：均码</p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									<a href="refund.html">退款</a>
								</div>
							</li>
						</ul>

						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
											<p class="info-little">颜色：12#川南玛瑙
												<br/>包装：裸装 </p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									<a href="refund.html">退款</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="order-right">
						<li class="td td-amount">
							<div class="item-amount">
								合计：676.00
								<p>含运费：<span>10.00</span></p>
							</div>
						</li>
						<div class="move-right">
							<li class="td td-status">
								<div class="item-status">
									<p class="Mystatus">买家已付款</p>
									<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
								</div>
							</li>
							<li class="td td-change">
								<div class="am-btn am-btn-danger anniu">
									提醒发货</div>
							</li>
						</div>
					</div>
				</div>
			</div> -->

			<!--不同状态订单-->
	 		<!-- <div class="order-status3">
				<div class="order-title">
					<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
					<span>成交时间：2015-12-20</span>
					   <em>店铺：小桔灯</em>
				</div>
				<div class="order-content">
					<div class="order-left">
						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
											<p class="info-little">颜色：12#川南玛瑙
												<br/>包装：裸装 </p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									<a href="refund.html">退款/退货</a>
								</div>
							</li>
						</ul>

						<ul class="item-list">
							<li class="td td-item">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img src="./images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
									</a>
								</div>
								<div class="item-info">
									<div class="item-basic-info">
										<a href="#">
											<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
											<p class="info-little">颜色分类：李清照
												<br/>尺码：均码</p>
										</a>
									</div>
								</div>
							</li>
							<li class="td td-price">
								<div class="item-price">
									333.00
								</div>
							</li>
							<li class="td td-number">
								<div class="item-number">
									<span>×</span>2
								</div>
							</li>
							<li class="td td-operation">
								<div class="item-operation">
									<a href="refund.html">退款/退货</a>
								</div>
							</li>
						</ul>

					</div>
					<div class="order-right">
						<li class="td td-amount">
							<div class="item-amount">
								合计：676.00
								<p>含运费：<span>10.00</span></p>
							</div>
						</li>
						<div class="move-right">
							<li class="td td-status">
								<div class="item-status">
									<p class="Mystatus">卖家已发货</p>
									<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
									<p class="order-info"><a href="logistics.html">查看物流</a></p>
									<p class="order-info"><a href="#">延长收货</a></p>
								</div>
							</li>
							<li class="td td-change">
								<div class="am-btn am-btn-danger anniu">
									确认收货</div>
							</li>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

</div> -->



								<!-- <div class="am-tab-panel am-fade" id="tab2">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
																			<p class="info-little">颜色分类：李清照
																				<br/>尺码：均码</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>


										</div>

									</div>
								</div> -->


								<!-- <div class="am-tab-panel am-fade" id="tab3">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
																			<p class="info-little">颜色分类：李清照
																				<br/>尺码：均码</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>


										</div>

									</div>
								</div> -->


								<!-- <div class="am-tab-panel am-fade" id="tab4">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
																			<p class="info-little">颜色分类：李清照
																				<br/>尺码：均码</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>


										</div>

									</div>
								</div> -->


								<!-- <div class="am-tab-panel am-fade" id="tab5">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">商品操作</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-status">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									<div class="order-main">
										<div class="order-list">
											
										<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>

												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="order-status4">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">1601430</a></div>
													<span>成交时间：2015-12-20</span>
													
												</div>
												<div class="order-content">
													<div class="order-left">
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>

														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/62988.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>礼盒袜子女秋冬 纯棉袜加厚 韩国可爱 </p>
																			<p class="info-little">颜色分类：李清照
																				<br/>尺码：均码</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="#" class="J_MakePoint">
																		<img src="./images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="#">
																			<p>美康粉黛醉美唇膏 持久保湿滋润防水不掉色</p>
																			<p class="info-little">颜色：12#川南玛瑙
																				<br/>包装：裸装 </p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	333.00
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>2
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">
																	<a href="refund.html">退款/退货</a>
																</div>
															</li>
														</ul>
														

													</div>
													<div class="order-right">
														<li class="td td-amount">
															<div class="item-amount">
																合计：676.00
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易成功</p>
																	<p class="order-info"><a href="orderinfo.html">订单详情</a></p>
																	<p class="order-info"><a href="logistics.html">查看物流</a></p>
																</div>
															</li>
															<li class="td td-change">
																<a href="commentlist.html">
																	<div class="am-btn am-btn-danger anniu">
																		评价商品</div>
																</a>
															</li>
														</div>
													</div>
												</div>
											</div>


										</div>

									</div>
								</div> -->

					


							</div>

						</div>

					</div>
				</div>
				<!--底部-->
				<?php require "./include/footer.php";?>

			</div>
				<?php 
				require "./include/imenu.php";
				 ?>
		</div>

	</body>

</html>
