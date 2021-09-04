<?php
    //php code for retriving the messages from the corresponding tables(chat channels)
    
	 include "config.php";
     if( !$conn){
         die("error");
     }else{
		 $tableName= $_POST["tableName"];
         $sql="SELECT * FROM `$tableName` "; 
         $result=mysqli_query($conn,$sql);
         if( !$result ){
             die("not able to fetch data");
         }
         else{
             while ($row = mysqli_fetch_assoc($result)){
                 echo "<p>". "<span style=\"color:rgb(255, 33, 124)\"><em>". $row['uname']. "</em></span>" . " :   ". htmlspecialchars($row['msg']) . " " . "<span style=\"color:white;opacity:0.8;font-size:60%;\"><em>".$row['datetime']."</em></span></p>"; 
             }
         }
         mysqli_close($conn);
     }
?>