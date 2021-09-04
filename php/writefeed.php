<?php
        //code to store the feed into the database

	include "config.php";
    if( !$conn){
        die("error");
    }
    else{
        $nm= $_POST["name"];
        $feedback=$_POST["feed"];
        $sql="INSERT INTO `feedback`(`name`,`feed`, `datetime`) VALUES ('$nm','$feedback',CURRENT_TIMESTAMP)";
        $result=mysqli_query($conn,$sql);
        if( !$result ){
            die("Feedback not added !");
        }
        else{
            echo "Feedback added successfully !";
        }
        mysqli_close($conn);
    }
?>