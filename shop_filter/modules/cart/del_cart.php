<?php
  session_start();
  if(isset($_GET['prd_id'])) {
    $prd_id = $_GET['prd_id'];
    unset($_SESSION['cart'][$prd_id]);
    if(count($_SESSION['cart']) <= 0) { 
      // nếu đã xóa hết phần tử trong cart thì xóa session cart luôn để tránh bị lỗi query vì mảng rỗng
      unset($_SESSION['cart']);
    }
    header('location: ../../index.php?page_layout=cart');
  }

?>