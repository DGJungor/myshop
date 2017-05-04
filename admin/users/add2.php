

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加会员信息</title>
	<?php require("../../public/config.php"); ?>
</head>
<body> 
	<center>


		<h3>添加会员信息</h3>
			<form action="action.php?a=add" method="post">
				<table width="500" border="0">					
					<tr>
						<td align="right">帐号：</td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td align="right">真实姓名：</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td align="right">密码：</td>
						<td><input type="text" name="pass"></td>
					</tr>
					<tr>
						<td align="right">性别：</td>
						<td>
							<input type="radio" name="sex" value="1">男
							<input type="radio" name="sex" value="2">女
						</td>
					</tr>
					<tr>
						<td align="right">地址：</td>
						<td><input type="text" name="address"></td>
					</tr>
					
					<tr>
						<td align="right">邮编：</td>
						<td><input type="text" name="code"></td>
					</tr>
					<tr>
						<td align="right">电话：</td>
						<td><input type="text" name="phon"></td>
					</tr>
					<tr>
						<td align="right">邮箱：</td>
						<td><input type="text" name="email"></td>
					</tr>
					<tr>
						<td align="right">状态：</td>
						<td>
							<input type="radio" name="state" value="1">启用
							<input type="radio" name="state" value="2">禁用
							<input type="radio" name="state" value="0">管理员
						</td>
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
