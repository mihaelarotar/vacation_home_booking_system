<?php
session_start();?>
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
                    <button class="btn btn-outline-success" type="submit" onclick="location.href='account/account.php'"><?php
                        if(isset($_SESSION['name'])) {
                            $username = $_SESSION['name'];
                        } else {
                            die('$'."_SESSION['name'] isn't set because you had never been at file one");
                        }
                        echo $username;
                        ?></button>
                </div>
            </div>
        </div>
    </nav>
</ul>

<div style = "margin-left:0;" class = "container">
    <div class = "panel panel-default">
        <div class = "panel-body">

            <?php
            include 'admin/connect.php';
            global $conn;
            $query = $conn->query("SELECT * FROM `houses` WHERE `hostedBy`='$_SESSION[name]'");
            $rows = $query->num_rows;
            if ($rows == 0) {
                echo 'No houses to show.';
            }
            else {
                while($fetch = $query->fetch_array()){
                    ?>
                    <div class = "well" style = "height:300px; width:100%;">
                        <div style = "float:left;">
                            <img src = "images/<?php echo $fetch['photo']?>" height = "250" width = "350"/>
                        </div>
                        <div style = "float:left; margin-left:10px;">
                            <h2><?php echo $fetch['location']?></h2>
                            <h3><?php echo "Capacity: ". $fetch['capacity']." people"?></h3>
                            <h3><?php echo "Hosted by: ". $fetch['hostedBy']?></h3>
                            <h4 style = "color:green;"><?php echo "Price: €".$fetch['price'].".00/night"?></h4>
                            <br />
                            <a style = "margin-left:50px;" href = "reserve.php?id=<?php echo $fetch['id']?>"<button class="btn btn-outline-success" type="submit"">Reserve</button></a>
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