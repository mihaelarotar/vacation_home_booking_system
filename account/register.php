<?php
include '../admin/connect.php';
global $conn;

// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['confirmPassword'])) {
    // Could not get the data that should have been sent.
    exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) || empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['confirmPassword'])) {
    // One or more values are empty.
    exit('Please complete the registration form');
}

if($_POST['password'] != $_POST['confirmPassword']) {
    echo "<script>window.alert('Passwords don\'t match'); window.history.back();</script>";
    exit();

}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT password FROM accounts WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result, so we can check if the account exists in the database.
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        // Username already exists
        echo("<script> alert('Username exists, please choose another!');</script>");
    } else {
        // Username doesn't exist, insert new account
        if ($stmt = $conn->prepare('INSERT INTO accounts (username, password, email, firstName, lastName) VALUES (?, ?, ?, ?, ?)')) {
            // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sssss', $_POST['username'], $password, $_POST['email'], $_POST['firstName'], $_POST['lastName']);
            $stmt->execute();
            echo 'You have successfully registered, you can now login!';
            header('Location: login.html');
        } else {
            // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
            echo 'Could not prepare statement!';
        }
    }
    $stmt->close();
} else {
    // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
    echo 'Could not prepare statement!';
}
$conn->close();
