<?php
if (!defined('check')) header('location: index.php');
// nếu chỉ muốn hiện lỗi thì dùng die("lỗi") => chương trình sẽ dừng luôn	
if (isset($_GET['tot_id'])) {
    $tot_id = $_GET['tot_id'];
?>
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home">
                            <use xlink:href="#stroked-home"></use>
                        </svg></a></li>
                <li class="active">Chi tiết đơn hàng</li>
            </ol>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chi tiết đơn hàng</h1>
            </div>
        </div>
        <!--/.row-->
        <div id="toolbar" class="btn-group">
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table data-toolbar="#toolbar" data-toggle="table">
                            <thead>
                                <tr>
                                    <th data-field="id" data-sortable="true">ID</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
<th> ID Don Hang </th>
                                    <th>Tên khách hàng</th>
                                    <th>Số ĐT</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Tổng giá đơn hàng</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $row_per_page = 10;
                                if (isset($_GET["page"])) $page = $_GET["page"];
                                else $page = 1;
                                $per_page = ($page - 1) * $row_per_page;
                                $list_pages = '';
                                $total_pages = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM prd_order ")) / $row_per_page);
                                $page_prev = $page - 1;
                                if ($page_prev <= 0) $page_prev = 1;
                                $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=order&page=' . $page_prev . '">&laquo;</a></li>';
                                for ($i = 1; $i <= $total_pages; $i++)
                                    $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=order&page=' . $i . '">' . $i . '</a></li>';
                                $page_after = $page + 1;
                                if ($page_after > $total_pages) $page_after = $total_pages;
                                $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=order&page=' . $page_after . '">&raquo;</a></li>';

                                // $sql1 = "SELECT * FROM prd_order 
                                //                         INNER JOIN tot_order ON tot_order.tot_id=prd_order.tot_id
                                //                         INNER JOIN product ON prd_order.prd_id=product.prd_id
                                //                        ";
                                // $query1 = mysqli_query($conn, $sql1);
                                $sql = "SELECT * FROM prd_order 
                                                    INNER JOIN tot_order ON tot_order.tot_id=prd_order.tot_id
                                                    INNER JOIN product ON prd_order.prd_id=product.prd_id
                                                    WHERE prd_order.tot_id=$tot_id
                                                    ORDER BY ord_id ASC 
                                                    LIMIT $per_page,$row_per_page";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tr>
                                        <td style=""><?php echo $row["ord_id"] ?></td>
                                        <td style=""><?php echo $row["prd_name"] ?></td>
                                        <td style=""><?php echo $row["amount"] ?></td>
                                        <td style=""><?php echo $row["prd_price"] * $row["amount"] ?></td>
                                        <td style=""><?php echo $row["tot_id"] ?></td>
                                        <td style=""><?php echo $row["cust_name"] ?></td>
                                        <td style=""><?php echo $row["cust_num"] ?></td>
                                        <td style=""><?php echo $row["cust_mail"] ?></td>
                                        <td style=""><?php echo $row["cust_add"] ?></td>
                                        <td style=""><?php echo $row["tot_price"] ?></td>
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
<?php } ?>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
