<?php session_start(); ?>


<?php
    // session_start();    
    // if(empty($_SESSION['adminuser'])){
    //     header("Location:index.php");       
    //  }
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

                        <div class="nav white">
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
                        </div>

                        <div class="clear"></div>
                    </div>
                </div>
            </article>
        </header>
         <center>

        <?php require("../public/Model.class.php");
            require("../public/config.php");

          ?>


    <?php
        //购物车信息处理页
        //根据参数a的值执行对应的操作
        switch($_GET['a']){
            case "add": //添加购物车信息
                //获取要购买的商品（在真实的网站中是从数据库中获取要购买的信息）
                // $a = $_POST;
                // var_dump($a);die();

                 
                $id=$_POST['id']; //商品id号

                $tableName = "goods"; 
                $mod = new Model($tableName);
                $goods = $mod->where("id={$id}")->select();

                $shop['id']=$goods['0']['id'];
                $shop['name']=$goods['0']['goods'];
                $shop['price']=$goods['0']['price'];
                $shop['picname'] = $goods['0']['picname'];
               // var_dump($goods);die();
                
                $shop['num']=1; //默认购买量
                $shop['num'] = ltrim($_POST['addnum'],"-");
                if($shop['num']>$goods['0']['store']){
                    $shop['num'] = $goods['0']['store'];
                    echo "超过库存量, 购买数量改为最大库存量";

                }
                //先判断购物车中是否没有要购买的商品
                if(empty($_SESSION['shoplist'][$id])){
                    $_SESSION["shoplist"][$id]=$shop; //放入新商品
                }else{
                    $_SESSION["shoplist"][$id]['num']+=$shop['num']; //购买量加1
                }
                echo "<br>";
                echo  "成功放入购物车";
                break;
            case "update":
                 $id=$_POST['id'];
                 $num =  ltrim($_POST['num'],"-");
                 $_SESSION["shoplist"][$id]['num'] = $num;
                 // var_dump($_SESSION["shoplist"][$id]['num']);die();
                 if($_SESSION["shoplist"][$id]['num'] == 0){
                    unset($_SESSION['shoplist'][$id]);
                 }
                 header("Location:./shopcart.php");
                break;
            case "del": //删除购物车中的商品
                //删除购物车中的商品
                unset($_SESSION['shoplist'][$_GET['id']]);
                echo "成功删除";
                break;
                
            case "clear": //清空购物车商品
                unset($_SESSION['shoplist']);
                echo "成功清空购物车";
                break;
            // case "buynow":
                
            //     break;

        }
         $_SESSION['shopnum'] = count($_SESSION['shoplist']);
    ?>
    <br>
    <br>
    <a href="#" onClick="javascrip:history.back(-1);">返回上一页</a>


        </center>                




            <?php require "./include/footer.php";?> 
    </body>
</html>
<?php
    // var_dump($_SESSION['shoplist']);

?>


