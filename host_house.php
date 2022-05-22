<?php
session_start();
global $house_id?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Vacation home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--    <link href="CSS/Master.css" rel="stylesheet" type="text/css" />-->

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
                        <a class="nav-link" href="houses.php">See houses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="your_houses.php">Your houses</a>
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

            <div>
                <form method="post" action="add_house_query.php" enctype="multipart/form-data">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location">
                    <br /><br />
                    <label for="capacity">Capacity
                    <input type="text" id="capacity" name="capacity"> people
                    <br /><br />
                    <label for="price">Price €</label>
                    <input type="text" id="price" name="price"> /night
                    <br /><br />
                    <label for="photo">Upload photo: </label>
                    <input type="file" id="photo" name="photo"?
                    <br/><br/><br />
                    <button class="btn btn-outline-success" type="submit" name="add_house">Host home</button>
                </form>
            </div>

        </div>

    </div>

</div>

</body>

</html>