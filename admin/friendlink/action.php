 <!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8">
		<title>会员信息管理</title>
	</head>
	<body> 
		<center>
			<h3>浏览会员信息</h3>
			<?php 
				//1.导入配置文件 
				require("../../public/config.php");
				require("../../public/Model.class.php");
				//2.实例化Stu表信息操作的对象
				$mod = new Model("friendlink");
				//4.根据参数a的值执行对应操作
				switch($_GET['a']){ 
					case "add"://执行添加
						//执行添加并判断
						$data = $_POST;
						// $data['addtime'] = time();
						// var_dump($data);
						// die();
						if($mod->insert($data)>0){
							echo "添加成功";

						}else{
							echo "添加失败";
						}
						break;
					case "del"://执行删除
						$mod->del($_GET['id']);
						header("Location:index.php");
						break;
					case "update"://执行修改
						//执行修改并判断
						
						// var_dump($_POST);die();
						$data = $_POST;
						// $data['addtime'] = time();
						if($mod->update($data)>0){
							echo "修改成功";
						}else{
							echo "修改失败";
						}
						break;
				}
				

			 ?>
			<br>
		    <br>
		    <a href="#" onClick="javascrip:history.back(-1);">返回上一页</a>
		</center>
	</body>
</html>
