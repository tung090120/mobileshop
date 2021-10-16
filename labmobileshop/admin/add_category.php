<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	

$err = FALSE;
if (isset($_POST['sbm'])) {
	$cat_name = $_POST['cat_name'];
	$sql = "SELECT * FROM category WHERE cat_name = '$cat_name'";
	$query = mysqli_query($conn, $sql);
	// if tên category ko bị trùng
	if (!mysqli_num_rows($query)) {
		mysqli_query($conn, "INSERT INTO category (cat_name) VALUES ('$cat_name')");
		header('location: index.php?page_layout=category');
	} else {
		$err = TRUE;
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
			<li class="active">Thêm danh mục</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Thêm danh mục</h1>
		</div>
	</div>
	<!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="col-md-8">
						<?php if ($err) { ?>
							<div class="alert alert-danger">Danh mục đã tồn tại !</div>
						<?php } ?>
						<form role="form" method="post">
							<div class="form-group">
								<label>Tên danh mục:</label>
								<input required type="text" name="cat_name" class="form-control" placeholder="Tên danh mục...">
							</div>
							<button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
							<button type="reset" class="btn btn-default">Làm mới</button>
					</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
	<!--/.main-->