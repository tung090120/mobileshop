<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	

// get data category with cat_id
if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];
    $sql = "SELECT * FROM category WHERE cat_id = $cat_id";
    $query = mysqli_query($conn, $sql);
    $category = mysqli_fetch_array($query);

    // edit category
    $err = FALSE;
    if (isset($_POST['sbm'])) {
        $cat_name = filter_var($_POST['cat_name'], FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM category WHERE cat_name = '$cat_name'";
        $query = mysqli_query($conn, $sql);
        // if tên category ko bị trùng
        if (!mysqli_num_rows($query)) {
            mysqli_query($conn, "UPDATE category SET cat_name = '$cat_name' WHERE cat_id = $cat_id");
            header('location: index.php?page_layout=category');
        } else {
            $err = TRUE;
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
            <li><a href="">Quản lý danh mục</a></li>
            <li class="active"><?php echo $category['cat_name'] ?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh mục: <?php echo $category['cat_name'] ?></h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <?php if ($err) echo ' <div class="alert alert-danger">Danh mục đã tồn tại !</div>' ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <input type="text" name="cat_name" required value="<?php echo $category['cat_name'] ?>" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div><!-- /.col-->
    </div>
    <!--/.main-->