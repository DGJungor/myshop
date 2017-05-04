<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <title>商品类别信息管理</title>
	</head>
	<body>
		<?php 
			//处理传递过来的参数
			$pid = 0;
			$path = '0,';
			$name = "根类别";
			//判断
			if(isset($_GET['pid']) && isset($_GET['path'])){//判断是不是传递过来的值
				$pid = $_GET['pid'];
				$path = $_GET['path'].$pid.",";
				$name = $_GET['name'];
			}
		 ?>
		<center>
			<h3>商品类别添加</h3>
			<form action="action.php?a=insert" method="post">
				<input type="hidden" name="pid" value="<?php echo $pid; ?>">
				<input type="hidden" name="path" value="<?php echo $path; ?>">
				父别名：<?php echo $name; ?><br><br>
				类别名：<input type="text" name="name"><br><br>
				<input type="submit" value="添加">
				<input type="reset" value="重置">
			</form>
		</center>
	</body>
</html>