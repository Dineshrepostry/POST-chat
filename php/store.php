<?php
        //stores the messages sent into the corresponding tables (i.e., different channels in the global chat and the different rooms in private chat)

	include "config.php";
    if( !$conn){
        die("error");
    }
    else{
        $tableName= $_POST["tableName"];
        $msg=$_POST["msg"];
		$uname=$_POST["uname"];
        $sql="INSERT INTO `$tableName`(`uname`,`msg`, `datetime`) VALUES ('$uname','$msg',CURRENT_TIMESTAMP)";
        $result=mysqli_query($conn,$sql);
        if( !$result ){
            die("not written");
        }
        mysqli_close($conn);
    }
?>