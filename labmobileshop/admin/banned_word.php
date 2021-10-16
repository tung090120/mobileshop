<?php
if (!defined('check')) header('location: index.php')
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Quản lý từ cấm</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý từ cấm</h1>
		</div>
	</div>
	<!--/.row-->
	<form id="toolbar" class="form-inline" method="post">
		<label class="">Thêm từ cấm:</label>
		<div class="form-group">
			<input name="ban_word" type="text" class="form-control" placeholder="Từ cấm">
		</div>
		<button name="sbm" type="submit" class="btn btn-primary ">Thêm</button>
	</form>


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table data-toolbar="#toolbar" data-toggle="table">

						<thead>
							<tr>
								<th data-field="id" data-sortable="true">ID</th>
								<th>Từ cấm</th>
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_POST["sbm"])) {
								$ban_word = $_POST["ban_word"];
								$sql = "INSERT INTO banned_word (ban_word)
                                                        VALUES ('$ban_word')";
								$query = mysqli_query($conn, $sql);
							}

							$row_per_page = 10;
							if (isset($_GET["page"])) $page = $_GET["page"];
							else $page = 1;
							$per_page = ($page - 1) * $row_per_page;

							$list_pages = '';
							$total_pages = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM banned_word ")) / $row_per_page);

							$page_prev = $page - 1;
							if ($page_prev <= 0) $page_prev = 1;
							$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=banned_word&page=' . $page_prev . '">&laquo;</a></li>';

							for ($i = 1; $i <= $total_pages; $i++)
								$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=banned_word&page=' . $i . '">' . $i . '</a></li>';

							$page_after = $page + 1;
							if ($page_after > $total_pages) $page_after = $total_pages;
							$list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=banned_word&page=' . $page_after . '">&raquo;</a></li>';

							$sql = "SELECT * FROM banned_word ORDER BY ban_id ASC LIMIT $per_page,$row_per_page";
							$query = mysqli_query($conn, $sql);

							while ($banned_word = mysqli_fetch_array($query)) {
							?>
								<tr>
									<td style=""><?php echo $banned_word["ban_id"] ?></td>
									<td style=""><?php echo $banned_word["ban_word"] ?></td>
									<td class="form-group">
										<a href="del_banned_word.php?ban_id=<?php echo $banned_word['ban_id'] ?>&page=<?php echo $page ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="panel-footer">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<?php echo $list_pages; ?>
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