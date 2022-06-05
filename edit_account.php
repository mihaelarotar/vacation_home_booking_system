<?php
session_start();
include 'admin/connect.php';
global $conn;
if(ISSET($_POST['edit_account'])){
    $firstName = $_POST['firstName'] ?? "";
    $lastName = $_POST['lastName'] ?? "";
    $username = $_SESSION['name'];
    $email = $_POST['email'] ?? "";

    $updateStmt = $conn->prepare("UPDATE accounts SET firstName = ?, lastName = ?, email=? 
WHERE username = ?");
    $updateStmt->bind_param("ssss", $firstName, $lastName, $email, $username);
    $updateStmt->execute();
    //var_dump($updateStmt);
    $updateStmt->close();
    header("location:account.php");
}