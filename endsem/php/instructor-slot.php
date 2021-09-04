<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Dinesh 2020115029">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor section</title>
</head>
<body>

    <form action="#" class="student-details" method="post">
        <h2>Slot booking- Instructor</h2>
        <h3>Selet the slot to see the bookings</h3>
        <select name="slot">
            <option value="tuesday">Tuesday</option>
            <option value="wednesday">Wednesday</option>
            <option value="thursday">Thursday</option>
        </select>
        <input type="submit"value="see bookings" name="submit" class="btn">
    </form>

    <div class="bookings">
        <table>
           
        <?php

                //displaying the booked slots day wise;


        if(array_key_exists("submit",$_POST)){
            include "config.php";
            
            $slot=$_POST["slot"];
           
            $sql="SELECT * FROM `slot` WHERE `time`='$slot'";
            $result=mysqli_query($conn,$sql);
            echo "<h3>$slot</h3> <tr><th>NAME</th><th>EMAIL</th><th>REGISTER NUMBER</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
                echo "<tr><td class='name'>".$row["name"]."</td><td class='name'>".$row["email"]."</td><td class='register'>".$row["register"]."</td></tr>";
            }

            mysqli_close($conn);
        }
        

        ?>
        </table>
    </div>
    <script>
       
    </script>
</body>
</html>