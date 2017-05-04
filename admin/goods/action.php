<!DOCTYPE html>
<html> 
	<head>
		<meta charset="utf-8">
		<title>商品信息管理</title>
	</head>
	<body>
		<center>
			<h3>商品信息管理</h3>
			<?php 
				date_default_timezone_set("PRC");
				//导入配置文件和函数库文件
				require("../../public/config.php");		
				require("../../public/Model.class.php");
				require("../../public/Image.class.php");
				require("../../public/FileUpload.class.php");
	
				$path = "../../public/uploads/";//存储路径
		
				$mod = new Model("goods");
				$fileUpload = new FileUpload();
				$fileUpload->savePath = "../../public/uploads/";
				$fileUpload->exts = array("image/png","image/gif","image/jpeg");
				$a = $fileUpload->upload();
					
				$img = new Image();

				// $data = $_POST;
				// var_dump($data);die();
				//根据参数a的值执行对应的操作
				switch($_GET['a']){
					case "insert"://执行添加
						$data = $_POST;
						// var_dump($_POST);die();
						if($a == false){
							echo "上传失败".$fileUpload->getError();
						}else{
							//获取上传文件名
							$picname = $fileUpload->savename;							
							$data['picname'] = $fileUpload->savename;							
				
							$img->open($path.$picname);
							$img->thumb(100,100)->save($path."s_".$picname);
							$img->thumb(400,400)->save($path."m_".$picname);
						}
				
						
						$data['state'] = 1;//状态
						$data['num'] = 0;//销售量
						$dara['clicknum'] = 0;//点击量
						$data['addtime'] = time();
						// var_dump($data);die();
						if($mod->insert($data)>0){
							echo "添加成功";
							// var_dump($data);
						}else{
							echo "添加失败";
							@unlink($path.$picname);
							@unlink($path."s_".$picname);
							@unlink($path."m_".$picname);

						}
						break;
					case "del"://数据删除
						//获取信息
						$id = $_GET['id']+0;
						$picname = $_GET['picname'];

						//执行删除
					
						if($mod->del($id)){
							echo "删除成功";
							@unlink($path.$picname);
							@unlink($path."s_".$picname);
							@unlink($path."m_".$picname);
							header("Location:index.php");
						}else{
							echo "删除失败";
						}
						break;
					case "update"://修改操作
						$data=$_POST;
						//判断是否有图片上传
						if($_FILES['pic']['error']!=4){
							if(!$fileUpload->getError()){
								//获取上传文件名
								$picname = $fileUpload->savename;
								$data['picname'] = $fileUpload->savename;
									
								$img->open($path.$picname);
								$img->thumb(100,100)->save($path."s_".$picname);
								$img->thumb(400,400)->save($path."m_".$picname);

							}else{
								die("图片上传失败！原因：".$fileUpload->getError());
							}
						}else{
							$picname = $_POST['oldpicname'];
							$data['picname'] = $_POST['oldpicname'];
						}
						
						// $data = $_POST;
						// var_dump($_POST);die();

						if($mod->update($data)>0){
							//判断有图片上传 (删除原图)
							if($_FILES['pic']['error']==0){
								@unlink($path.$_POST['oldpicname']);
								@unlink($path."s_".$_POST['oldpicname']);
								@unlink($path."m_".$_POST['oldpicname']);
							}
							echo "修改成功";
						}else{ 
							//判断有图片上传 (删除新图)
							if($_FILES['pic']['error']==0){
								@unlink($path.$picname);
								@unlink($path."s_".$picname);
								@unlink($path."m_".$picname);
							}
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
