<?php
        //php code for getting the feedback from feedback table

	 include "config.php";
     if( !$conn){
         die("error");
     }else{
		 
         $sql="SELECT * FROM `feedback` "; 
         $result=mysqli_query($conn,$sql);
         if( !$result ){
             die("not able to fetch data");
         }
         else{
             while ($row = mysqli_fetch_assoc($result)){
                 echo "<p>". "<span style=\"color:rgb(255, 33, 124)\"><em>". $row['name']. "</em></span><br>". htmlspecialchars($row['feed']) . " " . "<span style=\"color:white;opacity:0.8;font-size:60%;\"><em>".$row['datetime']."</em></span></p><hr>"; 
             }
         }
         mysqli_close($conn);
     }
?>