<?php
$sql="SELECT * FROM banned_word ORDER BY ban_id ASC";
$query=mysqli_query($conn,$sql);
while($banned_word=mysqli_fetch_array($query)){
        while(strripos($comm_details,$banned_word["ban_word"])!==FALSE){ 
            //hàm tìm dãy $banned_word["ban_word"] trong dãy $comm_details và trả về vị trí cuối cùng
            $j=stripos($comm_details,$banned_word["ban_word"]); //hàm trả về vị trí đầu tiên
            for($i=$j ; $i < $j + strlen($banned_word["ban_word"]) ; $i++){ //thay thế dãy từ cấm thành *
                $comm_details[$i]="*";
            }
        }
}
?>