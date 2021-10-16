<!--	Feature Product	-->
<div class="products">
  <h3 style="">SẢN PHẨM NỔI BẬT</h3>

  <?php
  $sql = "SELECT * FROM product WHERE prd_featured = 1 LIMIT 6";
  $query = mysqli_query($conn, $sql);
  $i = 0;
  while ($product = mysqli_fetch_array($query)) {
    if ($i === 0) { ?>
      <div class="product-list card-deck">
      <?php } ?>

      <div class="product-item card text-center" style="border-radius: 8px">
        <a href="?page_layout=product&prd_id=<?php echo $product["prd_id"] ?>"><img src="admin/img/products/<?php echo $product["prd_image"] ?>" /></a>
        <h4><a href="?page_layout=product&prd_id=<?php echo $product["prd_id"] ?>"><?php echo $product["prd_name"] ?></a></h4>
        <p>Giá Bán: <span><?php echo number_format($product['prd_price'], 0, ',', '.') ?>đ</span></p>
      </div>
      <?php
      $i++;
      if ($i === 3) {
        $i = 0; ?>
      </div>
  <?php }
    } ?>
</div>
<!--	End Feature Product	-->
<!-- <div class="product-list card-deck">
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-1.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-2.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-3.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
  </div>
  <div class="product-list card-deck">
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-4.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-5.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
    <div class="product-item card text-center">
      <a href="#"><img src="images/product-6.png" /></a>
      <h4><a href="#">iPhone Xs Max 2 Sim - 256GB</a></h4>
      <p>Giá Bán: <span>32.990.000đ</span></p>
    </div>
  </div> -->
