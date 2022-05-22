<?php
session_start();?>
<?php
include 'admin/connect.php';
global $conn;
if (isset($_POST['add_reservation']) and !empty($_POST['datepicker1']) and !empty($_POST['datepicker2'])) {
    $originalCheckin=$_POST['datepicker1'];
    $checkin=date('Y-m-d', strtotime($originalCheckin));
    $checkout=date('Y-m-d', strtotime($_POST['datepicker2']));
    $account_username = $_SESSION['name'];
    $house_id=$_REQUEST['id'];
    $nights=date_diff(date_create($checkin), date_create($checkout));
    $totalPrice=$_REQUEST['price_per_night']*$nights->days;

    $query=$conn->query("SELECT * FROM `reservations` WHERE `house_id` = '$_REQUEST[id]'");

    $check_dates=1;
    while($fetch=$query->fetch_array()) {
//        if (($fetch['checkin'] <= $checkin and $checkin < $fetch['checkout']) or ($fetch['checkin'] < $checkout and $checkout <= $fetch['checkout'])) {
        if (strtotime($fetch['checkin']) > strtotime($checkin) and strtotime($checkout) > strtotime($fetch['checkout'])) {
//            echo("<script>alert('Not available, change dates!')</script>");
            //$check_dates=0;
            exit('Not available, change dates!');

        }

    }
    if ($statement=$conn->prepare("INSERT INTO reservations(account_username, house_id, nights, checkin, checkout, totalPrice) VALUES(?,?,?,?,?,?)")) {
        $statement->bind_param('siissi', $account_username, $house_id, $nights->days, $checkin, $checkout, $totalPrice);
        $statement->execute();
        $statement->close();
        header("location:your_reservations.php");
    }
    else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
//        echo 'Could not prepare statement!';
        //echo("<script> window.alert('Not available, change dates!');</script>");
        exit('Not available, change dates!');
    }

}
else {
    echo("<script> alert('Please fill in check-in and check-out dates!');</script>");
}?>
