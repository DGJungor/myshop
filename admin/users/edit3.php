<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改会员信息</title>
<?php 	require("../../public/Model.class.php");
		require("../../public/config.php");

?>
</head>
<body>
	<center>
		<?php
			//获取被修改的会员信息的id
				$id = $_GET['id']+0;

				$tableName = "users";

				$e_mod = new Model($tableName);
				$user = $e_mod->find($id);

				// var_dump($user);

		?>
	
		<h3>修改会员信息</h3>
			<form action="action.php?a=update" method="post">
			<input type="hidden" name="id" value="<?php echo $user['id']; ?>">
				<table width="500" border="0">					
					<tr>
						<td align="right">帐号：</td>
						<td><input type="text" name="username" value="<?php echo $user['username']; ?>"></td>
					</tr>
					<tr>
						<td align="right">真实姓名：</td>
						<td><input type="text" name="name" value="<?php echo $user['name']; ?>"></td>
					</tr>
					<tr>
						<td align="right">密码：</td>
						<td><input type="text" name="pass" value="<?php echo $user['pass']; ?>"></td>
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
						<td><input type="text" name="address" value="<?php echo $user['address']; ?>"></td>
					</tr>
					
					<tr>
						<td align="right">邮编：</td>
						<td><input type="text" name="code" value="<?php echo $user['code']; ?>"></td>
					</tr>
					<tr>
						<td align="right">电话：</td>
						<td><input type="text" name="phone" value="<?php echo $user['phone']; ?>"></td>
					</tr>
					<tr>
						<td align="right">邮箱：</td>
						<td><input type="text" name="email" value="<?php echo $user['email']; ?>"></td>
					</tr>
					<tr>
						<td align="right" value="<?php echo $user['state']; ?>">状态：</td>
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
