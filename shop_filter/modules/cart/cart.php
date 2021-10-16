<!--	Cart	-->
<script>
    function buyNow() {
        document.getElementById('buy-now').submit();
    }
</script>
<?php
// include thư viện PHPmailer
include "PHPMailer-master/src/PHPMailer.php";
include "PHPMailer-master/src/Exception.php";
include "PHPMailer-master/src/OAuth.php";
include "PHPMailer-master/src/POP3.php";
include "PHPMailer-master/src/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['cart'])) {
    // Cập nhật giỏ hàng khi user thay đổi số lượng
    if (isset($_POST['sbm']) && isset($_POST['qtt'])) {
        foreach ($_POST['qtt'] as $prd_id => $new_qtt) {
            $_SESSION['cart'][$prd_id] = $new_qtt;
        }
    }

?>

    <div id="my-cart">
        <div class="row">
            <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
            <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
            <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
        </div>
        <form method="post">

            <?php
            // render cart
            $cart = $_SESSION['cart'];
            $total_price = 0;
            $arr_prd_id = array();
            foreach ($cart as $prd_id => $count) {
                $arr_prd_id[] = $prd_id;
            };
            if (count($arr_prd_id)) {
                $query_in = implode(', ', $arr_prd_id);
                $sql = "SELECT * FROM product WHERE prd_id IN ($query_in)";
                $query = mysqli_query($conn, $sql);
                while ($product = mysqli_fetch_array($query)) {
                    $total_price += (int)$product['prd_price'] * $cart[$product['prd_id']];
            ?>
                    <div class="cart-item row">
                        <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                            <img src="admin/img/products/<?php echo $product['prd_image'] ?>">
                            <h4><?php echo $product['prd_name'] ?></h4>
                        </div>

                        <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                            <input name="qtt[<?php echo $product['prd_id'] ?>]" type="number" id="quantity" class="form-control form-blue quantity" value="<?php echo $cart[$product['prd_id']] ?>" min="1">
                        </div>
                        <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($product['prd_price'] * $cart[$product['prd_id']], 0, ',', '.') ?>đ</b>
                            <a href="modules/cart/del_cart.php?prd_id=<?php echo $product['prd_id'] ?>">Xóa</a></div>
                    </div>
            <?php }
            } ?>
            <div class="row">
                <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                    <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ hàng</button>
                </div>
                <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
                <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo number_format($total_price, 0, ',', '.') ?>đ</b></div>
            </div>
        </form>

    </div>
    <!--	End Cart	-->

    <?php
    if (
        isset($_POST['name']) &&
        isset($_POST['mail']) &&
        isset($_POST['phone']) &&
        isset($_POST['add'])
    ) {
        if (
            preg_match('/[^a-zA-Z0-9\s\-_\.\?]/', $_POST['name']) &&
            preg_match('/[^a-zA-Z0-9\s\-_\.\?]/', $_POST['phone']) &&
            preg_match('/[^a-zA-Z0-9\s\-_\.\?]/', $_POST['add'])
        ) {
            echo "<br/><span style='color: #F00;'>Sorry only letters, numbers, dashes. </span>";
        } else {



            $name    = mysqli_real_escape_string($conn,addslashes($_POST['name']));
            $phone   = mysqli_real_escape_string($conn,addslashes($_POST['phone']));
            $email   = mysqli_real_escape_string($conn,addslashes($_POST['mail']));
            $address = mysqli_real_escape_string($conn,addslashes($_POST['add']));
            date_default_timezone_set('asia/Ho_Chi_Minh');
            $ord_time = date("Y-m-d H:i:s");

            $sql2 = "INSERT INTO tot_order(
            cust_name,
            cust_num,
            cust_add,
            cust_mail,
            tot_price,
            ord_time
            )
            VALUE(
                '$name',
                '$phone',
                '$address',
                '$email',
                '$total_price',
                '$ord_time')";
            $query2 = mysqli_query($conn, $sql2);


            $str_body = "";

            $str_body .= "
            <p>
                <b>Khách hàng:</b> $name<br>
                <b>Điện thoại:</b> $phone<br>
                <b>Địa chỉ:</b> $address<br>
            </p>
            " . PHP_EOL;

            $str_body .= '
            <table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
                <tr bgcolor="#305eb3">
                    <td width="70%"><b><font color="#FFFFFF">Sản phẩm</font></b></td>
                    <td width="10%"><b><font color="#FFFFFF">Số lượng</font></b></td>
                    <td width="20%"><b><font color="#FFFFFF">Tổng tiền</font></b></td>
                </tr>';

            // Phải query lại vì hàm fetchArray sẽ lưu lại lần fetch cuối của câu truy vấn vào bộ nhớ đệm => đã đến sp cuối nên ko hiển thị dc nx
            $query = mysqli_query($conn, $sql);
            $total_price_mail = 0;

            while ($product = mysqli_fetch_array($query)) {
                $sql6 = "SELECT tot_id FROM tot_order ORDER BY tot_id DESC LIMIT 1,1";
                $query6 = mysqli_query($conn, $sql6);

                while ($tot = mysqli_fetch_array($query6)) {
                    $tot_id = 1 + $tot["tot_id"];

                    $prd_id_order = $product["prd_id"];
                    $amount = $cart[$product['prd_id']];

                    $sql3 = "INSERT INTO prd_order(
                tot_id,
                prd_id,
                amount
                )
                VALUE(
                    '$tot_id',
                    '$prd_id_order',
                    '$amount')";
                    $query3 = mysqli_query($conn, $sql3);

                    header("location:index.php?page_layout=success");
                }
                $total_price_mail += (int)$product['prd_price'] * $cart[$product['prd_id']];
                $str_body .= '<tr>
                    <td width="70%">' . $product["prd_name"] . '</td>
                    <td width="10%">' . $cart[$product['prd_id']] . '</td>
                    <td width="20%">' . number_format($product['prd_price'] * $cart[$product['prd_id']], 0, '', '.') . 'đ</td>
                </tr>';
            }


            $str_body .= '<tr>
                    <td colspan="2" width="70%"></td>
                    <td width="20%"><b><font color="#FF0000">' . number_format($total_price_mail, 0, '', '.') . 'đ</font></b></td>
                </tr>
            </table>
            
            <p>
                Cám ơn quý khách đã mua hàng tại Shop của chúng tôi, bộ phận giao hàng sẽ liên hệ với quý khách để xác nhận sau 5 phút kể từ khi đặt hàng thành công và chuyển hàng đến quý khách chậm nhất sau 24 tiếng.
            </p>
            ';

            ///////////////////////////ADD PHPMAILER//////////////////////////////////
            //  $mail = new PHPMailer(true);    // Passing 'true' enables exceptions
            //    try {
            //Server settings
            //        $mail->SMTPDebug = 0;     // Enable verbose debug output
            //         $mail->isSMTP();          // Set mailer to use SMTP
            //SMTP_BLOCK="0";
            // dịch vụ mail => ở đay đang là gmail        
            //       $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            //     $mail->SMTPAuth = true;           // Enable SMTP authentication
            //   $mail->Username = 'vnptsec.cyberlab@gmail.com';    // SMTP username
            //            $mail->Password = 'IzWhrXPdlp';    // SMTP password
            //          $mail->SMTPSecure = 'tls';      // Enable TLS encryption, 'ssl' also accepted
            //        $mail->Port = 587;       // TCP port to connect to

            //Recipients
            //      $mail->CharSet = 'UTF-8';
            //    $mail->setFrom('vnptsec.cyberlab@gmail.com', ' CyberLab Mobile Shop');  // Gửi mail tới Mail Server
            //  $mail->addAddress($email);               
            //$mail->addCC('vnpt.cyberlab@gmail.com'); 
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            //  $mail->isHTML(true);                                  // Set email format to HTML
            //    $mail->Subject = 'Xác nhận đơn hàng từ Mobile Shop';
            // $mail->Body    = $str_body;
            //   $mail->AltBody = 'Mô tả đơn hàng';

            // $mail->send();
            //   header('location:index.php?page_layout=success');
            // } catch (Exception $e) {
            //     echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            // }

            //////////////////////////////////////////////////////////////////////////
        }
    }
    ?>

    <!--	Customer Info	-->
    <div id="customer">
        <form id="buy-now" method="post">
            <div class="row">

                <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                    <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
                </div>
                <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                    <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
                </div>
                <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                    <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
                </div>
                <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                    <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" required>
                </div>

            </div>
        </form>
        <div class="row">
            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                <a name="buy" onclick="buyNow()" href="#">
                    <b>Mua ngay</b>
                    <span>Giao hàng tận nơi siêu tốc</span>
                </a>
            </div>
            <div class="by-now col-lg-6 col-md-6 col-sm-12">
                <a href="#">
                    <b>Trả góp Online</b>
                    <span>Vui lòng call (+84) 0988 550 553</span>
                </a>
            </div>
        </div>
    </div>
    <!--	End Customer Info	-->
<?php } else { ?>
    <div class="alert alert-danger mt-4">Giỏ hàng của bạn đang trống!!!</div>
<?php } ?>

<!-- <div class="cart-item row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <img src="images/product-5.png">
                <h4>iPhone Xs Max 2 Sim - 256GB Gold</h4>
            </div>
            <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                <input type="number" id="quantity" class="form-control form-blue quantity" value="1" min="1">
            </div>

            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b>32.990.000đ</b><a href="#">Xóa</a></div>
        </div>  -->
