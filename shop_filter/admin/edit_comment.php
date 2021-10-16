<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	
$comm_id = $_GET["comm_id"];

if (isset($_POST["sbm"])) {
    $comm_details = filter_var($_POST["comm_details"], FILTER_SANITIZE_STRING);
    if (isset($_POST["comm_permission"]))
        $comm_permission = 1;
    else
        $comm_permission = 0;
    $sql = "UPDATE comment SET
            comm_details='$comm_details',
            comm_permission=$comm_permission
        WHERE
            comm_id=$comm_id";
    $query = mysqli_query($conn, $sql);
}

$sql_comm = " SELECT * FROM comment
                INNER JOIN product ON product.prd_id=comment.prd_id
                WHERE comm_id = $comm_id";
$query_comm = mysqli_query($conn, $sql_comm);
$comment = mysqli_fetch_array($query_comm);


?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý bình luận</a></li>
            <li class="active"><?php echo $comment["prd_name"] ?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm: <?php echo $comment["prd_name"] ?></h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <input disabled type="text" name="prd_name" required class="form-control" value="<?php echo $comment["prd_name"] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Người bình luận</label>
                                <input disabled type="text" name="comm_name" required class="form-control" value="<?php echo $comment["comm_name"] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Nội dung bình luận</label>
                                <input type="text" name="comm_details" required class="form-control" value="<?php echo $comment["comm_details"] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Duyệt bình luận</label>
                                <div class="checkbox">
                                    <label>
                                        <input <?php if ($comment["comm_permission"] == 1) echo "checked" ?> name="comm_permission" type="checkbox" value=1>Duyệt
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input disabled type="text" name="comm_mail" required class="form-control" value="<?php echo $comment["comm_mail"] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Thời gian</label>
                                <input disabled type="text" name="prd_name" required class="form-control" value="<?php echo $comment["comm_date"] ?>" placeholder="">
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