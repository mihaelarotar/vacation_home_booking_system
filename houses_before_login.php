<?php
session_start();?>
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand me-4 fw-bold h-font" href="index.php">Vacation Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">See houses</a>
                    </li>


                </ul>
                <div class="d-flex">
                    <a class="nav-link" href="account/login.html">Log In</a>
                    <button class="btn btn-outline-success" type="submit" onclick="location.href='account/register.html'">Register</button>
                </div>
            </div>
        </div>
    </nav>
</ul>
<div style = "justify-content: center; align-items: center" class = "container">
    <div class = "panel panel-default">
        <div class = "panel-body">
            <!--            <strong><h3>MAKE A RESERVATION</h3></strong>-->
            <form name="sort" action="" method="post">
                <label>
                    <select name="order">
                        <option value="choose" selected>Choose here</option>
                        <option value="priceAsc">Price ascending</option>
                        <option value="priceDesc">Price descending</option>
                        <!--                    <option value="publisher">Publisher</option>-->
                        <!--                    <option value="isbn">Book ISBN-10</option>-->
                    </select>
                </label>
                <input type="submit" value="Sort houses" />
            </form>
            <br/>
            <?php
            include 'admin/connect.php';
            global $conn;
            $query = 'SELECT * FROM `houses`';
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
            $results = $conn->query( $query );
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
                        <a style = "margin-left:50px;" href = "account/login.html"><button class="btn btn-outline-success" type="submit"">Reserve</button></a>
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