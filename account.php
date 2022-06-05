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
            <div class = "alert alert-info">Change account settings</div>

            <br />
            <div class = "col-md-4" style="justify-content: center; align-items: center">
                <?php
                include 'admin/connect.php';
                global $conn;
                $query = $conn->query("SELECT * FROM `accounts` WHERE `username` = '$_SESSION[name]'");
                //            $stmt->bind_param("i", $_POST['id']);
                $fetch = $query->fetch_array();
                //$house_id=$fetch['id'];
                ?>
                <form method = "POST" action = "edit_account.php?id=<?php echo $_SESSION['name']?>">
                    <div class = "form-group" >
                        <label>Username
                        <input type = "text" class = "form-control" value = "<?php echo $_SESSION['name']?>" name = "username" disabled/>
                        </label>
                    </div>
                    <div class = "form-group">
                        <label>First name
                        <input type = "text" class = "form-control" value = "<?php echo $fetch['firstName']?>" name = "firstName" />
                        </label>
                    </div>
                    <div class = "form-group">
                        <label>Last name
                        <input type = "text" class = "form-control" value = "<?php echo $fetch['lastName']?>" name = "lastName" />
                        </label>
                    </div>
                    <div class = "form-group">
                        <label>Email
                        <input type = "text" class = "form-control" value = "<?php echo $fetch['email']?>" name = "email" />
                        </label>
                    </div>
                    <br />
                    <div class = "form-group">
                        <button class="btn btn-outline-success" name="edit_account" type="submit" > Save changes</button>
                    </div>
                </form>
            </div>

</body>
</html>

