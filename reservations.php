<?php
session_start();
include "functions.php";
check();?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Vacation Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="page_style.css" rel="stylesheet">
</head>
<body>
<h1>Choose your dream vacation home today!</h1>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<ul>

    <?php
    include "navbar.php";?>
</ul>

<div style = "justify-content: center; align-items: center" class = "container">
    <div class = "panel panel-default">
        <div class = "panel-body">

            <?php
            include 'admin/connect.php';
            global $conn;
            $query = $conn->query("SELECT * FROM `houses` h inner join `reservations` r on h.id=r.house_id WHERE h.hostedBy='$_SESSION[name]' order by checkin desc");
            $rows = $query->num_rows;
            if ($rows == 0) {
                echo 'No reservations to show.';
            }
            else {
                while($fetch = $query->fetch_array()){
                    ?>
                    <div class = "well" style = "height:300px; width:100%;">
                        <div style = "float:left;">
                            <img src = "images/<?php echo $fetch['photo']?>" height = "250" width = "350"/>
                        </div>
                        <div style = "float:left; margin-left:10px;">
                            <h2 style="color: green"><?php echo $fetch['location']?></h2>
                            <h4><?php echo "Capacity: ". $fetch['capacity']." people"?></h4>
                            <h4><?php echo "Reserved by: ". $fetch['account_username']?></h4>
                            <h4><?php echo "Check-in: ". date("d/m/Y", strtotime($fetch['checkin']))?></h4>
                            <h4><?php echo "Check-out: ". date("d/m/Y", strtotime($fetch['checkout']))?></h4>
                            <!--                            <h4 style = "color:green;">--><?php //echo "Price: €".$fetch['price']."/night"?><!--</h4>-->
                            <h3 style="color: green"><?php echo "Total price: €". $fetch['totalPrice']." "?></h3>
                            <br />
                            <!--                            <a style = "margin-left:50px;" href = "reserve.php?id=--><?php //echo $fetch['id']?><!--"<button class="btn btn-outline-success" type="submit"">Reserve</button></a>-->
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
</div>

</body>

</html>