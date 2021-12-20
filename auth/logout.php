<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();

// check logged in or not, if yes then log out the user
if (isset($_SESSION['email'])) {
    // destroy session
    session_destroy();

    // echo success
    echo '<div class="alert alert-success" role="alert">Successfully Logged out, will redirect to main page in 3 seconds</div>';

    // redirect to main page
    header('Location: ../index.php');
} else {
    // if not logged in, then redirect to login page
    header('location: login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>

<body>
</body>

</html>