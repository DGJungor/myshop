<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <title>商品类别信息管理</title>
	</head>
	<body>
		<center>
			<h3>商品类别信息管理</h3>
			<table width="900" border="1">
				<tr>
					<th>类别ID</th>
					<th>类别名称</th>
					<th>父类别PID</th>
					<th>PATH路径</th>
					<th>操作</th>
				</tr>
				<?php 
					//1.导入配置文件
					require("../../public/config.php");
					require("../../public/Model.class.php");
					$mod = new Model("type");
					$map = "concat(path,id)";
					$list = $mod->order($map)->select();
					//$sql = "select * from type order by concat(path,id)";
					//5.解析输出
					foreach($list as $row){
						//获取path中的逗号数量 
						$m = substr_count($row['path'],",")-1;
						$nbsp = str_repeat("&nbsp;",$m*4);
						echo "<tr>";
						echo "<td>{$row['id']}</td>";
						echo "<td>{$nbsp}|--{$row['name']}</td>";
						echo "<td>{$row['pid']}</td>";
						echo "<td>{$row['path']}</td>";
						echo "<td><a href='action.php?a=del&id={$row['id']}'>删除</a> <a href='add.php?pid={$row['id']}&path={$row['path']}&name={$row['name']}'>添加子类别</a></td>";
						echo "</tr>";
					}		
				 ?>
			</table>
		</center>
	</body>
</html>
