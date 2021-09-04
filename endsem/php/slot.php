<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dinesh 2020115029">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slotbooking</title>
</head>
<body>
    <form  class="student-details" method="post" action="#"  >
        <h2>Slot booking- Student</h2>
        <input type="text" class="feild" name="name"  placeholder="enter your name" required>
        <input type="email" class="feild" name="email" placeholder="enter your email" required>
        <input type="number" class="feild" name="register" placeholder="enter your register number" required>
        <label for="slot">Choose your slot</label>
        <select name="time" id="slot" required>
            <option value="tuesday">Tuesday  09:00–11:00</option>
            <option value="wednesday">Wednesday 14:00–16:00</option>
            <option value="thursday">Thursday 09:00 –10:00 </option>
        </select>
        <input type="submit" name="submit" value="book" class="btn" onclick="refresh()">
        <input type="reset" class="btn">
    </form>

    <div class="avail">
        <h2>AVAILABILITY</h2>
        <?php

        //Code to display availability


            include "config.php";
            $sql="SELECT * FROM `slot` WHERE `time`='tuesday'";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            echo "<div class='student'><span>Tuesday</span><span>$num</span></div>";

            $sql="SELECT * FROM `slot` WHERE `time`='wednesday'";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            echo "<div class='student'><span>Wednesday</span><span>$num</span></div>";


            $sql="SELECT * FROM `slot` WHERE `time`='thursday'";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            echo "<div class='student'><span>Thursday</span><span>$num</span></div>";

            mysqli_close($conn);

        ?>
    </div>
    <?php
            if(array_key_exists("submit",$_POST)){
                include "config.php";
                $name=$_POST["name"];
                $email=$_POST["email"];
                $register=$_POST["register"];
                $time=$_POST["time"];
                $sql="SELECT * FROM `slot` WHERE `name`='$name'"; //Check whether the user has already booked
                $result=mysqli_query($conn,$sql);
               
                if(mysqli_num_rows($result)==1){
                        echo "<script>alert('You have already booked a slot and cannot book again!')</script>";
                }else{

                        //if new user is booking the booking in recorded

                    $sql1="SELECT * FROM `slot` WHERE `time`='$time'";
                    $result1=mysqli_query($conn,$sql1);
                    if(mysqli_num_rows($result1)<6){
                    $query="INSERT INTO `slot`(`name`, `register`, `email`, `time`) VALUES ('$name','$register','$email','$time')";
                    $result=mysqli_query($conn,$query);
                    echo "<script>alert('slot booked')</script>";
                    }
                    else{
                        echo "<script>alert('all slots booked on $time')</script>";
                    }
                }
                mysqli_close($conn);
            }

    ?>
    <div>
        <h3>Note: Incase your booked slot does not appear refresh the page</h3>
    </div>
</body>
</html>