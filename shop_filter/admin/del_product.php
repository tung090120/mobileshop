<?php
// DELETE PRODUCT
session_start();
include_once("../config/connect.php");

if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
  if (isset($_GET['prd_id'])) {
    $prd_id = $_GET['prd_id'];
    $sql = "DELETE FROM product WHERE prd_id = '$prd_id'";
    $query = mysqli_query($conn, $sql);
    header('location: index.php?page_layout=product');
  }
}
?>
