<?php
session_start();?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Vacation home</title>
        <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@700&family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link href="style.css" rel="stylesheet">
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
                <a class="navbar-brand me-4 fw-bold h-font" href="../home.php">Vacation Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="../houses.php">See houses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../your_houses.php">Your houses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../your_reservations.php">Your Reservations</a>
                        </li>


                    </ul>
                    <div class="d-flex">
                        <a class="nav-link" href="logout.php">Log Out</a>
                        <button class="btn btn-outline-success" type="submit" onclick="location.href='account.php'"><?php
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

    <div class = "panel panel-default" style="text-align: center">
        <div class = "panel-body">
            <div class = "alert alert-info">Account / Change Account</div>

            <br />
            <div class = "col-md-4" style="justify-content: center; allign-items: center">
                <form method = "POST" action = "edit_account.php?id=<?php echo $_SESSION['name']?>">
                    <div class = "form-group" >
                        <label>Username </label>
                        <input type = "text" class = "form-control" value = "<?php echo $_SESSION['name']?>" name = "username" />
                    </div>
                    <div class = "form-group">
                        <label>First name </label>
                        <input type = "text" class = "form-control" value = "<?php echo $_SESSION['firstName']?>" name = "firstName" />
                    </div>
                    <div class = "form-group">
                        <label>Last name </label>
                        <input type = "text" class = "form-control" value = "<?php echo $_SESSION['lastName']?>" name = "lastName" />
                    </div>
                    <div class = "form-group">
                        <label>Email </label>
                        <input type = "text" class = "form-control" value = "<?php echo $_SESSION['email']?>" name = "email" />
                    </div>
                    <div class = "form-group">
                        <label>New Password </label>
                        <input type = "password" class = "form-control"  name = "password" />
                    </div>
                    <br />
                    <div class = "form-group">
                        <button class="btn btn-outline-success" type="submit" > Save Changes</button>
                    </div>
                </form>
            </div>

    </body>
    </html>

<?php