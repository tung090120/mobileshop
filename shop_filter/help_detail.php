<?php
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn,(string)(int)$_GET['id']);
    $sql = "SELECT * FROM qa WHERE id = %s";
    $qa = mysqli_fetch_array(mysqli_query($conn, sprintf($sql,$id)));
    
?>

<div id="product">

    <div id="product-body" class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <h2><?php echo $qa['qa_title'].'</br>'; ?></h2>
            <div>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <time class="date fa fa-clock-o" style="color: #97b7be;
            "><?php echo '&nbsp'.$qa['date'].'</br></br>'; ?></time></div>
            <div style="display:inline;"><?php echo $qa['qa_detail'] ?></div>
            <img class="img-fluid" style="display: block; margin-left: auto; margin-right: auto;" src="admin/img/help/<?php echo $qa['qa_img'] ?>"><br />
            <p style="text-align: center; font-style:italic"><?php echo $qa['qa_img_detail'] ?></p>
            
        </div>
    </div>
</div>
<?php } ?>