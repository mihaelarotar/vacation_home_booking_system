<?php
session_start();
include '../admin/connect.php';
global $conn;
if(ISSET($_POST['change_password'])){
    $oldPassword = $_POST['oldPassword'] ?? "";
    $newPassword = $_POST['newPassword'] ?? "";
    $confirmPassword = $_POST['confirmPassword'];
    $username = $_SESSION['name'];

    if($newPassword != $confirmPassword) {
        echo "<script>window.alert('Passwords don\'t match'); window.history.back();</script>";
        exit();

    }

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
    $stmt = $conn->prepare('SELECT password FROM accounts WHERE username = ?');
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $username);
    $stmt->execute();
    // Store the result, so we can check if the account exists in the database.
    $stmt->store_result();
    $stmt->bind_result($password);
    $stmt->fetch();

    if (password_verify($oldPassword, $password)) {
        $updateStmt = $conn->prepare("UPDATE accounts SET password = ?
    WHERE username = ?");
        $changedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updateStmt->bind_param("ss", $changedPassword, $username);
        $updateStmt->execute();
        var_dump($updateStmt);
        $updateStmt->close();
        header("location:change_password.php");
    }
    else {
        echo "<script>window.alert('Incorrect password!'); window.history.back();</script>";
        exit();
    }
}