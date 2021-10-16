<!--	Latest Product	-->
<div class="products">
  <h3>SẢN PHẨM MỚI</h3>

  <?php
  for ($i = 1; $i <= 3; $i++) {
    $start = ($i - 1) * 3;
    $sql = "SELECT * FROM product WHERE prd_featured = 1 ORDER BY prd_id DESC LIMIT $i,3";
    $query = mysqli_query($conn, $sql);
  ?>
    <div class="product-list card-deck">
      <?php
      while ($product = mysqli_fetch_array($query)) { ?>
        <div class="product-item card text-center" style="border-radius: 8px">
          <a href="?page_layout=product&prd_id=<?php echo $product["prd_id"] ?>"><img src="admin/img/products/<?php echo $product["prd_image"] ?>" /></a>
          <h4><a href="?page_layout=product&prd_id=<?php echo $product["prd_id"] ?>"><?php echo $product["prd_name"] ?></a></h4>
          <p>Giá Bán: <span><?php echo number_format($product['prd_price'], 0, ',', '.') ?>đ</span></p>
        </div>
      <?php } ?>
    </div>
  <?php } ?>
</div>
<!--	End Latest Product	-->

<!-- <div class="product-list card-deck">
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-7.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-8.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-9.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
  </div>
  <div class="product-list card-deck">
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-10.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-11.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-12.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
  </div> -->
