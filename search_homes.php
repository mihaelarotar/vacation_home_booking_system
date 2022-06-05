<?php
session_start();

include 'admin/connect.php';
global $conn;
if (isset($_POST['people'], $_POST['checkin'], $_POST['checkout'])) {
    $people = $_POST['people'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true) {
        $query = "SELECT * FROM houses where capacity>='$people' and id not in (SELECT house_id FROM reservations 
            WHERE  (checkin <='$checkin' and '$checkin' < checkout) OR (checkin < '$checkout' and '$checkout' <= checkout)) 
            except select * from houses where hostedBy='$_SESSION[name]'";
    }
    else {
        $query = "SELECT * FROM houses where capacity>='$people' and id not in (SELECT house_id FROM reservations 
            WHERE  (checkin <='$checkin' and '$checkin' < checkout) OR (checkin < '$checkout' and '$checkout' <= checkout)) ";
    }

}
else {
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true) {
        $query = "SELECT * FROM `houses` except select * from houses where hostedBy='$_SESSION[name]'";
    }
    else {
        $query ="SELECT * FROM `houses`";
    }

}
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

?>
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

    <?php
    include "navbar.php";?>
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
            if ($results->num_rows == 0) {
                echo "No houses found.";
            }
            else {
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
                        <?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){?>
                            <a style = "margin-left:50px;" href = "reserve.php?id=<?php echo $fetch['id']?>"><button class="btn btn-outline-success" type="submit"">Reserve</button></a>
                        <?php }
                        else {?>
                            <a style = "margin-left:50px;" href = "account/login.html"><button class="btn btn-outline-success" type="submit"">Reserve</button></a>
                        <?php } ?>
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