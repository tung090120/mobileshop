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
            <li class="active">Quản lý bình luận</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý bình luận</h1>
        </div>
    </div>
    <!--/.row-->
    <?php
    if (isset($_GET["comm_permission"]))
        $comm_permission = $_GET['comm_permission'];
    else
        $comm_permission = 0;
    ?>
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=comment&comm_permission=<?php echo $comm_permission == 0 ? 1 : 0 ?>" class="btn btn-success">
            <i class="glyphicon glyphicon-refresh"></i> <?php if ($comm_permission == 0) echo "Xem bình luận đã duyệt";
                                                        else echo "Xem bình luận chưa duyệt" ?>
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
                                <th>Sản phẩm</th>
                                <th>Người bình luận</th>
                                <th>Nội dung bình luận</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $row_per_page = 10;
                            if (isset($_GET["page"])) $page = $_GET["page"];
                            else $page = 1;
                            $per_page = ($page - 1) * $row_per_page;

                            $list_pages = '';
                            $total_pages = ceil(mysqli_num_rows(mysqli_query($conn, "SELECT * FROM comment WHERE comm_permission=$comm_permission ")) / $row_per_page);

                            $page_prev = $page - 1;
                            if ($page_prev <= 0) $page_prev = 1;
                            $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page=' . $page_prev . '">&laquo;</a></li>';

                            for ($i = 1; $i <= $total_pages; $i++)
                                $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page=' . $i . '">' . $i . '</a></li>';

                            $page_after = $page + 1;
                            if ($page_after > $total_pages) $page_after = $total_pages;
                            $list_pages .= '<li class="page-item"><a class="page-link" href="index.php?page_layout=comment&page=' . $page_after . '">&raquo;</a></li>';

                            $sql = "SELECT * FROM comment 
                                                    INNER JOIN product ON product.prd_id=comment.prd_id
                                                    WHERE comm_permission=$comm_permission
                                                    ORDER BY comm_id ASC 
                                                    LIMIT $per_page,$row_per_page";
                            $query = mysqli_query($conn, $sql);

                            while ($comment = mysqli_fetch_array($query)) {
                            ?>
                                <tr>
                                    <td style=""><?php echo $comment["comm_id"] ?></td>
                                    <td style=""><?php echo $comment["prd_name"] ?></td>
                                    <td style=""><?php echo $comment["comm_name"] ?></td>
                                    <td style=""><?php echo $comment["comm_details"] ?></td>
                                    <td class="form-group">
                                        <a href="index.php?page_layout=edit_comment&comm_id=<?php echo $comment["comm_id"] ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                        <?php if ($comm_permission == 0) { ?>
                                            <a href="add_comment.php?comm_id=<?php echo $comment["comm_id"] ?>&page=<?php echo $page ?>" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i></a>
                                        <?php } ?>
                                        <a href="del_comment.php?comm_id=<?php echo $comment["comm_id"] ?>&page=<?php echo $page ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
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