<script src="ckeditor/ckeditor.js"></script>

<?php
// include file connect mysql - connect ở file index để ko cần connect thủ công trong nhiều file
include_once('../config/connect.php');

session_start();
define('check', TRUE); // defind const để kiểm tra xem user có vào file index chưa => nếu chưa thì chuyển về trang login
// vì admin.php và login.php được gọi trong index.php => chỉ cần khai báo session ở trang index là dc;
if (isset($_SESSION['mail']) && isset($_SESSION['pass'])) { // kiểm tra tồn tại 2 session ko => phải dùng isset chứ ko kiếm tra biến không dc
    // kiểm tra xem có quyền ko
    include_once('admin.php');
} else {
    include_once('login.php');
}
?>