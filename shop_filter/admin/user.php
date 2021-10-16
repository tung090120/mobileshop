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
      <li class="active">Danh sách thành viên</li>
    </ol>
  </div>
  <!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Danh sách thành viên</h1>
    </div>
  </div>
  <!--/.row-->
  <div id="toolbar" class="btn-group">
    <a href="index.php?page_layout=add_user" class="btn btn-success">
      <i class="glyphicon glyphicon-plus"></i> Thêm thành viên
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
                <th data-field="name" data-sortable="true">Họ & Tên</th>
                <th data-field="price" data-sortable="true">Email</th>
                <th>Quyền</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $row_per_page = 8;
              $page = 1;
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              };
              $per_row = ($page - 1) * $row_per_page;

              // fetch dữ liệu product từ db
              $sql = "SELECT * FROM user LIMIT $per_row, $row_per_page";
              $query = mysqli_query($conn, $sql);

              while ($user = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td style=""><?php echo $user['user_id'] ?></td>
                  <td style=""><?php echo $user['user_full'] ?></td>
                  <td style=""><?php echo $user['user_mail'] ?></td>
                  <td>
                    <span class="label label-<?php echo $user['user_level'] == 1 ? "danger" : "warning" ?>">
                      <?php echo $user['user_level'] == 1 ? "Admin" : "Member" ?>
                    </span>
                  </td>
                  <td class="form-group">
                    <a href="index.php?page_layout=edit_user&user_id=<?php echo $user['user_id'] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                    <button type="button" data-toggle="modal" data-target="#Modal<?php echo $user['user_id'] ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                    <div class="modal fade" id="Modal<?php echo $user['user_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            bạn có chắc chắn muốn xóa người dùng <?php echo $user['user_full'] ?> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                            <a href="del_user.php?user_id=<?php echo $user['user_id'] ?>"><button type="button" class="btn btn-primary">Đồng ý</button></a>
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
        $sql = "SELECT * FROM user";
        $query = mysqli_query($conn, $sql);
        $total_users = mysqli_num_rows($query);
        $total_pages = ceil($total_users / $row_per_page);

        $list_pages = '';
        $page_prev = $page == 1 ? 1 : $page - 1;
        $page_next = $page == $total_pages ? $total_pages : $page + 1;
        $list_pages .= $page == 1 ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_prev . '">&laquo;</a></li>';
        for ($page_loop = 1; $page_loop <= $total_pages; $page_loop++) {
          $active = $page_loop == $page ? 'active' : '';
          $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=user&page=' . $page_loop . '">' . $page_loop . '</a></li>';
        }
        $list_pages .= $page == $total_pages ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=user&page=' . $page_next . '">&raquo;</a></li>';
        ?>

        <div class="panel-footer">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?php echo $list_pages ?>
              <!-- <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li> -->
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