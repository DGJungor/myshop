<?php 
$mycode = new Code();
//定义一个验证码类
	class Code{ 
		//验证码配置参数
		protected $config = array(
			'bg'        =>  array(243, 251, 254),  // 背景颜色
			'width'		=>	120,  	//画布宽
			'height'	=>	40,		//画布高	
			'length'	=>	4,		//字体长度
			// 'fontstyle'	=>	'./class/font/MSYHBD.TTF',	//验证码字体
			'fontstyle'	=>	'./msyh.ttf',	//验证码字体
			'fontsize'	=>	20,		//字体大小
			'noise'		=>	false,	//是否干扰点
			'line'		=>	false,	//是否干扰线
			'text'		=>  false,	//是否干扰文字
				);
		//存储画布
		protected $img;
		//存储分配的颜色
		protected $bgcolor;
		//干扰线信息
		protected $str = array('~','~','~','~','~','~','~','~','~','~','~','~','~','!','@','#','$','%','^','&','*','(',',',')','_','+','.',',','[',']',':','<','>',',');
		//用于存储打乱的验证码
		protected $list; 
		// 用于存储生成的验证码
		protected $code = ''; 
		
		//构造方法
		public function __construct($config = array())
		{ 
			//如果用户有配置，将用户配置和系统默认的合并
			$this->config = array_merge($this->config,$config);
		}

		//魔术方法，动态获取配置信息
		public function __get($key){ 
			return $this->config[$key];
		}

	 	//魔术方法，动态设置验证码配置
	    public function __set($key,$value){
	        if(isset($this->config[$key])) {
	            $this->config[$key]    =   $value;
	        }
	    }

		//用于显示验证码的方法
		public function entry()
		{ 	
			// 创建画布
			$this->img = imagecreatetruecolor($this->width,$this->height);
			
			// 分配颜色
			$this->bgcolor = imagecolorallocate($this->img,$this->bg[0],$this->bg[1],$this->bg[2]);
			
			//填充
			imagefill($this->img,0,0,$this->bgcolor);

			//准备验证码
			$code_small =  range('a','z');	//随机验证码小写字母
			$code_big   =  range('A','Z');	//随机验证码大写字母
			$code_num   =  range(0,9);		//随机验证码数组
			
			//判断是否干扰线
			if($this->line) $this->line();
			//判断是否干扰点
			if($this->noise) $this->noise();
			//判断是否干扰文字
			if($this->text) $this->text();
			
			// 将验证码合并成一个数组
			$this->list = array_merge($code_small,$code_big,$code_num);
			// 随机打乱验证码数组
			shuffle($this->list);
			for($i = 0; $i < $this->length; $i++){
				$fontcolor = imagecolorallocate($this->img,mt_rand(0,150),mt_rand(0,150),mt_rand(0,150));
				imagettftext($this->img, $this->fontsize,mt_rand(-40,40),(($i * $this->fontsize) +  ($this->width - ($this->length  * $this->fontsize)) / 2),(($this->height - $this->fontsize) / 2) + $this->fontsize,$fontcolor,$this->fontstyle,$this->list[$i]);
			//将验证码保存起来
			$this->code .= $this->list[$i];
			}
			//将验证码存入session
			session_start();
			// $_SESSION['Code'] = md5($this->code);
			$_SESSION['Code'] = $this->code;
			header('content-type:image/jpeg');
			imagejpeg($this->img);
			imagedestroy($this->img); 
		} 

		//干扰线
		protected function line()
		{ 
			for($k = 0;$k < 8;$k++){ 
				$lincolor = imagecolorallocate($this->img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
				imageline($this->img,mt_rand(0,110),mt_rand(0,35),mt_rand(0,110),mt_rand(0,35),$lincolor);
			}
		}

		//干扰点
		protected function noise()
		{ 
			for($j = 0;$j < 300;$j++){ 
				$pixelcolor = imagecolorallocate($this->img,mt_rand(0,35),mt_rand(0,35),mt_rand(0,35));
				imagesetpixel($this->img,mt_rand(0,110),mt_rand(0,35),$pixelcolor);
			}
		}

		//干扰字符
		protected function text()
		{ 
			for($i = 0; $i < count($this->str); $i++){
			$fontcolor = imagecolorallocate($this->img,mt_rand(0,35),mt_rand(0,35),mt_rand(0,35));
			imagettftext($this->img,8,mt_rand(0,360),mt_rand(0,$this->width),mt_rand(0,$this->height),$fontcolor,$this->fontstyle,$this->str[$i]);
			}
		}

		//用于验证验证码是否正确的方法
		public function check($Code)
		{ 
			if(strtolower($Code) == strtolower($_SESSION['Code'])) { 
				return true;
			} else { 
				return false;
			}
		}
	}

if($_GET['b']){
	$mycode->entry();
}