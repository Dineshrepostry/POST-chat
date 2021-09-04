<?php
		//checks whether a private room in the given id exists or not in the "tables" table

	include_once "config.php";
	if(!$conn){
		die("not connected to database");
	}
	else{
		$num=0;
		$table_no= $_POST["table"];
		
		$new_query="SELECT * FROM `tables` WHERE `tablename`='$table_no';";
		$result=mysqli_query($conn,$new_query);
		if(mysqli_num_rows($result)==1){
			echo TRUE;
		}
		else{
            echo FALSE;
        }
		
	}
	mysqli_close($conn);

?>