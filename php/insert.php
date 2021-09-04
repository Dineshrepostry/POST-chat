<?php
        //inserts the id of the private chatroom created into "tables" table in order keep in track of the number of rooms created

	include "config.php";
    if( !$conn){
        die("error");
    }
    else{
        $tableName= $_POST["table"];
        $sql="INSERT INTO `tables`(`tablename`, `datetime`) VALUES ('$tableName',CURRENT_TIMESTAMP)";
        $result=mysqli_query($conn,$sql);
        if( !$result ){
            die("not written");
        }else{
            echo "inserted";
        }
        mysqli_close($conn);
    }
?>