<?php

	//php file for creating a privatechat room

	//at maximum there can only be 10 rooms in the server.

	include_once "config.php";
	if(!$conn){
		die("not connected to database");
	}
	else{ 	//code block that takes care that there are only 10 rooms created
		$num=0;
		while(1){
		$table_no= rand(1,10);
		$new_query="SELECT * FROM `tables` WHERE `tablename`='$table_no';";
		$result=mysqli_query($conn,$new_query);
		if(mysqli_num_rows($result)==0){
			$query="CREATE TABLE `$table_no` (`uname` VARCHAR(22),`msg` VARCHAR(1000),`datetime` TIMESTAMP);";
		    $r=mysqli_query($conn,$query);
			$n_query="INSERT INTO `tables` (`tablename`, `datetime`) VALUES ('$table_no',CURRENT_TIMESTAMP);";
		    $r=mysqli_query($conn,$n_query);
			echo $table_no;
			
			break;
		}
		else if($num==10){
			echo " Server is overloaded at the moment try after sometime!";
			break;
		}
		else{
			$num+=1;
		}
		}
		
		
	}
	mysqli_close($conn);

?>