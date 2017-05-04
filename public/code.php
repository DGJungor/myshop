<?php
//验证码
session_start();

$length = 4;//验证码的长度
$code = getCode($length,1);//通过自定义函数获取随机的验证啊
$_SESSION['code'] = $code;
$height = 28;//高度
$width = 25*$length;//宽度


//1.创建画布 准备颜色
$im = imagecreatetruecolor($width,$height);//创建真彩画布
$bg = imagecolorallocate($im,255,255,255);//分配颜色

//2.开始绘画
imagefill($im,0,0,$bg);//填充背景

//绘制验证码
for($i=0;$i<$length;$i++){
	$cc = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagettftext($im,30,rand(-20,20),0+$i*25,30,$cc,"./simhei.ttf",$code[$i]);
}

//添加干扰线
for($i=0;$i<10;$i++){
	$c1 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imageline($im,rand(0,$width),rand(0,$height),rand(0,$width),rand(0,$height),$c1);
}

//添加干扰点
for($i=0;$i<50;$i++){
	$c2 = imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	imagesetpixel($im,rand(0,$width),rand(0,$height),$c2);
}

//3.输出图像
header("content-Type:image/png");
imagepng($im);
//4.释放资源
imagedestroy($im);












/**
*定义一个函数：随机获取验证码值
*@param int $length 验证码的长度 默认4
*@param int $type 验证码的类型 默认是1(纯数字)  2为数字加小写字母 3为其他
*@return string 返回一个所需验证码
*/
function getCode($length=4,$type=1)
{
	$str = "0123456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	//获取验证码随机的长度
	$m = strlen($str)-1;
	if($type==1){
		$m = 9;
	}elseif($type==2){
		$m = 33;
	}

	//开始随机获取验证码
	$code = "";//初始化存放验证码的变量
	for($i=0;$i<$length;$i++){
		$code .= $str[rand(0,$m)];
	}
	return $code;
}

