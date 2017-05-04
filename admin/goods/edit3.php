<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
			<h3>编辑商品信息</h3>
				<?php 
					//获取要修改的商品信息
					//1.导入配置文件
					require("../../public/config.php");
					require("../../public/Model.class.php");
					//2.连接数据库 并判断
					// $link = @mysqli_connect(HOST,USER,PASS,DBNAME) or die("数据库连接失败");
					// //3.设置字符编码
					// mysqli_set_charset($link,"utf8");
					// //4.定义sql语句 并发送
					// $sql = "select * from goods where id=".$_GET['id'];
					// $result = mysqli_query($link,$sql);
					// //5.解析	
					// if(mysqli_num_rows($result)>0){
					// 	$goods = mysqli_fetch_assoc($result);
					// 	var_dump($goods);
					// 	mysqli_free_result($result);
					// }else{
					// 	die("没有找到要修改的商品");
					// }

					$mod = new Model("goods");
					$goods = $mod->find($_GET['id']);
					if(!$goods){
						die("没有找到要修改的商品");
					}
					// var_dump($goods);



				 ?>
			<table width="400" border="0">
				<form action="action.php?a=update" method="post" enctype="multipart/form-data">
					<input type="hidden" name="oldpicname" value="<?php echo $goods['picname']; ?>">
					<input type="hidden" name="id" value="<?php echo $goods['id']; ?>">
					<tr>
						<td align="right">商品类别：</td>
						<td>
							<select name="typeid">
								<?php 
									//1.导入配置文件
									// require("../../public/config.php");
									// require("../../public/Model.class.php");
									//2.连接数据库
									// $link = @mysqli_connect(HOST,USER,PASS,DBNAME);
									// if(!$link){
									// 	die("连接数据库失败！原因：".mysqli_connect_error());
									// }
									// //3.设置字符编码
									// mysqli_set_charset($link,"utf8");
									// //4.定义sql语句并执行发送
									// $sql = "select * from type order by concat(path,id)";
									// $result = mysqli_query($link,$sql);
									// while($row = mysqli_fetch_assoc($result)){
									// 	//计算空格
									// 	$m = substr_count("{$row['path']}",",")-1;
									// 	$str = str_repeat("&nbsp;",$m*4);
									// 	//判断是否禁用
									// 	$disabled = ($row['pid']==0)?"disabled":"";
									// 	//判断是否选中 当前的id是不是goods里面的typeid
									// 	$selected  = ($row['id']==$goods['typeid'])?"selected":"";
									// 	//输出下拉项
									// 	echo "<option $disabled $selected value='{$row['id']}'>";
									// 	echo "{$str}|--{$row['name']}";
									// 	echo "</option>";
									// }
									//5.关闭数据库
									$modEdit = new Model("type");
									$a = $modEdit ->order("concat(path,id)")->select();
																	
									foreach($a as $k=>$row){			
											//计算空格
										$m = substr_count("{$row['path']}",",")-1;
										// var_dump($m);die();
										$str = str_repeat("&nbsp;",$m*4);
										//判断是否禁用
										$disabled = ($row['pid']==0)?"disabled":"";
										//输出下拉项
										echo "<option $disabled value='{$row['id']}'>";
										echo "{$str}|--{$row['name']}";
										echo "</option>";
									}
							
								 ?>
							 </select>
						</td>
					</tr>
					<tr>
						<td align="right">商品名称：</td>
						<td><input type="text" name="goods" value="<?php echo $goods['goods']; ?>"></td>
					</tr>
					<tr>
						<td align="right">商品厂家：</td>
						<td><input type="text" name="company" value="<?php echo $goods['company']; ?>"></td>
					</tr>
					<tr>
						<td align="right">商品图片：</td>
						<td><input type="file" name="pic"></td>
					</tr>
					<tr>
						<td align="right">商品单价：</td>
						<td><input type="text" name="price" value="<?php echo $goods['price']; ?>"></td>
					</tr>
					<tr>
						<td align="right">商品存量：</td>
						<td><input type="text" name="store" value="<?php echo $goods['store']; ?>"></td>
					</tr>
					<tr>
						<td align="right">状态：</td>
						<td>
							<input type="radio" name="state" <?php echo ($goods['state']==1)?"checked":"" ?> value="1">新商品
							<input type="radio" name="state" <?php echo ($goods['state']==2)?"checked":"" ?> value="2">在售
							<input type="radio" name="state" <?php echo ($goods['state']==3)?"checked":"" ?> value="3">下架
						</td>
					</tr>
					<tr>
						<td align="right">商品描述：</td>
						<td><textarea cols=	"30" rows="5" name="descr"><?php echo $goods['descr']; ?></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="提交">
							<input type="reset" value="重置">
						</td>
					</tr>
				</form>
			</table>
			<br>
			<img src="../../public/uploads/m_<?php echo $goods['picname'] ?>">
		</center>
	</body>
</html>
