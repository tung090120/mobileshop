<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn

$err = 0;
if (isset($_POST['sbm'])) {
    $user_full = filter_var($_POST['user_full'], FILTER_SANITIZE_STRING);
    $user_mail = filter_var($_POST['user_mail'], FILTER_SANITIZE_STRING);
    $user_pass = filter_var($_POST['user_pass'], FILTER_SANITIZE_STRING);
    $user_re_pass = filter_var($_POST['user_re_pass'], FILTER_SANITIZE_STRING);
    $user_level = $_POST['user_level'];

    // check email đã tồn tại hay chưa
    $queryCheckMail = mysqli_query($conn, "SELECT * FROM user WHERE user_mail = '$user_mail'");
    // if đã tồn tại email
    if (mysqli_num_rows($queryCheckMail)) $err = 1;
    else if ($user_pass !== $user_re_pass) $err = 2;
    else {
        $user_pass = password_hash($_POST["user_pass"], PASSWORD_BCRYPT);
        // insert new user
        $sql = "INSERT INTO user (user_full,user_mail,user_pass,user_level) 
       VALUES ('$user_full','$user_mail','$user_pass','$user_level')";
        mysqli_query($conn, $sql);

        header("location: index.php?page_layout=user");
    }
}

?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý thành viên</a></li>
            <li class="active">Thêm thành viên</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm thành viên</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <?php if ($err == 1) echo '<div class="alert alert-danger">Email đã tồn tại !</div>' ?>
                        <?php if ($err == 2) echo '<div class="alert alert-danger">Nhập lại mật khẩu không khớp !</div>' ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Họ & Tên</label>
                                <input name="user_full" required class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="user_mail" required type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="user_pass" required type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input name="user_re_pass" required type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="user_level" class="form-control">
                                    <option value=1>Admin</option>
                                    <option value=2>Member</option>
                                </select>
                            </div>
                            <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->