<?php
ob_start();
// ob_start này sẽ giúp ta đặt thoải mái session_start, header vào bất cứ chỗ nào chứ ko bắt buộc ở trên cùng, ko dc dưới html code và print
session_start();
include_once("config/connect.php");
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Homeee</title>
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/home.css" />
  <link rel="stylesheet" href="css/cart.css" />
  <link rel="stylesheet" href="css/category.css" />
  <link rel="stylesheet" href="css/product.css" />
  <link rel="stylesheet" href="css/search.css" />
  <link rel="stylesheet" href="css/success.css" />
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.js"></script>
</head>

<body>
  <!--	Header	-->
  <div id="header">
    <div class="container">
      <div class="row">
        <?php
        include_once("modules/logo/logo.php");
        include_once("modules/search/search_box.php");
        include_once("modules/cart/cart_notify.php");
        ?>
      </div>
    </div>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  <!--	End Header	-->

  <!--	Body	-->
  <div id="body">
    <div class="container" style="background-color: #c8d1e0; padding-bottom: 20px">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <?php include_once("modules/menu/menu.php") ?>
        </div>
      </div>
      <?php include_once("modules/slide/slide.php") ?>
      <div class="row">
        <div id="main" class="col-lg-8 col-md-12 col-sm-12">
          <!--	Slider	-->
         
          <!--	End Slider	-->

          <?php
          if (isset($_GET['page_layout'])) {
            switch ($_GET['page_layout']) {
              case "cart_add":
                include_once("modules/cart/cart_add.php");
                break;
              case "cart":
                include_once('modules/cart/cart.php');
                break;
              case "category":
                include_once('modules/menu/category.php');
                break;
              case "product":
                include_once('modules/product/product.php');
                break;
              case "search":
                include_once('modules/search/search.php');
                break;
              case "success":
                include_once('modules/cart/success.php');
                break;
              case "review":
                include_once('modules/product/review.php');
                break;
                case "help":
                  include_once('modules/help/help.php');
                  break;
              default:
                include_once('modules/product/feature.php');
                include_once('modules/product/lastest.php');
            }
          } elseif (isset($_GET['view'])) {

            function containsStr($str, $substr)
            {
              return strpos($str, $substr) !== false;
            }
            $ext = isset($_GET["ext"]) ? $_GET["ext"] : '.php';
            if (isset($_GET['view'])) {
              if (containsStr($_GET['view'], 'help_detail')) {

                include $_GET['view'] . $ext;
              } 
              
              
              else {
                echo "<br><br><div class=\"alert alert-danger\"> <h3>Only 'help_detail' is allowed !</h3> </div>";
              }
            }
          }else {
            include_once('modules/product/feature.php');
            include_once('modules/product/lastest.php');
          }
          ?>

        </div>
        <!-- SideBar -->
        <div id="sidebar" class="col-lg-4 col-md-12 col-sm-12">
          <?php include_once("modules/banner/banner.php") ?>
        </div>
        </>
      </div>
    </div>
    <!--	End Body	-->

    <div id="footer-top" style="
    border-top: 10px solid #5290c0;
    ">
      <div class="container">
        <div class="row">
          <?php
          include_once("modules/logo/logo_footer.php");
          include_once("modules/address/address.php");
          include_once("modules/service/service.php");
          include_once("modules/hotline/hotline.php");
          ?>
        </div>
      </div>
    </div>

    <!--	Footer	-->
    <?php include_once("modules/footer/footer.php") ?>
    <!--	End Footer	-->
</body>

</html>