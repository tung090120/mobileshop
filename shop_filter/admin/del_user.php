<?php

// delete user if url have query string user_id
session_start();
include_once("../config/connect.php");

if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
  if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $sql = "DELETE FROM user WHERE user_id = '$user_id'";
    $query = mysqli_query($conn, $sql);
    header('location: index.php?page_layout=user');
  }
}
?>