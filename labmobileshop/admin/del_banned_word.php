<?php
session_start();
    include_once("../config/connect.php");

    if(isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
        $ban_id=$_GET["ban_id"];
        $sql = "DELETE FROM banned_word
                WHERE ban_id = $ban_id";
        mysqli_query($conn,$sql);   
        header("location: index.php?page_layout=banned_word&page=".$_GET["page"]);
    }
    else
        header("location:index.php");

?>