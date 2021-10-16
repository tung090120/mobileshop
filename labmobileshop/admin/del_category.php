<?php
  session_start();
  include_once("../config/connect.php");

  if(isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    if (isset($_GET['cat_id'])) {
      $cat_id = $_GET['cat_id'];
      $sql = "DELETE FROM category WHERE cat_id = '$cat_id'";
      $query = mysqli_query($conn, $sql);
      header('location: index.php?page_layout=category');
    }
  }
?>