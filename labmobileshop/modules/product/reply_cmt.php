<?php
session_start();
include_once("../../config/connect.php");
ob_start();
if (isset($_POST['sbm']) && isset($_GET['comm_id'])) {
  $prd_id = $_GET['prd_id'];
  $rep_comm_id = $_GET['comm_id'];
  $comm_details = $_POST['rep-cmt-value'];
  $comm_mail = $_POST['rep_mail'];
  $comm_name = $_POST['rep_name'];
  date_default_timezone_set('asia/Ho_Chi_Minh');
  $comm_date = date("Y-m-d H:i:s");

  include_once("./check_comment.php"); //file xóa từ cấm

  $sql = "INSERT INTO comment (rep_comm_id,comm_date,comm_details,comm_mail,comm_name,prd_id) 
    VALUES ($rep_comm_id,'$comm_date','$comm_details','$comm_mail','$comm_name',$prd_id)";
  mysqli_query($conn, $sql);
  header("location: ../../index.php?page_layout=product&prd_id=".$prd_id);
}
?>
