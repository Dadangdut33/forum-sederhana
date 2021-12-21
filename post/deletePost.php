<?php
// session
session_start();

include '../connection.php';

// check for POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get post id
    $postID = $_POST['id'];
    $reason = $_POST['reason'];

    // verify that user is the same as the post's user
    $sql = "SELECT * FROM post WHERE id = '" . $postID . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $postUser = $row['userID'];
    } else {
        echo 'Error: Post not found.';
    }

    if ($_SESSION['username'] != $postUser) {
        // check isset session isAdmin
        if (!isset($_SESSION['isAdmin'])) {
            if ($_SESSION['isAdmin'] != 1) {
                header("Location: ../403.php");
                return;
            }
        }
    }

    // delete post
    $sql = "DELETE FROM post WHERE id = '$postID'";
    $result = mysqli_query($conn, $sql);

    // if there is reason send notification to post's user about the deletion
    if ($reason != '') {
        // check session isAdmin true or not
        if ($_SESSION['isAdmin'] == 1) {
            $sql = "INSERT INTO notification (userID, link, type, details) VALUES ('$postUser', '#', 'Post Deleted By Admin', '$reason')";
            $result = mysqli_query($conn, $sql);
        }
    }

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