<?php
  session_start();
  if(isset($_GET['prd_id'])) {
    $prd_id = $_GET['prd_id'];
    if(!isset($_SESSION['cart'][$prd_id])) {
      $_SESSION['cart'][$prd_id] = 1;
    } else {
      $_SESSION['cart'][$prd_id] ++;
    }
  }
  header("location: ../../index.php?page_layout=cart");
?>