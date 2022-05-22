<?php
session_start();?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Vacation Home</title>
        <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="account/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

        <link href="page_style.css" rel="stylesheet">
    </head>
    <body>
    <h1>Choose your dream vacation home today!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <ul>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand me-4 fw-bold h-font" href="home.php">Vacation Home</a>
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
                                <a class="dropdown-item" href="account.php">Account settings</a>
                                <a class="dropdown-item" href="#">Change password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item disabled" href="#">Delete account</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </ul>

    <div class = "panel panel-default" style="text-align: center">
        <div class = "panel-body">
            <div class = "alert alert-info">Change password</div>

            <br />
            <div class = "col-md-4" style="justify-content: center; align-items: center">
                <?php
                include 'admin/connect.php';
                global $conn;
                $query = $conn->query("SELECT * FROM `accounts` WHERE `username` = '$_SESSION[name]'");
                $fetch = $query->fetch_array();
                ?>
                <form method = "POST" action = "change_password_query.php?id=<?php echo $_SESSION['name']?>">
                    <div class = "form-group" >
                        <label>Old password
                            <input type = "password" class = "form-control" name = "oldPassword"/>
                        </label>
                    </div>
                    <div class = "form-group">
                        <label>New password
                            <input type = "password" class = "form-control" name = "newPassword" />
                        </label>
                    </div>
                    <div class = "form-group">
                        <label>Confirm password
                            <input type = "password" class = "form-control" name = "confirmPassword" />
                        </label>
                    </div>

                    <br />
                    <div class = "form-group">
                        <button class="btn btn-outline-success" name="change_password" type="submit" > Save changes</button>
                    </div>
                </form>
            </div>

    </body>
    </html>

<?php