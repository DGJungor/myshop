<?php

//分页类

class Page
{
	//成员属性  
	public $page;        //当前页
	public $pageSize;    //页大小
	public $maxRows;     //数据总条数
	public $maxPage;     //总页数

	//实例化分页类自动调用的构造方法  俩个参数 总条数和页大小
	public function __construct($total,$pageSize=10)
	{
		$this->maxRows = $total;//赋值的总条数
		//每页多少条数据
		$this->pageSize = $pageSize;
		//判断当前页
		$this->page = isset($_GET['p'])?$_GET['p']:1;

		//new这个对象时候自动调用的方法
		$this->getMaxPage();
		$this->checkPage();
	}

	//计算总页数
	private function getMaxPage()
	{
		//总条数/页大小=进一取整法()
		$this->maxPage = ceil($this->maxRows/$this->pageSize);
	}

	//判断当前页的有效性
	private function checkPage()
	{
		//判断当前页如果大于最大页数 应该等于最大页数
		if($this->page > $this->maxPage){
			$this->page = $this->maxPage;
		}

		//如果小于1让他等于1
		if($this->page<1){
			$this->page = 1;
		}
	}

	//获取分页limit子句
	public function limit()
	{
		//公式 （当前页-1）*页大小,页大小
		return (($this->page-1)*$this->pageSize).",".$this->pageSize;
	}

	//输出页码
	public function show()
	{
		//获取当前页面地址
		$url = $_SERVER["PHP_SELF"];
		$info = "<div>";
		$info .= " 当前{$this->page}/{$this->maxPage}页 共计{$this->maxRows}条";
		$info .= " <a href='{$url}?p=1'>首页</a>";
		$info .= " <a href='{$url}?p=".($this->page-1)."'>上一页</a>";
		$info .= " <a href='{$url}?p=".($this->page+1)."'>下一页</a>";
		$info .= " <a href='{$url}?p={$this->maxPage}'>末页</a>";
		$info .= "</div>";
		return $info;
	}
}