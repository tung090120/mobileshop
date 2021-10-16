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
      <li class="active">Danh sách sản phẩm</li>
    </ol>
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Danh sách sản phẩm</h1>
    </div>
  </div>
  <!--/.row-->
  <div id="toolbar" class="btn-group">
    <a href="index.php?page_layout=add_product" class="btn btn-success">
      <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
    </a>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <table data-toolbar="#toolbar" data-toggle="table">

            <thead>
              <tr>
                <th data-field="id" data-sortable="true">ID</th>
                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                <th data-field="price" data-sortable="true">Giá</th>
                <th>Ảnh sản phẩm</th>
                <th>Trạng thái</th>
                <th>Danh mục</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Code phân trang
              $row_per_page = 5;
              $page = 1;
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              }
              $per_row = ($page - 1) * $row_per_page;
              // fetch dữ liệu product từ db
              $sql = "SELECT * FROM product INNER JOIN category ON product.cat_id = category.cat_id ORDER BY prd_id DESC LIMIT $per_row, $row_per_page";
              $query = mysqli_query($conn, $sql);

              while ($product = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td style=""><?php echo $product["prd_id"] ?></td>
                  <td style=""><?php echo $product["prd_name"] ?></td>
                  <td style=""><?php echo $product["prd_price"] ?> vnd</td>
                  <td style="text-align: center"><img width="130" height="180" src="img/products/<?php echo $product["prd_image"] ?>" /></td>

                  <td><span class="label label-<?php echo $product["prd_status"] ?  "success" : "danger" ?>">
                      <?php echo $product["prd_status"] ? "Còn hàng" : "Hết hàng" ?>
                    </span></td>
                  <td><?php echo $product["cat_name"] ?></td>
                  <td class="form-group">
                    <a href="index.php?page_layout=edit_product&prd_id=<?php echo $product['prd_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                    <!-- thẻ button xóa sản phẩm  -->
                    <button type="button" data-toggle="modal" data-target="#Modal<?php echo $product['prd_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>

                    <div class="modal fade " id="Modal<?php echo $product['prd_id'] ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content ">
                          <div class="modal-header">
                            <h5 class="modal-title" style="
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
                            Bạn có chắc chắn muốn xóa sản phẩm <?php echo $product['prd_name'] ?> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="del_product.php?prd_id=<?php echo $product['prd_id'] ?>"><button type="button" class="btn btn-primary">Đồng ý</button></a>
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
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn, $sql);
        $total_products = mysqli_num_rows($query);
        $total_pages = ceil($total_products / $row_per_page);

        $list_pages = ''; // gán thanh phân trang vào 1 biến để có thể gọi dc ở nhiều nơi mà cần đến
        $page_prev = $page == 1 ? 1 : $page - 1;
        $page_next = $page == $total_pages ? $total_pages : $page + 1;
        $list_pages .= $page_prev == 1 ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page=' . $page_prev . '">&laquo;</a></li>';
        for ($page_loop = 1; $page_loop <= $total_pages; $page_loop++) {
          $active = $page_loop == $page ? 'active' : '';
          $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=product&page=' . $page_loop . '">' . $page_loop . '</a></li>';
        }
        $list_pages .= $page_next == $total_pages ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page=' . $page_next . '">&raquo;</a></li>';
        ?>

        <div class="panel-footer">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <!-- render thanh phân trang -->
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