<?php
// session
session_start();

include '../connection.php';

// check for POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get comment id
    $commentID = $_POST['id'];
    $reason = $_POST['reason'];

    // verify that user is the same as the comment's user
    $sql = "SELECT * FROM comment WHERE id = '" . $commentID . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $commentUser = $row['userID'];
        $postID = $row['postID'];
    } else {
        echo 'Error: Comment not found.';
    }

    if ($_SESSION['username'] != $commentUser) {
        // check isset session isAdmin
        if (!isset($_SESSION['isAdmin'])) {
            if ($_SESSION['isAdmin'] != 1) {
                header("Location: ../403.php");
                return;
            }
        }
    }

    // delete comment
    $sql = "DELETE FROM comment WHERE id = '$commentID'";
    $result = mysqli_query($conn, $sql);

    // if reason is not empty, then send notification to comment's user
    if ($reason != '') {
        // check session admin or not
        if ($_SESSION['isAdmin'] == 1) {
            $sql = "INSERT INTO notification (userID, link, type, details) VALUES ('$commentUser', '#', 'Comment Deleted By Admin', '$reason')";
            $result = mysqli_query($conn, $sql);
        }
    }

    // check result, if error print error
    if (!$result) {
        $error = 'Error: ' . mysqli_error($conn);
        echo $error;
    } else {
        // echo sucess
        echo 'success';
    }
} else {
    header("Location: ../403.php");
}