<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Quản lý danh mục</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<!--/.row-->
	<div id="toolbar" class="btn-group">
		<a href="index.php?page_layout=add_category" class="btn btn-success">
			<i class="glyphicon glyphicon-plus"></i> Thêm danh mục
		</a>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table data-toolbar="#toolbar" data-toggle="table">

						<thead>
							<tr>
								<th data-field="id" data-sortable="true">ID</th>
								<th>Tên danh mục</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// fetch dữ liệu category từ db
							$row_per_page = 10;
							$page = 1;
							if (isset($_GET['page'])) {
								$page = $_GET['page'];
							}
							$per_row = ($page - 1) * $row_per_page;
							$sql = "SELECT * FROM category ORDER BY cat_id LIMIT $per_row,$row_per_page";
							$query = mysqli_query($conn, $sql);

							while ($category = mysqli_fetch_array($query)) { ?>
								<tr>
									<td style=""><?php echo $category["cat_id"] ?></td>
									<td style=""><?php echo $category["cat_name"] ?></td>
									<td class="form-group">
										<a href="index.php?page_layout=edit_category&cat_id=<?php echo $category['cat_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
										<button type="button" data-toggle="modal" data-target="#Modal<?php echo $category['cat_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
										<div class="modal fade" id="Modal<?php echo $category['cat_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLabel" style="
                                                        display: inline;
                                                        font-size:large;
                                                        font-weight:bolder;
														">
															Xác nhận
														</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														bạn có chắc chắn muốn xóa danh mục <?php echo $category['cat_name'] ?> ?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
														<a href="del_category.php?cat_id=<?php echo $category['cat_id'] ?>"><button type="button" class="btn btn-primary">Đồng ý</button></a>
													</div>
												</div>
											</div>
										</div>
									</td>
								</tr>
							<?php } ?>

						</tbody>
					</table>
				</div>

				<?php
				// Thanh phân trang
				$sql = "SELECT * FROM category";
				$query = mysqli_query($conn, $sql);
				$total_products = mysqli_num_rows($query);
				$total_pages = ceil($total_products / $row_per_page);

				$list_pages = ''; // gán thanh phân trang vào 1 biến để có thể gọi dc ở nhiều nơi mà cần đến
				$page_prev = $page == 1 ? 1 : $page - 1;
				$page_next = $page == $total_pages ? $total_pages : $page + 1;
				$list_pages .= $page == 1 ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&page=' . $page_prev . '">&laquo;</a></li>';
				for ($page_loop = 1; $page_loop <= $total_pages; $page_loop++) {
					$active = $page_loop == $page ? 'active' : '';
					$list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=category&page=' . $page_loop . '">' . $page_loop . '</a></li>';
				}
				$list_pages .= $page == $total_pages ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&page=' . $page_next . '">&raquo;</a></li>';
				?>

				<div class="panel-footer">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php echo $list_pages ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!--/.row-->
</div>
<!--/.main-->

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>