<?php
// session
session_start();

// check isAdmin or not
if (!isset($_SESSION['isAdmin'])) {
    header("Location: ../403.php");
} else {
    if ($_SESSION['isAdmin'] == 0) {
        header("Location: ../403.php");
    }
}

// import connection
include '../connection.php';

// POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data
    $id = $_POST['id'];

    // delete the topic
    $sql = "DELETE FROM topic WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    // check result, if error print error
    if (!$result) {
        $error = 'Error: ' . mysqli_error($conn);
        echo $error;
    } else {
        echo 'success';
    }
} else {
    header("Location: ../403.php");
}