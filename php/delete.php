<?php
    //php code for deleting an account

    include_once "config.php";
    if( !$conn){
        die("error");
    }else{
        $tableName= "users";
        $sql="DELETE FROM `users` WHERE username='".$_POST["user"]."';"; 
        $result=mysqli_query($conn,$sql);
        if( !$result ){
            die("not able to fetch data");
        }
        else{
            echo "account deleted";
        }
        mysqli_close($conn);
    }
?>