<?php
session_start();
include "functions.php";
check();
?>
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

        <?php
        include "navbar.php";?>

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