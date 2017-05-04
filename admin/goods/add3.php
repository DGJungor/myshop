<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
			<h3>添加商品信息</h3>
			<form action="action.php?a=insert" method="post" enctype="multipart/form-data">
				<table width="400" border="0">
					<tr>
						<td align="right">商品类别：</td>
						<td>
							<select name="typeid">
								<?php 
									//1.导入配置文件
									require("../../public/config.php");
									require("../../public/Model.class.php");
								
									
									$mod = new Model("type");
									$a = $mod->order("concat(path,id)")->select();
																	
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
						<td><input type="text" name="goods"></td>
					</tr>
					<tr>
						<td align="right">商品厂家：</td>
						<td><input type="text" name="company"></td>
					</tr>
					<tr>
						<td align="right">商品图片：</td>
						<td><input type="file" name="pic"></td>
					</tr>
					<tr>
						<td align="right">商品单价：</td>
						<td><input type="text" name="price"></td>
					</tr>
					<tr>
						<td align="right">商品存量：</td>
						<td><input type="text" name="store"></td>
					</tr>
					<tr>
						<td align="right">商品描述：</td>
						<td><textarea cols=	"30" rows="5" name="descr"></textarea></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value="提交">
							<input type="reset" value="重置">
						</td>
					</tr>
				</table>
 
			</form>
		</center>
	</body>
</html>
