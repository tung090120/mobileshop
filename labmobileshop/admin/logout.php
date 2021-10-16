<?php
if (!defined('check')) header('location: index.php')
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	
?>

<?php
session_start();

if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
    unset($_SESSION['mail']);
    unset($_SESSION['pass']);

    header('location: index.php');
} else {
    die('Bạn chưa đăng nhập ! <a href="index.php">Login</a>');
}

?>