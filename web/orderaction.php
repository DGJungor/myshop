<?php
  session_start();
  require("../public/config.php");
  require("../public/Model.class.php");
  require("../public/Page.class.php");
                
$mod = new Model("orders");
// var_dump($_POST);
$orderid = $_POST['status'];
$odid = $_POST['id'];
// var_dump($odid);die();
switch($_GET['a']){
           	case "0":  
            		
             	  header("Location:./order.php?a=1");
                break;
            case "1":  
            		$newstu = "2";
             	    $sql = "update orders set status={$newstu} where orderid={$orderid}";
                    $a = $mod->update3($sql);
             	   // var_dump($_SESSION['search']);
             	   header("Location:./order.php");
                break;
            case "2":  
            	 $mod->del($odid);
            	 header("Location:./order.php");
                break;
            case "3":  
            	// header("Location:./order.php");	
                break;
            }
?>
  
