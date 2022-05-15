<?php
session_start();?>
<?php
include 'admin/connect.php';
global $conn;
if (isset($_POST['add_reservation']) and isset($_POST['datepicker1']) and isset($_POST['datepicker2'])) {
    $originalCheckin=$_POST['datepicker1'];
    $checkin=date('Y-m-d', strtotime($originalCheckin));
    $checkout=date('Y-m-d', strtotime($_POST['datepicker2']));

    $account_username = $_SESSION['name'];
    $house_id=$_REQUEST['id'];
    $nights=2;
    if ($statement=$conn->prepare("INSERT INTO reservations(account_username, house_id, nights, checkin, checkout) VALUES(?,?,?,?,?)")) {
        $statement->bind_param('siiss', $account_username, $house_id, $nights, $checkin, $checkout);
        $statement->execute();
        $statement->close();
        header("location:your_reservations.php");
    }
    else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

}
else {
    echo("<script>alert('Error Javascript Exception!')</script>");
}?>
