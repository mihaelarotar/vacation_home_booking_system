<?php
session_start();
include 'admin/connect.php';
global $conn;
//if (isset($_POST['search_homes'])) {
    $people = $_POST['people'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $query = "SELECT * FROM houses where capacity>='$people' and id not in (SELECT house_id FROM reservations WHERE  (checkin <='$checkin' and '$checkin' < checkout) OR (checkin < '$checkout' and '$checkout' <= checkout))";
    if (!empty($_POST['order'])) {
        switch ($_POST['order']) {
            case 'priceAsc':
                $query .= ' ORDER BY price ASC';
                break;
            case 'priceDesc':
                $query .= ' ORDER BY price DESC';
                break;
            case 'choose':
                break;
        }
    }
    $results = $conn->query($query);
//}
//else {
//    exit("Please fill in all fields.");
//}
?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Vacation home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        :root {
            --dark_pink: #e82c7e;
            --light_pink: #F1E4F3;
        }
        *{
            font-family: Poppins, sans-serif;
            /*background-color: var(--light_pink);*/
        }
        h1{
            font-family: 'Merienda', cursive;
            color: var(--dark_pink);
            text-align: center;
            padding: 20px 0 20px 0;
        }
        .navbar .dropdown-menu-right {
            right:0;
            left:auto;
        }
        .nav-link.active {
            color:green !important;
        }
    </style></head>
<body>
<h1>Choose your dream vacation home today!</h1>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<ul>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand me-4 fw-bold h-font" href="home.php">Vacation home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="houses.php">See houses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="your_houses.php">Your houses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="your_reservations.php">Your Reservations</a>
                    </li>


                </ul>
                <div class="d-flex">
                    <a class="nav-link" href="account/logout.php">Log Out</a>
                    <div class="nav-item dropdown">
                        <button type="button" id="dropdownMenuButton" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php
                            if(isset($_SESSION['name'])) {
                                $username = $_SESSION['name'];
                            } else {
                                die('Account');
                            }
                            echo $username;
                            ?></button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="account/account.php">Account settings</a>
                            <a class="dropdown-item" href="account/change_password.php">Change password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item disabled" href="#">Delete account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</ul>
<div style = "justify-content: center; align-items: center" class = "container">
    <div class = "panel panel-default">
        <div class = "panel-body">

            <form name="sort" action="" method="post">
                <input type="hidden" name="people" value="<?php echo $people?>">
                <input type="hidden" name="checkin" value="<?php echo $checkin?>">
                <input type="hidden" name="checkout" value="<?php echo $checkout?>">
                <label>
                    <select name="order">
                        <option value="choose" selected>Choose here</option>
                        <option value="priceAsc">Price ascending</option>
                        <option value="priceDesc">Price descending</option>

                    </select>
                </label>
                <input type="submit" value="Sort houses" />
            </form>
            <br/>
            <?php

            while($fetch = $results->fetch_array()){
                ?>
                <div class = "well" style = "height:300px; width:100%;">
                    <div style = "float:left;">
                        <img src = "images/<?php echo $fetch['photo']?>" height = "250" width = "350" alt="photo"/>
                    </div>
                    <div style = "float:left; margin-left:10px;">
                        <h2><?php echo $fetch['location']?></h2>
                        <h3><?php echo "Capacity: ". $fetch['capacity']." people"?></h3>
                        <h3><?php echo "Hosted by: ". $fetch['hostedBy']?></h3>
                        <h4 style = "color:green;"><?php echo "Price: €".$fetch['price']."/night"?></h4>
                        <br />
                        <a style = "margin-left:50px;" href = "reserve.php?id=<?php echo $fetch['id']?>"<button class="btn btn-outline-success" type="submit"">Reserve</button></a>
                    </div>
                </div>
                <?php
            }

            ?>
        </div>
    </div>
</div>

</body>

</html>