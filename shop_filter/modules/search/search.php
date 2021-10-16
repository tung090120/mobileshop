
<?php
if (isset($_POST['keyword'])) {
    if (preg_match('/[^a-zA-Z0-9\s\-_\.\?$]/', $_POST['keyword'])) {

        echo "<br/><span style='color: #F00;'>Sorry only letters, numbers, dashes. </span>";
    } else {
        $keyword = mysqli_real_escape_string($conn,$_POST['keyword']);

        // prefix keyword
        $arr_keyword = explode(' ', $keyword);
        $pre_keyword = "%" . implode('%', $arr_keyword) . "%";

        // query product 
        $sql = "SELECT * FROM product WHERE prd_name LIKE '%s'";
        $query = mysqli_query($conn, sprintf($sql,$pre_keyword));
    }
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


