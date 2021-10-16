<?php
    // fetch product with cat_id = $cat_id
    $sql_product = "SELECT * FROM qa";
    $query_product = mysqli_query($conn, $sql_product);

    // xử lý trang hỗ trợ khách hàng

///////////////////////////////// 


?>
<!--	List Product	-->
<div >
   
    <ul style="list-style:none">
    <li>
    <?php
    $count = 0;
    
    while ($qa = mysqli_fetch_array($query_product)) {
        ?>
<div class="product-list">
        <div class="news-line" style="
        
        display: block;
    overflow: hidden;
    padding: 10px 0;
    border-bottom: 1px solid #008ca52a;
        ">
            <div class='thumb' style="float: left; margin-right:10px; margin-left:2px;"><a href="?view=help_detail&id=<?php echo $qa["id"] ?>"><img style="width:180px;" src="admin/img/help/<?php echo $qa["tit_img"] ?>" /></a></div>
            <div class="title" style=" margin-top: 30px;">
                <h4><a href="?view=help_detail&id=<?php echo $qa["id"] ?>"><?php echo $qa["qa_title"] ?></a></h4>
                <p><?php echo $qa['tit_detail'].'<br><br>'; ?></p>
                &nbsp; &nbsp; &nbsp; &nbsp;<time class="date fa fa-clock-o" style="color: #97b7be;"><?php echo '&nbsp'.$qa['date'].'</br></br>'; ?></time>
            </div>
        </div>
        </div>
    <?php
    }
    ?>
    </li>
    </ul>
</div>
