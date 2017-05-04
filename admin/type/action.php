<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
        <title>商品类别信息管理</title>
	</head>
	<body>
		<center>
			<h3>商品类别添加</h3>
			<?php 
				//1.导入配置文件
				require("../../public/config.php");
				require("../../public/Model.class.php");
				$mod = new Model("type");
				//4.根据参数a的值执行对应的操作
				switch($_GET['a']){
					case 'insert'://执行添加
						//判断是否成功
						$data = $_POST;
						
						// $data['pid'] = rtrim($data['pid'],",").",";
						$data['path'] = rtrim($data['path'],",").",";
						// var_dump($data);die(); 
						if($mod->insert($data)>0){
							echo "添加成功";
						}else{
							echo "添加失败";
						}	
						break;
					case 'del':
						$id = $_GET['id'];
						//select * from type where path like 
						$map = "path like \"%$id%\"";
						$result = $mod->where($map)->select();
						// var_dump($result);
						// die();
						if(!empty($result)){
							echo "有子分类 不可以删除";
						}else{
							if($mod->del($id)>0){
								echo "删除成功";
								header("Location:index.php");
							}else{
								echo "删除失败";
							}
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
