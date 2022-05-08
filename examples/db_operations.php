<?php

$host = "localhost";
$username = "root";
$password = "";
$dbName = "phplogin";

$mysqli = new mysqli($host, $username, $password, $dbName);

if (isset($_POST['id'])) {

    // verificam daca s-au completat formurile, cu un default value daca nu au fost completate.
    // posibil aici sa facem si o validare in care verificam daca putem folosii datele de la user.
    $location = $_POST['location'] ?? "";
    $capacity = $_POST['capacity'] ?? 0;
    $price = $_POST['price'] ?? 0;

    // cauta daca exista un rand cu id-ul respectiv
    $stmt = $mysqli->prepare("SELECT * FROM houses WHERE ID = ?");
    $stmt->bind_param("i", $_POST['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    // daca exista => update
    if ($result->num_rows > 0) {
        $updateStmt = $mysqli->prepare("UPDATE houses SET location = ?, capacity = ?,price=?   WHERE ID = ?");

        $updateStmt->bind_param("siii", $location, $capacity, $price, $_POST['id']);
        $updateStmt->execute();
        var_dump($updateStmt);
        $updateStmt->close();
    } else {
        // daca nu exista => create
        $createStmt = $mysqli->prepare("INSERT INTO houses (location, capacity, price) VALUES (?, ?, ?)");
        $createStmt->bind_param("sii", $location, $capacity, $price,);
        $createStmt->execute();
        $createStmt->close();
    }
}
?>


<h1>New house</h1>
<div class="form">
    <form method="post" action="db_operations.php">
        <div>
            <label>
                ID:
                <input type="number" name="id" value=""/>
            </label>
        </div>
        <div>
            <label>
                Location:
                <input type="text" name="nume" value=""/>
            </label>
        </div>
        <div>
            <label>
                Prenume:
                <input type="text" name="prenume" value=""/>
            </label>
        </div>
        <div>
            <label>
                Price:
                <input type="number" name="varsta" value=""/>
            </label>
        </div>
        <button type="submit">Trimite</button>
    </form>
</div>

<?php

// ia toate randurile din db

$stmt = $mysqli->prepare("SELECT * FROM houses");
$stmt->execute();
$result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();
?>

<h2>Houses</h2>
<table>
    <thead>
    <th>Id</th>
    <th>Location</th>
    <th>Capacity</th>
    <th>Price</th>
    </thead>
    <tbody>
    <?php
    foreach ($result as $row) {
        ?>
        <tr>
            <td><?php echo $row['ID'] ?></td>
            <td><?php echo $row['first_name'] ?></td>
            <td><?= $row['last_name'] ?></td>
            <td><?= $row['age'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>