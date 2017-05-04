<?php
//公共函数库文件
/**
 * 文件上传处理函数
 *@param array $upfile 被上传的文件信息，如$_FILES['pic']
 *@param string $path 上传存储路径
 *@param array $typelist 允许上传文件类型，默认值为array()表示不受限制
 *       如图片：array("image/jpeg","image/png","image/gif");
 *@param int $maxsize 允许上传大小限制，默认0表示不限制
 *@return array 返回两个单元的关联式数组，
 *        1. 下标为error的值为true表示成功，false表示失败
 *        2. 下标为info的值表示上传成功为文件名，失败为错误信息。
 */

function fileUpload($upfile,$path,$typelist=array(),$maxsize=0)
{
	//1. 定义上传处理时所需变量信息
	$path = rtrim($path,"/")."/";
	$res = ['error'=>false,'info'=>'失败信息'];
	//2. 判断上传错误号
	if($upfile['error']>0){
	    switch($upfile['error']){
	        case 1: $info = "上传的文件超过了php.ini的配置"; break;
	        case 2: $info = "上传文件的大小超过了HTML表单配置"; break;
	        case 3: $info = "文件只有部分被上传"; break;
	        case 4: $info = "没有文件被上传"; break;
	        case 6: $info = "找不到临时文件夹"; break;
	        case 7: $info = "文件写入失败"; break;
	        default: $info = "未知错误！"; break;
	    }
	    $res['info'] = $info;
        return $res;
	}

	//3. 判断过滤上传文件类型
	if(count($typelist)>0){//如果这个数组大于0说明需要判断 如果不大于0说明是个空数组 不限制
	    //判断类型是否不在typelist中(如果在类型中就过去不执行 如果不在就执行die)
	    if(!in_array($upfile['type'],$typelist)){
	       $res['info'] = "上传文件类型不符！".$upfile['type'];
           return $res;
	    }
	}

	//4. 判断过滤上传文件大小
	if($maxsize>0 && $upfile['size']>$maxsize){
	    $res['info'] = "文件大小超出允许范围！"; 
        return $res;
	}

	//5. 随机上传文件名
	$ext = pathinfo($upfile['name'],PATHINFO_EXTENSION);//获取上传文件的后缀名
	do{
	    $newfile = date("YmdHis").rand(1000,9999).".".$ext; //组装随机文件名
	}while(file_exists($path.$newfile)); //判断新文件是否存在

	//6. 判断并执行文件上传
	if(is_uploaded_file($upfile['tmp_name'])){
	    //执行上传文件移动
	    if(move_uploaded_file($upfile['tmp_name'],$path.$newfile)){
	        $res['info'] = $newfile;
	        $res['error'] = true;//表示上传成功
	    }else{
	        $res['info'] = "移动上传文件失败！";
	    }
	}else{
	    $res['info'] = "不是有效的上传文件";
	}

	return $res;
}



/**
 *自定义一个图片等比缩放函数
 *@param string $picname 被缩放图片名
 *@param string $path 被缩放图片路径
 *@param int $maxWidth 图片被缩放后的最大宽度
 *@param int $maxHeight 图片被缩放后的最大高度
 *@param string $pre 缩放后的图片名前缀，默认为"s_"
 *@return boolen 返回布尔值表示成功与否。
 */
function imageResize($picname,$path,$maxWidth,$maxHeight,$pre="s_"){
    $path = rtrim($path,"/")."/";
    //1获取被缩放的图片信息
    $info = getimagesize($path.$picname);
    //获取图片的宽和高
    $width = $info[0];
    $height = $info[1];
    
    //2根据图片类型，使用对应的函数创建画布源。
    switch($info[2]){
        case 1: //gif格式
            $srcim = imagecreatefromgif($path.$picname);
            break;
        case 2: //jpeg格式
            $srcim = imagecreatefromjpeg($path.$picname);
            break;
        case 3: //png格式
            $srcim = imagecreatefrompng($path.$picname);
            break;
       default:
            return false;
            //die("无效的图片格式");
            break;
    }
    //3. 计算缩放后的图片尺寸
    if($maxWidth/$width<$maxHeight/$height){
        $w = $maxWidth;
        $h = ($maxWidth/$width)*$height;
    }else{
        $w = ($maxHeight/$height)*$width;
        $h = $maxHeight;
    }
    //4. 创建目标画布
    $dstim = imagecreatetruecolor($w,$h); 

    //5. 开始绘画(进行图片缩放)
    imagecopyresampled($dstim,$srcim,0,0,0,0,$w,$h,$width,$height);

    //6. 输出图像另存为
    switch($info[2]){
        case 1: //gif格式
            imagegif($dstim,$path.$pre.$picname);
            break;
        case 2: //jpeg格式
            imagejpeg($dstim,$path.$pre.$picname);
            break;
        case 3: //png格式
            imagepng($dstim,$path.$pre.$picname);
            break;
    }
    

    //7. 释放资源
    imagedestroy($dstim);
    imagedestroy($srcim);
    
    return true;
}