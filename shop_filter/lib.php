<?php

session_start();

session_destroy(); // vẫn cho phiên cũ chạy 

echo $_SESSION['email'].'<br/>'.$_SESSION['pass'];

?>