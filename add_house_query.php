<?php
session_start();
include 'admin/connect.php';
global $conn;
if(isset($_POST['add_house']) and isset($_POST['location'])) {
    if (empty($_POST['location']) || empty($_POST['capacity']) || empty($_POST['price']) || empty($_FILES['photo']['name'])) {
        // One or more values are empty.
        echo("<script> alert('Please complete all required fields.');</script>");
        exit();
    }

    $location=$_POST['location'];
    $capacity=$_POST['capacity'];
    $price=$_POST['price'];

    $filename = $_FILES['photo']['name'];
    $tempname = $_FILES['photo']['tmp_name'];
    $folder = "images/".$filename;

    if ($statement=$conn->prepare("INSERT INTO houses(location, capacity, price, photo, hostedBy) VALUES(?,?,?,?,?)")) {
        $statement->bind_param('siiss', $location, $capacity, $price, $filename, $_SESSION['name']);
        $statement->execute();
        $statement->close();
        move_uploaded_file($tempname, $folder);
        header("location:your_houses.php");
    }
    else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        exit('Could not prepare statement!');
    }
}