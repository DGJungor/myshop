<?php
    session_start();    
    if(empty($_SESSION['adminuser'])){
        header("Location:login.php");       
     }
     error_reporting(0);
       // var_dump($_SESSION);
     ?>
    
<!DOCTYPE html>
<html>
 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

        <title>个人资料</title>

        <link href="AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
        <link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

        <link href="css/personal.css" rel="stylesheet" type="text/css">
        <link href="css/infstyle.css" rel="stylesheet" type="text/css">
        <script src="AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
            
    </head>

    <body>
        <!--头 -->
        <header>
            <article>
                <div class="mt-logo">
                    <!--顶部导航条 -->
                    <?php require"./include/top.php";?>


                        <!--悬浮搜索框-->
                        <?php require"./include/search.php";?>

                       <!--  <div class="nav white">
                            <div class="logoBig">
                                <li><img src="images/logobig.png" /></li>
                            </div>

                            <div class="search-bar pr">
                                <a name="index_none_header_sysc" href="#"></a>
                                <form>
                                    <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                                    <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                                </form>
                            </div>
                        </div> -->

                        <div class="clear"></div>
                    </div>
                </div>
            </article>
        </header>
         <center>

        <?php require("../public/Model.class.php");
            require("../public/config.php");
            // require("../public/Model.php");


        ?>


    <?php

        $mod = new Model("orders");
        $mod_d = new Model("detail");
        $mod_gd = new Model("goods");

        $store = array();

        $orderid = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        
        $data = array(); 
        // $detail = array();
        
if(empty($_SESSION['adminuser']['address'])||empty($_SESSION['adminuser']['phone'])||empty($_SESSION['adminuser']['name'])){
            echo "联系方式不全,请先填写联系方式";
            echo "<br>";
            echo "<br>";
            echo "<a href=\"./information.php\" >个人中心</a>";
}else{

        $data['uid'] = $_SESSION['adminuser']['id'];
        $data['linkman'] = $_SESSION['adminuser']['name'];
        $data['address'] = $_SESSION['adminuser']['address'];
        $data['code'] = $_SESSION['adminuser']['code'];
        $data['phone'] = $_SESSION['adminuser']['phone'];
        $data['addtime'] = time();
        $data['total'] = $_SESSION['total'];
        $data['status'] = 0;
        $data['orderid'] =  $orderid;

        
        // var_dump($data);die();
 
         // die();
         switch($_GET['a']){
            case "buy": 
                 if($mod->insert($data)>0){
                        
                         // var_dump($cc);die();
                        foreach($_SESSION['shoplist'] as $row){
                                    $detail['orderid'] = $orderid;
                                    $detail['goodsid'] = $row['id'];
                                    $detail['name'] = $row['name'];
                                    $detail['price'] = $row['price'];
                                    $detail['num'] = $row['num'];
                                   // var_dump($detail);                                   
                                    $mod_d->insert($detail);
                                    $goods = $mod_gd->where("id={$detail['goodsid']}")->select(); 
                                    // var_dump($goods);die();
                                    $goods['0']['store'] = ($goods['0']['store'] - $detail['num']);
                                    $goods['0']['num'] = ($goods['num'] + $detail['num']);
                                    // var_dump($goods['0']['store']); die();
                                    // $data =  $goods['0'];
                                    // var_dump($data);die();
                                    $sql = "update goods set num={$goods['0']['num']},store={$goods['0']['store']} where id={$goods['0']['id']}";
                                    $a = $mod_gd->update3($sql);
                                    // var_dump($a);
                                    
                                }
                                // $mod_d->insert($detail);
                            echo "下单成功";
                            unset($_SESSION['shoplist']);
                            unset($_SESSION['shopnum']);

                        }else{
                            echo "下单失败";
                        }
                        break;


            break;
        }
}
    ?>
    <br>
    <br>
    <!-- <a href="#" onClick="javascrip:history.back(-1);">返回上一页</a><br><br> -->
    <a href="./index.php" >返回首页</a>


        </center>                




            <?php require "./include/footer.php";?> 
    </body>
</html>


