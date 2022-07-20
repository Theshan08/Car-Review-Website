<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "car-review db";

$con = mysqli_connect("$host","$username","$password","$database");

if(!$con)
{// check connection
     
    die("<script>alert('Connection Failed.')</script>");
}

?>
