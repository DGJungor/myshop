<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="../include/css/css.css" type="text/css" rel="stylesheet" />
<link href="../include/css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="../include/images/main/favicon.ico" />
<style>
body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
#searchmain{ font-size:12px;}
#search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
#search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
#search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
#search form input.text-but{height:24px; line-height:24px; width:55px; background:url(../include/images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
#search a.add{ background:url(../include/images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
#search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
#main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
#main-tab th{ font-size:12px; background:url(../include/images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
#main-tab td{ font-size:12px; line-height:40px;}
#main-tab td a{ font-size:12px; color:#548fc9;}
#main-tab td a:hover{color:#565656; text-decoration:underline;}
.bordertop{ border-top:1px solid #ebebeb}
.borderright{ border-right:1px solid #ebebeb}
.borderbottom{ border-bottom:1px solid #ebebeb}
.borderleft{ border-left:1px solid #ebebeb}
.gray{ color:#dbdbdb;}
td.fenye{ padding:10px 0 0 0; text-align:right;}
.bggray{ background:#f9f9f9}
</style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
  <tr>
    <td width="99%" align="left" valign="top">您的位置：订单管理&nbsp;&nbsp;>&nbsp;&nbsp;浏览订单信息</td>
  </tr>
  <tr>
    <td align="left" valign="top">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
  		<tr>
   		 <td width="90%" align="left" valign="middle">
	         <form method="post" action="">
	         <span>管理员：</span>
	         <input type="text" name="" value="" class="text-word">
	         <input name="" type="button" value="查询" class="text-but">
	         </form>
         </td>
  		  <td width="10%" align="center" valign="middle" style="text-align:right; width:150px;"><a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">新增管理员</a></td>
  		</tr>
	</table>
    </td>
  </tr>
  <tr>
    <td align="left" valign="top">
    
    <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
      <tr>
        <th align="center" valign="middle" class="borderright">ID</th>
        <th align="center" valign="middle" class="borderright">会员ID号</th>
        <th align="center" valign="middle" class="borderright">联系人</th>
        <th align="center" valign="middle" class="borderright">地址</th>
        <th align="center" valign="middle" class="borderright">邮编</th>
        <th align="center" valign="middle" class="borderright">电话</th>
        <th align="center" valign="middle" class="borderright">购买时间</th>
        <th align="center" valign="middle" class="borderright">总金额</th>
        <th align="center" valign="middle" class="borderright">状态</th>
        <th align="center" valign="middle">操作</th>
      </tr>
 
<?php 
  date_default_timezone_set("PRC");
  
  //定义状态
  $status = [0=>"新订单",1=>"已发货",2=>"已收货",3=>"无效订单"];
  //1.导入配置文件
  require("../../public/config.php");
  require("../../public/Model.class.php");
   require("../../public/Page.class.php");
                
   $mod = new Model("orders");
  // $a = $mod->select();
  
   $total = $mod->total();
   $page = new Page($total,7);

    $list = $mod->limit($page->limit())->select();


  $i = 0;
  foreach($list as $row){
    $i++;
    if($i%2==0){
      echo "<tr onMouseOut=\"this.style.backgroundColor='#ffffff'\" onMouseOver=\"this.style.backgroundColor='#edf5ff'\">";
    }else{
      echo "<tr onMouseOut=\"this.style.backgroundColor='#f9f9f9'\" onMouseOver=\"this.style.backgroundColor='#edf5ff'\">";
        
    }

    echo "<td align='center' valign='middle' class='borderright borderbottom'>{$row['id']}</td>";
    echo "<td align='center' valign='middle' class='borderright borderbottom'>{$row['uid']}</td>";
    echo "<td align='center' valign='middle' class='borderright borderbottom'>{$row['linkman']}</td>";
     echo "<td align='center' valign='middle' class='borderright borderbottom'>{$row['address']}</td>";
    echo "<td align='center' valign='middle' class='borderright borderbottom'>{$row['code']}</td>";
    echo "<td align='center' valign='middle' class='borderright borderbottom'>{$row['phone']}</td>";
    echo "<td align='center' valign='middle' class='borderright borderbottom'>".date("Y-m-d H:i:s",$row['addtime'])."</td>";
    echo "<td align='center' valign='middle' class='borderright borderbottom'>{$row['total']}</td>";
    echo "<td align='center' valign='middle' class='borderright borderbottom'>{$status[$row['status']]}</td>";
  
   echo "<td align='center' valign='middle' class='borderbottom'><a a href='show.php?id={$row['orderid']}' target='mainFrame' onFocus='this.blur()' class='add'>详情</a><span class='gray'>&nbsp;"."|"."&nbsp;</span><a a href='edit.php?id={$row['id']}' target='mainFrame' onFocus='this.blur()' class='add'>编辑</a><span class='gray'>&nbsp;"."|"."&nbsp;</span><a href='action.php?a=del&id={$row['id']}' target='mainFrame' onFocus='this.blur()' class='add'>删除</a></td>";
    echo "</tr>";
  }

?>  
  
    </table></td>
    </tr>
<!--   <tr>
    <td align="left" valign="top" class="fenye">11 条数据 1/1 页&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">首页</a>&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">上一页</a>&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">下一页</a>&nbsp;&nbsp;<a href="#" target="mainFrame" onFocus="this.blur()">尾页</a></td>

  </tr> -->
    <?php
    
    echo " <td align='left' valign='top' class='fenye'>";
    $a = $page->show();
    echo $a;
    echo "<td>";


    ?> 
</table>
 
</body>
</html>
