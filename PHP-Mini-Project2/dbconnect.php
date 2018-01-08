<?php
//connect to mysql database
$servername = "localhost";
$username = "root";
$password = "";
$database = "php-mini-project";

$con = mysqli_connect($servername, $username, $password, $database) or die("Error " . mysqli_error($con));
?>