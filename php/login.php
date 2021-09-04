<?php
			//code to check whether the given login credentials are correct or not
	
	session_start();
	include "config.php";
	if(!$conn){
		
		die("unable to connect to database");
		echo FALSE;
		
	}else{
		$uname=$_POST["uname"];
		$pass=$_POST["pass"];
		$sql="SELECT * FROM `users` WHERE `username`='$uname' AND `password`='$pass';";
		$result=mysqli_query($conn,$sql);
		if ( mysqli_num_rows($result) == 1 ){
			
			echo TRUE;
			$_SESSION["user"]= $uname;
			
		}
		else{	
			echo FALSE;
			session_destroy();
		}
	}
	
	mysqli_close($conn);
?>