<?php

        //stores the preferred theme as a cookie

        $t=$_POST["theme"];
        setcookie("theme",$t,time()+  (86400 * 30),"/");

?>