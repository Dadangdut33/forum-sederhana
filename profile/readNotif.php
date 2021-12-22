<?php
// session
session_start();

// conn
include '../connection.php';


// check for post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data
    $notifID = $_POST['notifID'];

    // make sure session user is the same as the notif user
    $sql = "SELECT userID FROM notification WHERE id = '$notifID'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    $user = $result['userID'];

    if ($_SESSION['username'] != $user) {
        header("Location: ../403.php");
    }

    // mark notif as read
    $sql = "UPDATE notification SET isRead = 1 WHERE id = '$notifID'";
    $result = mysqli_query($conn, $sql);

    // check result, if error print error
    if (!$result) {
        $error = 'Error: ' . mysqli_error($conn);
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    } else {
        // redirect to profile page
        header("Location: ./notification?user=$user#notif-$notifID");
    }
} else {
    header("Location: ../403.php");
}