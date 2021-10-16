<nav>
  <div id="menu" class="collapse navbar-collapse">
    <ul>
      <?php 
        $categorys = mysqli_query($conn,"SELECT * FROM category");
        while($category = mysqli_fetch_array($categorys)) { ?>
          <li class="menu-item"><a href="?page_layout=category&cat_id=<?php echo $category['cat_id'] ?>"><?php echo $category['cat_name'] ?></a></li>
       <?php } ?>
      <!-- <li class="menu-item"><a href="#">iPhone</a></li>
      <li class="menu-item"><a href="#">Samsung</a></li>
      <li class="menu-item"><a href="#">HTC</a></li>
      <li class="menu-item"><a href="#">Nokia</a></li>
      <li class="menu-item"><a href="#">Sony</a></li>
      <li class="menu-item"><a href="#">Blackberry</a></li> -->
    </ul>
  </div>
</nav>