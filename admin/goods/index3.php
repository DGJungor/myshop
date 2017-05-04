<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
			<h3>浏览商品信息</h3>
			<table width="95%" border="1">
				<tr>
					<th>ID</th>
					<th>商品名称</th>
					<th>类别</th>
					<th>图片</th>
					<th>单价</th>
					<th>库存量</th>
					<th>销售量</th>
					<th>点击量</th>
					<th>状态</th>
					<th>添加时间</th>
					<th>操作</th>
				</tr>
				<?php 
					date_default_timezone_set("PRC");
					//定义状态
					$state = [1=>"新商品",2=>"在售",3=>"下架"];
					//1.导入配置文件
					require("../../public/config.php");
					require("../../public/Model.class.php");
				
				
                    $mod = new Model("goods");
                    $a = $mod->select();
                    foreach($a as $k=>$row){
                    	echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$row['goods']}</td>";
						echo "<td>{$row['typeid']}</td>";
						echo "<td><img src='../../public/uploads/s_{$row['picname']}'>";
						// var_dump($row['picname']);
						echo "</td>";
						echo "<td>{$row['price']}</td>";
						echo "<td>{$row['store']}</td>";
						echo "<td>{$row['num']}</td>";
						echo "<td>{$row['clicknum']}</td>";
						echo "<td>{$state[$row['state']]}</td>";
						echo "<td>".date("Y-m-d H:i:s",$row['addtime'])."</td>";
						echo "<td><a href='action.php?a=del&id={$row['id']}&picname={$row['picname']}'>删除</a> <a href='edit.php?id={$row['id']}'>修改</a></td>";
						echo "</tr>";
						
                    }
				 ?>
			</table>
		</center>
	</body>
</html>
