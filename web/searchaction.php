<?php
	session_start();
  require("../public/config.php");
  require("../public/Model.class.php");
  require("../public/Page.class.php");
                
$name = $_POST;
// $name = "2017";
var_dump($name); 
$gd = array();
// die(); 
$mod = new Model("goods");
switch($_GET['a']){
            case "search":  
            $sql= "select * from goods where goods like '%".$name['name']."%'";
             	   $goods = $mod->select_like($sql);
             	   // var_dump($goods);die();
             	   $_SESSION['search'] = $goods;
             	   // var_dump($_SESSION['search']);
             	   header("Location:./shop_list.php?a=search");
                break;
            }
?>
  
