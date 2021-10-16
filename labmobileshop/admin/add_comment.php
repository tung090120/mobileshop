<?php
session_start();
    include_once("../config/connect.php");

    if(isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
        $comm_id=$_GET["comm_id"];
        $sql = "UPDATE comment
                SET comm_permission = 1
                WHERE comm_id='$comm_id'";
        mysqli_query($conn,$sql);   
        header("location: index.php?page_layout=comment&page=".$_GET["page"]);
    }
    else
        header("location:index.php");

?>