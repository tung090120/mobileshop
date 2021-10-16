<?php
if (!defined('check')) header('location: index.php')
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vietpro Mobile Shop - Administrator</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Vietpro</span>Shop</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Admin <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user">
										<use xlink:href="#stroked-male-user"></use>
									</svg> Hồ sơ</a></li>
							<li><a href="logout.php"><svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use>
									</svg> Đăng xuất</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="active"><a href="?page_layout=index"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Dashboard</a></li>
			<li><a href="?page_layout=user"><svg class="glyph stroked male user ">
						<use xlink:href="#stroked-male-user" /></svg>Quản lý thành viên</a></li>
			<li><a href="?page_layout=category"><svg class="glyph stroked open folder">
						<use xlink:href="#stroked-open-folder" /></svg>Quản lý danh mục</a></li>
			<li><a href="?page_layout=product"><svg class="glyph stroked bag">
						<use xlink:href="#stroked-bag"></use>
					</svg>Quản lý sản phẩm</a></li>
			<li><a href="?page_layout=comment"><svg class="glyph stroked two messages">
						<use xlink:href="#stroked-two-messages" /></svg> Quản lý bình luận</a></li>
			<li><a href="?page_layout=banned_word"><svg class="glyph stroked chain">
						<use xlink:href="#stroked-chain" /></svg> Quản lý từ cấm</a></li>
			<li><a href="?page_layout=order"><svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-line-graph"></use></svg></svg> Quản lý đơn hàng</a></li>
			<li><a href="?page_layout=setting"><svg class="glyph stroked gear">
						<use xlink:href="#stroked-gear" /></svg> Cấu hình</a></li>
		</ul>

	</div>
	<!--/.sidebar-->


	<?php
	if (isset($_GET['page_layout']))
		switch ($_GET['page_layout']) {
				// Product
			case "product":
				include_once('product.php');
				break;
			case "add_product":
				include_once('add_product.php');
				break;
			case "edit_product":
				include_once('edit_product.php');
				break;
				// Category
			case "category":
				include_once('category.php');
				break;
			case "add_category":
				include_once('add_category.php');
				break;
			case "edit_category":
				include_once('edit_category.php');
				break;
				// User
			case "user":
				include_once('user.php');
				break;
			case "add_user":
				include_once('add_user.php');
				break;
			case "edit_user":
				include_once('edit_user.php');
				break;
				// comment
			case "comment":
				include_once('comment.php');
			break;
			case "edit_comment":
				include_once('edit_comment.php');
			break;
			case "banned_word":
				include_once('banned_word.php');
			case "order":
				include_once('order.php');
			case "order_details":
				include_once('order_details.php');
			
			default:
				include_once('dashboard.php');
		} else include_once('dashboard.php');
	?>
</body>

</html>
<script>VNPT{xss_feat_sqli_so_dangerous}</script>
