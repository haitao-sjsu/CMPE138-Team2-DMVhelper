<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "DMVhelper";

$conn = mysqli_connect($host,
                       $username, 
                       $password, 
                       $database) 
        or die('Could not connect');
?>