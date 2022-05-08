<?php
include '../admin/connect.php';
global $conn;
if(ISSET($_POST['edit_account'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    //$username = $_POST['username'];
    $email = $_POST['email'];
//    $password = $_POST['password'];
    $conn->mysql_query("UPDATE `accounts` SET `firstName` = '$firstName', `lastName` = '$lastName', , `email`='$email' 
WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
    header("location:account.php");
}