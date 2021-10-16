<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	

// GET INFO PRODUCT
if (isset($_GET['prd_id'])) {
    $prd_id = $_GET['prd_id'];
    $sql_prd = "SELECT * FROM product WHERE prd_id = '$prd_id'";
    $query_prd = mysqli_query($conn, $sql_prd);
    $prd = mysqli_fetch_array($query_prd);
}

// UPDATE PRODUCT
if (isset($_POST["sbm"])) {
    //basic
    $prd_name = filter_var($_POST['prd_name'], FILTER_SANITIZE_STRING);
    $prd_price = filter_var($_POST['prd_price'], FILTER_SANITIZE_STRING);
    $prd_warranty = filter_var($_POST['prd_warranty'], FILTER_SANITIZE_STRING);
    $prd_accessories = filter_var($_POST['prd_accessories'], FILTER_SANITIZE_STRING);
    $prd_promotion = filter_var($_POST['prd_promotion'], FILTER_SANITIZE_STRING);
    $prd_new = filter_var($_POST['prd_new'], FILTER_SANITIZE_STRING);

    //get image product
    $prd_image = $_FILES['prd_image']['name'];
    if ($prd_image !== '') { // nếu ko cập nhật ảnh khác
        echo $tmp_name = $_FILES['prd_image']['tmp_name'];
        move_uploaded_file($tmp_name, 'img/products/' . $prd_image);
    } else $prd_image = $prd['prd_image']; // nếu admin thay đổi image product

    $cat_id = filter_var($_POST['cat_id'], FILTER_SANITIZE_STRING);
    $prd_status = filter_var($_POST['prd_status'], FILTER_SANITIZE_STRING);

    // get value check box
    if (isset($_POST['prd_featured'])) {
        $prd_featured = $_POST['prd_featured'];
    } else {
        $prd_featured = 0;
    }

    $prd_details = filter_var($_POST['prd_details'], FILTER_SANITIZE_STRING);

    $sql = "UPDATE product SET
            prd_name = '$prd_name', 
            prd_price =  '$prd_price',
            prd_warranty = '$prd_warranty',
            prd_accessories = '$prd_accessories',
            prd_promotion = '$prd_promotion',
            prd_new = '$prd_new',
            prd_image = '$prd_image',
            cat_id = $cat_id,
            prd_status = $prd_status,
            prd_featured = $prd_featured,
            prd_details = '$prd_details'
            WHERE prd_id = $prd_id
        ";

    $query = mysqli_query($conn, $sql);

    header('location: index.php?page_layout=product');
}
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li><a href="">Quản lý sản phẩm</a></li>
            <li class="active"><?php echo $prd['prd_name'] ?></li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Sản phẩm: <?php echo $prd['prd_name'] ?></h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="prd_name" required class="form-control" value="<?php echo $prd['prd_name'] ?>" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type="number" name="prd_price" required value=<?php echo $prd['prd_price'] ?> class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Bảo hành</label>
                                <input type="text" name="prd_warranty" required value="<?php echo $prd['prd_warranty'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phụ kiện</label>
                                <input type="text" name="prd_accessories" required value="<?php echo $prd['prd_accessories'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Khuyến mãi</label>
                                <input type="text" name="prd_promotion" required value="<?php echo $prd['prd_promotion'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <input type="text" name="prd_new" required value="<?php echo $prd['prd_new'] ?>" type="text" class="form-control">
                            </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" name="prd_image">
                            <br>
                            <div>
                                <img width="160" src="img/products/<?php echo $prd['prd_image'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="cat_id" class="form-control">
                                <?php
                                $sql_cat = 'SELECT * FROM CATEGORY ORDER BY cat_id ASC';
                                $query_cat = mysqli_query($conn, $sql_cat);
                                while ($category = mysqli_fetch_array($query_cat)) {
                                ?>
                                    <option <?php echo $category['cat_id'] === $prd['cat_id'] ? 'selected' : '' ?> value=<?php echo $category['cat_id'] ?>>
                                        <?php echo $category['cat_name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="prd_status" class="form-control">
                                <option <?php echo $prd['prd_status'] == 1 ? 'selected' : '' ?> value=1>Còn hàng</option>
                                <option <?php echo $prd['prd_status'] == 0 ? 'selected' : '' ?> value=0>Hết hàng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sản phẩm nổi bật</label>
                            <div class="checkbox">
                                <label>
                                    <input <?php echo $prd['prd_featured'] === '1' ? 'checked' : '' ?> name="prd_featured" type="checkbox" value=1>Nổi bật
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mô tả sản phẩm</label>
                            <textarea name="prd_details" required class="form-control" rows="3"><?php echo $prd['prd_details'] ?></textarea>
                            <script>
                                CKEDITOR.replace("prd_details");
                            </script>
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