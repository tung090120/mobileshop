<?php
if (isset($_GET['prd_id'])) {
    $prd_id = mysqli_real_escape_string($conn,(string)(int)$_GET['prd_id']);
    $sql = "SELECT * FROM product WHERE prd_id = %s";
    $product = mysqli_fetch_array(mysqli_query($conn, sprintf($sql,$prd_id)));
    // POST COMMENT ==============================
    if (isset($_POST["sbm"])) {
        $comm_name = filter_var($_POST['comm_name'], FILTER_SANITIZE_STRING);
        $comm_mail = filter_var($_POST['comm_mail'], FILTER_SANITIZE_STRING);
        date_default_timezone_set('asia/Ho_Chi_Minh');
        $comm_date = date("Y-m-d H:i:s");
        $comm_details = filter_var($_POST['comm_details'], FILTER_SANITIZE_STRING);
        $comm_permission = 0; //bình luận mới chưa được duyệt
        include_once("modules/product/check_comment.php"); //file xóa từ cấm
        $sql = "INSERT INTO comment (comm_name,comm_mail,comm_date,comm_details,prd_id,comm_permission) 
        VALUES ('$comm_name','$comm_mail','$comm_date','$comm_details','$prd_id',$comm_permission)";
        mysqli_query($conn, $sql);
    }
    // POST RATE    
    $types = array('jpeg'=>'image/jpeg','gif'=> 'image/gif','jpg'=> 'image/jpg','png'=> 'image/png');
    if (isset($_POST['rate_sbm'])) {
        $rate_mail = mysqli_real_escape_string($conn,filter_var($_POST['rate_mail'], FILTER_SANITIZE_STRING));
        $rate_name = mysqli_real_escape_string($conn,filter_var($_POST['rate_name'], FILTER_SANITIZE_STRING));
        $rate_star =mysqli_real_escape_string($conn,(string)(int)$_POST['rate_star']);
        $rate_cmt = mysqli_real_escape_string($conn,filter_var($_POST['rate_cmt'], FILTER_SANITIZE_STRING));
        date_default_timezone_set('asia/Ho_Chi_Minh');
        $rate_time = date("Y-m-d H:i:s");
        $ext=strtolower(pathinfo(basename($_FILES['rate_image']['name']),PATHINFO_EXTENSION));
        if (array_key_exists($ext, $types)) {
            $rate_image = uniqid().'.'.$ext;
            $tmp_name = $_FILES['rate_image']['tmp_name'];
                move_uploaded_file($tmp_name, 'admin/img/rates/' . $rate_image);
                $sql = "INSERT INTO rate (rate_name,rate_mail,rate_star,rate_cmt,prd_id,rate_time,rate_image) 
                VALUES ('$rate_name','$rate_mail',$rate_star,'$rate_cmt','$prd_id','$rate_time','$rate_image')";
                mysqli_query($conn, $sql);
            
        } else {


            $sql = "INSERT INTO rate (rate_name,rate_mail,rate_star,rate_cmt,prd_id,rate_time) 
            VALUES ('$rate_name','$rate_mail',$rate_star,'$rate_cmt','$prd_id','$rate_time')";
            mysqli_query($conn, $sql);
        }
    }

    // GET RATE 
    $sql = "SELECT * FROM rate WHERE prd_id = $prd_id";
    $query = mysqli_query($conn, $sql);
    $total = mysqli_num_rows($query); // tổng số lượt đánh giá
    $total_number_star = array(0, 0, 0, 0, 0, 0); // tổng số lượt đánh giá theo sao
    $total_number_star_tb = array(); // phần trăm đánh giá giá từng sao
    if ($total === 0) $total_rate_tb = 0; // số sao đánh giá trung bình
    else {
        $total_rate = 0; // tổng tất cả sao
        while ($rate = mysqli_fetch_array($query)) {
            $total_rate += (int)($rate['rate_star']);
            if ($rate['rate_star'] == 1) $total_number_star[1] += 1; // số lượt đánh giá từng sao
            if ($rate['rate_star'] == 2) $total_number_star[2] += 1;
            if ($rate['rate_star'] == 3) $total_number_star[3] += 1;
            if ($rate['rate_star'] == 4) $total_number_star[4] += 1;
            if ($rate['rate_star'] == 5) $total_number_star[5] += 1;
        }
        $total_rate_tb = round($total_rate / $total, 2); // rate trung bình
        for ($i = 1; $i <= 5; $i++) // phần trăm đánh giá từng sao
            $total_number_star_tb[$i] = ($total_number_star[$i] / $total) * 100;
    }
}
?>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<div id="product">
    <div id="product-head" class="row">
        <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
            <img src="admin/img/products/<?php echo $product['prd_image'] ?>">
        </div>
        <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
            <h1><?php echo $product['prd_name'] ?></h1>
            <ul>
                <li><span>Bảo hành:</span> <?php echo $product['prd_warranty'] ?></li>
                <li><span>Đi kèm:</span> <?php echo $product['prd_accessories'] ?></li>
                <li><span>Tình trạng:</span> <?php echo $product['prd_new'] ?></li>
                <li><span>Khuyến Mại:</span> <?php echo $product['prd_promotion'] ?></li>
                <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                <li id="price-number"><?php echo number_format($product['prd_price'], 0, ',', '.') ?>đ</li>
                <li id="status"><?php echo $product['prd_status'] == 1 ? "Còn hàng" : "Hết hàng"  ?></li>
            </ul>
            <div id="add-cart"><a href="modules/cart/cart_add.php?prd_id=<?php echo $prd_id ?>">Mua ngay</a></div>
        </div>
    </div>
    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Đánh giá về <?php echo $product['prd_name'] ?></h3>
            <?php echo $product['prd_details'] ?>
        </div>
    </div>
    <!-- RATE BOX -->
    <h3 class="rate-box-header"><?php echo $total ?> đánh giá về <?php echo $product['prd_name'] ?></h3>
    <div id="rate-box" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 rate-info">
            <div class="rate-info-tb">
                <div class="rate-info-tb-header">SAO TRUNG BÌNH</div>
                <div class="rate-info-tb-number"><span><?php echo $total_rate_tb ?></span><i class="fa fa-star"></i></div>
            </div>
            <!-- thanh bar hiển thị phần trăm -->
            <div class="rate-info-all">
                <?php
                for ($i = 5; $i >= 1; $i--) { ?>
                    <div class="rate-info-all-item">
                        <div class="item-star"><span><?php echo $i ?></span><i class="fa fa-star"></i></div>
                        <div class="item-bar">
                            <div class="item-bar-red" style="width:<?php echo $total_number_star_tb[$i] ?>%"></div>
                        </div>
                        <div class="item-number"><?php echo $total_number_star[$i] ?> đánh giá</div>
                    </div>
                <?php }
                ?>
            </div>
            <div class="rate-info-btn btn btn-danger">
                Gửi đánh giá của bạn
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 rate-for-user">
            <form method="post" enctype="multipart/form-data">
                <div class="rate-star">
                    <div class="rate-star-header">Vui lòng chọn đánh giá</div>
                    <div id="stars">
                        <i class="fa fa-star-o star"></i>
                        <i class="fa fa-star-o star"></i>
                        <i class="fa fa-star-o star"></i>
                        <i class="fa fa-star-o star"></i>
                        <i class="fa fa-star-o star"></i>
                    </div>
                </div>
                <input type="text" id="rate-star-value" name="rate_star" value="0" hidden>
                <div class="rate-user">
                    <div class="rate-detail">
                        <div class="form-group">
                            <label>Nội dung:</label>
                            <textarea name="rate_cmt" required rows="8" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload hình ảnh:</label>
                            <input name="rate_image" type="file" class="form-control">
                        </div>
                    </div>
                    <div class="rate-user-info">
                        <div class="form-group">
                            <label>Tên:</label>
                            <input name="rate_name" required type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input name="rate_mail" required type="email" class="form-control" id="pwd">
                        </div>
                        <button type="submit" name="rate_sbm" class="btn btn-danger">Gửi đánh giá</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- END RATE BOX -->
    <!-- list user rate -->
    <div id="rate-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 rate-list-col">
            <?php
            $sql = "SELECT * FROM rate WHERE prd_id = %s ORDER BY rate_id DESC LIMIT 4";
            $query = mysqli_query($conn, sprintf($sql,$prd_id));
            while ($rate = mysqli_fetch_array($query)) { ?>
                <div class="rate-list-item">
                    <div class="rate-list-item-username"><?php echo $rate['rate_name'] ?> <span> || <?php echo $rate['rate_time'] ?></span></div>
                    <div class="rate-list-item-rate">
                        <span>
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rate['rate_star']) { ?>
                                    <i class="fa fa-star star"></i>
                                <?php } else { ?>
                                    <i class="fa fa-star-o star"></i>
                            <?php }
                            } ?>
                        </span>
                        <span><?php echo $rate['rate_cmt'] ?></span>
                    </div>
                    <?php if ($rate['rate_image']) { ?>
                        <div class="mt-3"><img style="width:100px" src="admin/img/rates/<?php echo $rate['rate_image'] ?>" alt=""></div>
                    <?php } ?>
                </div>
            <?php }
            ?>
        </div>
        <a class="btn btn-danger mt-3" href="index.php?page_layout=review&prd_id=<?php echo $prd_id ?>">Xem tất cả đánh giá</a>
    </div>
    <!-- end list user rate -->
    <!--	Comment form	-->
    <div id="comment" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>Bình luận sản phẩm</h3>
            <form method="post">
                <div class="form-group">
                    <label>Tên:</label>
                    <input name="comm_name" required type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input name="comm_mail" required type="email" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label>Nội dung:</label>
                    <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
            </form>
        </div>
    </div>
    <!-- </div> -->
    <!--	End Comment form	-->
    <!--	Comments List	-->
    <div id="comments-list" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 accordion" id="accordionExample">
            <?php
            if (isset($prd_id)) {
                // Code phân trang
                $row_per_page = 5;
                $page = 1;
                if (isset($_GET['page'])) {
                    $page = mysqli_real_escape_string($conn,(string)(int)$_GET['page']);
                }
                $per_row = ($page - 1) * $row_per_page;
                $sql = "SELECT * FROM comment WHERE prd_id = $prd_id AND comm_permission=1 AND rep_comm_id IS NULL ORDER BY comm_id DESC LIMIT $per_row, $row_per_page";
                $query = mysqli_query($conn, $sql);
                while ($comment = mysqli_fetch_array($query)) { ?>
                    <div class="comment-item mb-3 p-2" style="border-bottom: 1px solid #ddd;">
                        <ul style="margin-bottom: 0;">
                            <li><b><?php echo $comment['comm_name'] ?></b></li>
                            <li><?php echo $comment['comm_date'] ?></li>
                            <li>
                                <p><?php echo $comment['comm_details'] ?></p>
                            </li>
                            <li style="border-bottom: none;">
                                <ul class="reply-cmt-list">
                                    <?php
                                    $rep_comm_id = $comment['comm_id'];
                                    $sql_rep = "SELECT * FROM comment WHERE rep_comm_id=$rep_comm_id AND comm_permission=1";
                                    $query_rep = mysqli_query($conn, $sql_rep);
                                    while ($rep_cmt = mysqli_fetch_array($query_rep)) { ?>
                                        <li class="rep-cmt-item">
                                            <div><b><?php echo $rep_cmt['comm_name'] ?></b></div>
                                            <div><?php echo $rep_cmt['comm_date'] ?></div>
                                            <div><?php echo $rep_cmt['comm_details'] ?></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                        <a class="text-danger" data-toggle="collapse" href="#form-rep-cmt-<?php echo $comment['comm_id'] ?>" aria-expanded="false" aria-controls="form-rep-cmt-<?php echo $comment['comm_id'] ?>">
                            Trả lời
                        </a>
                        <form style="transition: all 0.2s;" method="post" action="modules/product/reply_cmt.php?prd_id=<?php echo $prd_id ?>&comm_id=<?php echo $comment['comm_id'] ?>" data-parent="#accordionExample" class="collapse mt-3 form-rep-cmt" id="form-rep-cmt-<?php echo $comment['comm_id'] ?>">
                            <div class="form-group">
                                <label>Tên:</label>
                                <input name="rep_name" required type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <input name="rep_mail" required type="email" class="form-control" id="pwd">
                            </div>
                            <div class="form-group">
                                <label>Nội dung:</label>
                                <textarea name="rep-cmt-value" required rows="4" class="form-control"></textarea>
                            </div>
                            <input type="submit" name="sbm" class="btn btn-danger mt-2" value="Gửi">
                        </form>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</div>
<?php
// Thanh phân trang
$sql = "SELECT * FROM comment WHERE prd_id = $prd_id AND comm_permission=1 AND rep_comm_id IS NULL";
$query = mysqli_query($conn, $sql);
$total_products = mysqli_num_rows($query);
$total_pages = ceil($total_products / $row_per_page);
$list_pages = ''; // gán thanh phân trang vào 1 biến để có thể gọi dc ở nhiều nơi mà cần đến
$page_prev = $page <= 1 ? 1 : $page - 1;
$page_next = $page >= $total_pages ? $total_pages : $page + 1;
$list_pages .= $page == 1 ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page=' . $page_prev . '&prd_id=' . $prd_id . '">Trang trước</a></li>';
for ($page_loop = 1; $page_loop <= $total_pages; $page_loop++) {
    $active = $page_loop == $page ? 'active' : '';
    $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=product&page=' . $page_loop . '&prd_id=' . $prd_id . '">' . $page_loop . '</a></li>';
}
$list_pages .= $page == $total_pages ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=product&page=' . $page_next . '&prd_id=' . $prd_id . '">Trang sau</a></li>';
?>
<!--	End Product	-->
<div id="pagination">
    <ul class="pagination">
        <?php echo $list_pages ?>
    </ul>
</div>
<script>
    // toggle form rate
    const formRate = document.querySelector('.rate-for-user') // form rate
    const buttonToggle = document.querySelector('.rate-info-btn')
    buttonToggle.addEventListener('click', () => {
        formRate.classList.toggle('active');
        if (formRate.classList.contains('active')) // kiểm tra xem formRate đã có class active
            buttonToggle.textContent = "Đóng"; // active => hiển thị chữ đóng
        else buttonToggle.textContent = "Gửi đánh giá của bạn"; // ko active => hiển thị GỬi đánh giá
    })
    // hiển thị sao
    let inputRateValue = document.getElementById('rate-star-value'); // trỏ đến input rate-star bị ẩn
    let index = -1; // vị trí sao mình đã chọn
    let stars = document.getElementById('stars').children; // get tất cả sao // 5 sao
    for (let i = 0; i < stars.length; i++) {
        stars[i].addEventListener('mouseover', () => { // thêm sự kiện di chuột vào từng ngôi sao
            for (let j = 0; j < stars.length; j++) { // reset cho tất cả sao về chưa sáng
                stars[j].classList.remove("fa-star");
                stars[j].classList.add("fa-star-o");
            }
            for (let j = 0; j <= i; j++) { // i là ngôi sao đang dc hover => sáng tất cả sao từ 0 đến i
                stars[j].classList.remove("fa-star-o");
                stars[j].classList.add("fa-star");
            }
        })
        // add event click
        stars[i].addEventListener('click', () => {
            inputRateValue.value = i + 1; // gán value cho input bị ẩn
            index = i;
        })
        // mouseout
        stars[i].addEventListener('mouseout', () => { // thêm sự kiện di chuột ra
            for (let j = 0; j < stars.length; j++) {
                stars[j].classList.remove("fa-star");
                stars[j].classList.add("fa-star-o"); // reset tất cả sao về chưa sáng
            }
            for (let j = 0; j <= index; j++) { // cho sáng tất cả sao từ 0 đến index
                stars[j].classList.remove("fa-star-o");
                stars[j].classList.add("fa-star");
            }
        })
    }
</script>
