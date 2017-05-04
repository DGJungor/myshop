<?php
session_start();//开启session会话
//导入配置文件
require("../../public/config.php");
require("../../public/Model.class.php");
require("../../public/Code.class.php");
$mod = new Model("users");
// var_dump($mod);exit();
//根据参数a的值执行对象的操作
switch($_GET['a']){	
	case 'dologin'://执行登录
		//效验验证码
		// var_dump($_POST['code']);
		// var_dump($_SESSION['code']);
		// exit(); 
		$code = $_POST['code'];
		// if(!$mycode->check($code)){
		// 	header("Location:login.php?eno=1");
		// 	die();
		// }

		//获取登录信息
		$uname = $_POST['username'];
		$upass = $_POST['pass'];
		// var_dump($uname);
		// var_dump($upass);
		
		
		//$sql = "select * from users where username={$uname}";
		//var_dump($mod->select());exit();
		// $map = "username='".$uname."'";
		$map = "username='".$uname."'";
		$result = $mod->where($map)->select();
		// var_dump($result);exit();
		//判断是否获取登录个人信息
		if($result){
			// var_dump($result);exit();
			//$user = mysqli_fetch_assoc($result);//解析结果集
			// var_dump($user);
			if($result[0]['pass']==$upass){
				//登录成功 将登录成功的人信息放入session里面
				// var_dump($result[0]);die();
				if($result[0]['state']==0){
					$_SESSION['adminuser'] = $result[0];
					header("Location:../index.html");
				}else{
					header("Location:index.php?eno=4");
				}
				
			}else{
				header("Location:index.php?eno=3");
			}
		}else{
			header("Location:index.php?eno=2");
		}
		break;
	case 'logout'://执行退出
		unset($_SESSION['adminuser']);//移除登录信息
		header("Location:index.php");
		break;
}
