<?php
  session_start();
  include_once("../config/connect.php");

  if(isset($_SESSION['mail']) && isset($_SESSION['pass'])) {
include_once("../config/connect.php");
$sql="SELECT * FROM tot_order ORDER BY tot_id DESC";
$query = mysqli_query($conn, $sql);
while ($tot = mysqli_fetch_array($query)) {
    ?>
    <a href="http://lab1.vnptdrill.com/admin/index.php?page_layout=order_details&tot_id=<?php echo $tot['tot_id'] ?>">http://lab1.vnptdrill.com/admin/index.php?page_layout=order_details&tot_id=<?php echo $tot['tot_id'] ?></a><br>
<?php }
  }
  else header('location: index.php');
 ?>

