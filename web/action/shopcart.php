<?php session_start(); ?>
<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
		<title>使用session做购物车练习</title>
	</head>
<body>
	<center>
	<?php include("menu.php");//导入导航栏 ?>
	<?php
        //购物车信息处理页
        //根据参数a的值执行对应的操作
        switch($_GET['a']){
            case "add": //添加购物车信息
                //获取要购买的商品（在真实的网站中是从数据库中获取要购买的信息）
                $id=$_POST['id']; //商品id号
                $shop['id']=$_POST['id'];
                $shop['name']=$_POST['name'];
                $shop['price']=$_POST['price'];
                $shop['num']=1; //默认购买量
				//先判断购物车中是否没有要购买的商品
				if(empty($_SESSION['shoplist'][$id])){
					$_SESSION["shoplist"][$id]=$shop; //放入新商品
				}else{
					$_SESSION["shoplist"][$id]['num']+=1; //购买量加1
				}
                echo  "成功放入购物车";
                break;
            case "del": //删除购物车中的商品
                //删除购物车中的商品
				unset($_SESSION['shoplist'][$_GET['id']]);
				echo "成功删除";
                break;
                
            case "clear": //清空购物车商品
				unset($_SESSION['shoplist']);
				echo "成功清空购物车";
                break;
        }
    
    
    ?>
	</center>
	<hr align="center" width="80%">
  </body>
</html>

