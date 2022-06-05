<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "phplogin";
$conn = new mysqli($hostname, $username, $password, $database) or die(mysqli_error($conn));
$conn->set_charset("utf8mb4");