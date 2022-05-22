<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vacation home</title>
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="account/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <style>
        *{
            font-family: Poppins, sans-serif;
            /*background-color: var(--light_pink);*/
        }
        h1{
            font-family: 'Merienda', cursive;
            color: var(--dark_pink);
            text-align: center;
            padding: 20px 0 20px 0;
            font-style: normal;
        }
    </style>
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
                        <a class="nav-link active" href="houses_before_login.php">See houses</a>
                    </li>


                </ul>
                <div class="d-flex">
                    <a class="nav-link" href="account/login.html">Log In</a>
                    <button class="btn btn-outline-success" type="submit" onclick="location.href='account/register.html'">Register</button>
                </div>
            </div>
        </div>
    </nav>
    <img src="images/home.png" alt="photo" width=100% height=30%>

    <div class="container">
        <div class="row align-items-end">
            <div class="col-lg-12 bg-white shadow p-3 rounded">
                <h5>Check Booking Availability</h5>
                <form method="post" action="search_homes_before_login.php">
                    <div class="row align-items-end">
                        <div class="col-lg-3">
                            <label for="checkin" class="form-label" style="font-weight: 500;">Check-In</label>
                            <input type="date" class="form-control shadow-none" id="checkin" name="checkin">
                        </div>
                        <div class="col-lg-3">
                            <label for="checkout" class="form-label" style="font-weight: 500;">Check-Out</label>
                            <input type="date" class="form-control shadow-none" id="checkout" name="checkout">
                        </div>
                        <div class="col-lg-3">
                            <label for="people" class="form-label" style="font-weight: 500;">People</label>
                            <input type="text" class="form-control shadow-none" id="people" name="people">
                        </div>
                        <div class="col-lg-3" style="text-align: center">
                            <button class="btn btn-outline-success" type="submit" name="search_homes">Search</button
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</ul>

</body>
</html>

