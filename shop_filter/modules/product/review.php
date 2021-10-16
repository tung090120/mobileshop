<?php
if (isset($_GET['prd_id'])) {
  $prd_id =mysqli_real_escape_string($conn,(string)(int)$_GET['prd_id']);
  $sql = "SELECT * FROM product WHERE prd_id = %s";
  $product = mysqli_fetch_array(mysqli_query($conn,sprintf($sql,$prd_id)));

  // POST COMMENT ==============================
  if (isset($_POST["sbm"])) {
    $comm_name = mysqli_real_escape_string($conn,filter_var($_POST['comm_name'], FILTER_SANITIZE_STRING));
    $comm_mail = mysqli_real_escape_string($conn,filter_var($_POST['comm_mail'], FILTER_SANITIZE_STRING));
    date_default_timezone_set('asia/Ho_Chi_Minh');
    $comm_date = date("Y-m-d H:i:s");
    $comm_details = mysqli_real_escape_string($conn,filter_var($_POST['comm_details'], FILTER_SANITIZE_STRING));

    $sql = "INSERT INTO comment (comm_name,comm_mail,comm_date,comm_details,prd_id) 
        VALUES ('$comm_name','$comm_mail','$comm_date','$comm_details','$prd_id')";
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
        $ext=pathinfo($_FILES['rate_image']['name'],PATHINFO_EXTENSION);
        if (array_key_exists($ext, $types)) {
            $rate_image = $_FILES['rate_image']['name'];
            $tmp_name = $_FILES['rate_image']['tmp_name'];
                move_uploaded_file($tmp_name, 'admin/img/rates/' . $n_rate_image);
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
  $sql = "SELECT * FROM rate WHERE prd_id= %s";
  $query = mysqli_query($conn,sprintf($sql,$prd_id));
  $total = mysqli_num_rows($query); // tổng số lượt đánh giá
  $total_number_star = array(0, 0, 0, 0, 0, 0); // tổng số lượt đánh giá theo sao
  $total_number_star_tb = array(); // phần trăm đánh giá giá từng sao
  if ($total === 0) $total_rate_tb = 0;
  else {
    $total_rate = 0; // tổng tất cả sao
    while ($rate = mysqli_fetch_array($query)) {
      $total_rate += (int)($rate['rate_star']); // tổng số sao đánh giá
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

  // pagination
  $row_per_page = 6;
  $all_page = ceil($total / $row_per_page);
  $page = 1;
  if (isset($_GET['p'])) {
    $page = (int)$_GET['p'];
  }
  $next_page = $page + 1 > $all_page ? $all_page : $page + 1;
  $row_fetch = $page * $row_per_page;
}
?>

<!-- RATE BOX -->
<h3 class="rate-box-header">Đánh giá về <?php echo $product['prd_name'] ?></h3>
<div id="rate-box" class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 rate-info">
    <div class="rate-info-prd">
      <img style="width:80px" src="admin/img/products/<?php echo $product['prd_image'] ?>" />
      <div style="color: #dc3545; font-weight:bold"><?php echo $product['prd_name'] ?></div>
    </div>
    <div style="padding: 0 15px;" class="rate-info-tb">
      <div class="rate-info-tb-header">SAO TRUNG BÌNH</div>
      <div class="rate-info-tb-number"><span><?php echo $total_rate_tb ?></span><i class="fa fa-star"></i></div>
      <div class="rate-info-btn btn btn-danger">
        Gửi đánh giá của bạn
      </div>
    </div>
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
            <input required name="rate_image" type="file" class="form-control">
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

<!-- RATE LIST -->
<div id="rate-list" class="row">
  <h4 class="mt-4 mb-3">Khách hàng nhận xét (<?php echo $total ?>)</h4>
  <hr />
  <div class="col-lg-12 col-md-12 col-sm-12 rate-list-col">
    <?php
    $sql = "SELECT * FROM rate WHERE prd_id = $prd_id LIMIT 0,$row_fetch";
    $query = mysqli_query($conn, $sql);
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
  <?php if ($page < $all_page) { ?>
    <a class="btn btn-danger mt-3" href="index.php?page_layout=review&prd_id=<?php echo $prd_id ?>&p=<?php echo $next_page ?>">Xem thêm</a>
  <?php } ?>
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
  let index = -1;
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
