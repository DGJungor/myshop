<?php
  session_start();
  $state = array("0"=>"超级管理员","1"=>"用户","2"=>"禁用");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="images/main/member.gif" width="44" height="44" /></div>
    <span>用户：<?php echo $_SESSION['adminuser']['name']; ?><br>角色：<?php echo $state[$_SESSION['adminuser']['state']] ?></span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
      <div class="collapsed">
        <span>系统设置</span>
        <a href="main.php" target="mainFrame" onFocus="this.blur()">后台首页</a>
      <!--   <a href="main_list.php" target="mainFrame" onFocus="this.blur()">列表页</a>
        <a href="main_info.php" target="mainFrame" onFocus="this.blur()">列表详细页</a>
        <a href="main_message.php" target="mainFrame" onFocus="this.blur()">留言页</a>
        <a href="main_menu.php" target="mainFrame" onFocus="this.blur()">栏目管理</a> -->
      </div>
      <div>
        <span>会员管理</span>
        <a href="../users/index.php" target="mainFrame" onFocus="this.blur()">浏览会员信息</a>
        <a href="../users/add.php" target="mainFrame" onFocus="this.blur()">添加会员信息</a>
        <!-- <a href="main_info.html" target="mainFrame" onFocus="this.blur()">角色管理</a>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">自定义权限</a> -->
      </div> 
      <div>
        <span>商品类别设置</span>
        <a href="../type/index.php" target="mainFrame" onFocus="this.blur()">浏览商品类别</a>
        <a href="../type/addSingle.php" target="mainFrame" onFocus="this.blur()">添加商品类别</a>
  <!--       <a href="main_info.html" target="mainFrame" onFocus="this.blur()">角色管理</a>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">自定义权限</a> -->
      </div>
      <div>
        <span>订单管理</span>
        <a href="../orders/index.php" target="mainFrame" onFocus="this.blur()">浏览订单信息</a>
      </div>
      <div> 
        <span>商品管理</span>
        <a href="../goods/index.php" target="mainFrame" onFocus="this.blur()">浏览商品信息</a>
        <a href="../goods/add.php" target="mainFrame" onFocus="this.blur()">添加商品</a>
   <!--      <a href="main/" target="mainFrame" onFocus="this.blur()">自定义权限</a> -->
      </div>
      <div>
        <span>友情连接管理</span>
        <a href="../friendlink/index.php" target="mainFrame" onFocus="this.blur()">浏览友情连接信息</a>
        <a href="../friendlink/add.php" target="mainFrame" onFocus="this.blur()">添加友情连接</a>
       <!--  <a href="main_info.html" target="mainFrame" onFocus="this.blur()">角色管理</a>
        <a href="main.html" target="mainFrame" onFocus="this.blur()">自定义权限</a> -->
      </div>
    </div>
</body>
</html>
