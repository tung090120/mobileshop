<?php
if (isset($_POST['keyword'])) {
    $keyword = $_POST['keyword'];

    // prefix keyword
    $arr_keyword = explode(' ', $keyword);
    $pre_keyword = "%" . implode('%', $arr_keyword) . "%";

    // query product 
    $sql = "SELECT * FROM product WHERE prd_name LIKE '$pre_keyword'";
    $query = mysqli_query($conn, $sql);
}
?>

<!--	List Product	-->
<div class="products">
    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo isset($keyword) ? $keyword : '' ?></span></div>
    <?php
    $count = 0;
    if (isset($query)) {
        while ($product = mysqli_fetch_array($query)) {
            if ($count === 0) echo '<div class="product-list card-deck">'; ?>

            <div class="product-item card text-center">
                <a href="index.php?page_layout=product&prd_id=<?php echo $product['prd_id'] ?>"><img src="admin/img/products/<?php echo $product['prd_image'] ?>"></a>
                <h4><a href="index.php?page_layout=product&prd_id=<?php echo $product['prd_id'] ?>"><?php echo $product['prd_name'] ?></a></h4>
                <p>Giá Bán: <span><?php echo number_format($product['prd_price'], 2, ',', '.') ?>đ</span></p>
            </div>

    <?php
            $count++;
            if ($count === 3) {
                $count = 0;
                echo "</div>";
            }
        }
        if ($count > 0) echo "</div>";
    }
    ?>
</div>

<!-- <div class="product-list card-deck">
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-1.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-2.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-3.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
    </div>
    <div class="product-list card-deck">
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-4.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-5.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-6.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
    </div>
    <div class="product-list card-deck">
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-7.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-8.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
        <div class="product-item card text-center">
            <a href="#"><img src="images/product-9.png"></a>
            <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
            <p>Giá Bán: <span>32.990.000đ</span></p>
        </div>
    </div>
</div> -->
<!--	End List Product	-->

<div id="pagination">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
    </ul>
</div>