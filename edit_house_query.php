<?php
session_start();
include 'admin/connect.php';
global $conn;
if(isset($_POST['edit_house'])) {
    $capacity = $_POST['capacity'];
    $price = $_POST['price'];
    $house_id=$_REQUEST['id'];

    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder = "images/".$filename;

    $stmt = $conn->query("SELECT * FROM houses WHERE id = '$house_id'");

    $fetch = $stmt->fetch_array();
    $old_capacity = $fetch['capacity'];
    $old_price = $fetch['price'];
    $old_photo = $fetch['photo'];

    if(empty($capacity)) {
        $capacity = $old_capacity;
    }

    if(empty($price)) {
        $price = $old_price;
    }

    if(empty($_FILES['photo']['name'])) {
        $filename = $old_photo;

    }

    if($updateStmt = $conn->prepare("UPDATE houses SET capacity = ?,price=?, photo=? WHERE ID = ?")) {
        $updateStmt->bind_param("iisi", $capacity, $price, $filename, $house_id);
        $updateStmt->execute();
        var_dump($updateStmt);
        $updateStmt->close();
        move_uploaded_file($tempname, $folder);
        header("location:edit_house.php?id=$house_id");
    }
    else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        exit('Could not prepare statement!');
    }
}

