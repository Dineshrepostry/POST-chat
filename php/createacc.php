<?php
	//Php file in order to create account
	include "config.php";
	
	if(!$conn){
		echo("cannot connect to database");
	}
	else{
		$uname=$_POST["uname"];
		$pass=$_POST["pass"];
		$sql="SELECT * FROM `users` WHERE username='$uname';";
		$result=mysqli_query($conn,$sql);
		if( mysqli_num_rows($result) > 0 ){ //Checking whether the username is already taken or not 
			echo "Username already taken. Please give a new one";
		}
		else{
			//if not taken account is created in the users table
			$sql="INSERT INTO `users` (`username`, `password`) VALUES ('$uname','$pass');";
			$result=mysqli_query($conn,$sql);
			if(!$result){
				die("data not written");
			}
			else{
				echo "Account created successfully!";
			}
		}
	}
	mysqli_close($conn);
?>