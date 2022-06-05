<?php
session_start();
global $house_id;
include "functions.php";
check();?>
<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Vacation Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--    <link href="CSS/Master.css" rel="stylesheet" type="text/css" />-->

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
                    <input type="file" id="photo" name="photo">
                    <br/><br/><br />
                    <button class="btn btn-outline-success" type="submit" name="add_house">Host home</button>
                </form>
            </div>

        </div>

    </div>

</div>

</body>

</html>