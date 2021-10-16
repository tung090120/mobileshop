<?php
if (isset($_GET['cat_id'])) {
    $cat_id = $_GET['cat_id'];

    // Code phân trang
    $row_per_page = 5;
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    $per_row = ($page - 1) * $row_per_page;

    // fetch product with cat_id = $cat_id
    $sql_product = "SELECT * FROM product WHERE cat_id = '$cat_id' LIMIT $per_row, $row_per_page";
    $query_product = mysqli_query($conn, $sql_product);

    // fetch cat_name
    $sql = "SELECT * FROM category WHERE cat_id = $cat_id";
    $category = mysqli_fetch_array(mysqli_query($conn, $sql));
}

?>
<!--	List Product	-->
<div class="products">
    <h3><?php echo $category['cat_name'] ?> (hiện có <?php echo mysqli_num_rows($query_product) ?> sản phẩm)</h3>
    <?php
    $count = 0;
    while ($product = mysqli_fetch_array($query_product)) {
        if ($count === 0) echo '<div class="product-list card-deck">'; ?>

        <div class="product-item card text-center">
            <a href="?page_layout=product&prd_id=<?php echo $product['prd_id'] ?>"><img src="admin/img/products/<?php echo $product['prd_image'] ?>"></a>
            <h4><a href="?page_layout=product&prd_id=<?php echo $product['prd_id'] ?>"><?php echo $product['prd_name'] ?></a></h4>
            <p>Giá Bán: <span><?php echo number_format($product['prd_price'], 2, ',', '.') ?>đ</span></p>
        </div>

    <?php
        $count++;
        if ($count === 3) {
            echo "</div>";
            $count = 0;
        };
    }
    if ($count !== 0) echo "</div>";
    ?>
</div>

<?php
// Thanh phân trang
$sql = "SELECT * FROM product WHERE cat_id = '$cat_id'";
$query = mysqli_query($conn, $sql);
$total_products = mysqli_num_rows($query);
$total_pages = ceil($total_products / $row_per_page);

$list_pages = ''; // gán thanh phân trang vào 1 biến để có thể gọi dc ở nhiều nơi mà cần đến
$page_prev = $page <= 1 ? 1 : $page - 1;
$page_next = $page >= $total_pages ? $total_pages : $page + 1;
$list_pages .= $page == 1 ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&page=' . $page_prev . '&cat_id='.$cat_id.'">Trang trước</a></li>';
for ($page_loop = 1; $page_loop <= $total_pages; $page_loop++) {
    $active = $page_loop == $page ? 'active' : '';
    $list_pages .= '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page_layout=category&page=' . $page_loop . '&cat_id='.$cat_id.'">' . $page_loop . '</a></li>';
}
$list_pages .= $page == $total_pages ? '' : '<li class="page-item"><a class="page-link" href="index.php?page_layout=category&page=' . $page_next . '&cat_id='.$cat_id.'">Trang sau</a></li>';
?>

<div id="pagination">
    <ul class="pagination">
        <?php echo $list_pages;?>
        <!-- <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Trang sau</a></li> -->
    </ul>
</div>