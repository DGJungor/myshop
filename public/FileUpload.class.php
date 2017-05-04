<?php

//文件上传类

class FileUpload
{
	public $savePath;//文件保存路径
	public $maxSize;//允许你文件上传最大值 默认0表示不限
	public $exts = array();//允许上传文件类型
	public $upfile = array();//被上传文件的基本信息
	public $savename;//上传成功后的文件名
	public $error;//上传文件的错误信息

	//构造方法
	public function __construct()
	{
		//获取上传文件信息  初始化
		$this->upfile = array_shift($_FILES);
	}

	//判断上传错误号
	private function checkError()
	{
		if($this->upfile['error']>0){
		    switch($this->upfile['error']){
		        case 1: $info = "上传的文件超过了php.ini的配置"; break;
		        case 2: $info = "上传文件的大小超过了HTML表单配置"; break;
		        case 3: $info = "文件只有部分被上传"; break;
		        case 4: $info = "没有文件被上传"; break;
		        case 6: $info = "找不到临时文件夹"; break;
		        case 7: $info = "文件写入失败"; break;
		        default: $info = "未知错误！"; break;
		    }
		    $this->error = $info;
	        return false;//失败信息返回假
		}
		return true;//>0返回真
	}

	//判断过滤文件上传类型
	private function checkType()
	{
		if(count($this->exts)>0){//如果这个数组大于0说明需要判断 如果不大于0说明是个空数组 不限制
	    //判断类型是否不在typelist中(如果在类型中就过去不执行 如果不在就执行die)
		    if(!in_array($this->upfile['type'],$this->exts)){
		       $this->error = "上传文件类型不符！";
	           return false;
		    }
		}
		return true;
	}


	//判断过滤文件上传大小
	private function checkSize()
	{
		if($this->maxSize>0 && $this->upfile['size']>$this->maxSize){
		    $this->error = "文件大小超出允许范围！"; 
	        return false;
		}
		return true;
	}

	//获取错误信息
	public function getError()
	{
		return $this->error;
	}

	//随机上传文件名
	private function getName()
	{
		$ext = pathinfo($this->upfile['name'],PATHINFO_EXTENSION);//获取上传文件的后缀名
		do{
		    $this->savename = date("YmdHis").rand(1000,9999).".".$ext; //组装随机文件名
		}while(file_exists($this->savePath.$this->savename)); //判断新文件是否存在
		return true;
	}

	//执行上传的方法
	public function upload()
	{
		//处理上传路径
		$this->savePath = rtrim($this->savePath,"/")."/";
		//执行上传处理
		if($this->checkError() && $this->checkType() && $this->checkSize() && $this->getName()){//代表上传成功
			// 判断并执行文件上传
			if(is_uploaded_file($this->upfile['tmp_name'])){
			    //执行上传文件移动
			    if(move_uploaded_file($this->upfile['tmp_name'],$this->savePath.$this->savename)){
			        return true;//表示上传成功
			    }else{
			        $this->error = "移动上传文件失败！";
			    }
			}else{
			    $this->error = "不是有效的上传文件";
			}
		}
		return false;
	}
}

/*
//使用
//实例化
$upfile = new FileUpload();
$upfile->savePath = "./uploads";//保存路径
$upfile->maxSize = 0;//文件上传大小不限
$upfile->exts = array("image/jpeg","image/png","image/gif");//设置类型
//执行上传
$b = $upfile->upload();

//处理结果
if(!$b){
	echo "上传失败！原因：".$upfile->getError();
}else{
	echo "上传成功！文件名：".$upfile->savename;
}
*/
