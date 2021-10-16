<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE user_id = $user_id"));

    // edit user
    $err = FALSE;
    if (isset($_POST['sbm'])) {
        $user_full = filter_var($_POST['user_full'], FILTER_SANITIZE_STRING);
        $user_mail = filter_var($_POST['user_mail'], FILTER_SANITIZE_STRING);
        $user_pass = filter_var($_POST['user_pass'], FILTER_SANITIZE_STRING);
        $user_re_pass = filter_var($_POST['user_re_pass'], FILTER_SANITIZE_STRING);
        $user_level = filter_var($_POST['user_level'], FILTER_SANITIZE_STRING);

        // check email đã tồn tại hay chưa
        $queryCheckMail = mysqli_query($conn, "SELECT * FROM user WHERE user_mail = '$user_mail'");
        // if đã tồn tại email - nếu số email trùng  == 1 thì là chính mail hiện tại của user
        if (mysqli_num_rows($queryCheckMail) > 1) $err = TRUE;
        else {
            $user_pass = password_hash($_POST["user_pass"], PASSWORD_BCRYPT);
            // insert new user
            $sql = "UPDATE user 
            SET user_full = '$user_full',
            user_mail = '$user_mail',
            user_pass = '$user_pass',
            user_level = $user_level
            WHERE user_id = $user_id";
            mysqli_query($conn, $sql);

            header("location: index.php?page_layout=user");
        }
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
            <li class="active">Nguyễn Văn A</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thành viên: Nguyễn Văn A</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <?php if ($err) echo '<div class="alert alert-danger">Email đã tồn tại, Mật khẩu không khớp !</div>' ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Họ & Tên</label>
                                <input type="text" name="user_full" required class="form-control" value="<?php echo $user['user_full'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="user_mail" required value="<?php echo $user['user_mail'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" name="user_pass" value="<?php echo $user['user_pass'] ?>" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" name="user_re_pass" value="<?php echo $user['user_pass'] ?>" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Quyền</label>
                                <select name="user_level" class="form-control">
                                    <option value=1 <?php echo $user['user_level'] == 1 ? "selected" : "" ?>>Admin</option>
                                    <option value=2 <?php echo $user['user_level'] == 2 ? "selected" : "" ?>>Member</option>
                                </select>
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->

</div>
<!--/.main-->