<?php

// session
session_start();

// import conn
include '../connection.php';

// check post request that means user is trying to comment
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data
    $content = $_POST['comment'];
    $postID = $_POST['postID'];

    echo $content;
    echo $postID;

    // check if the user is logged in
    if (isset($_SESSION['username'])) {
        // get the user's id
        $user = $_SESSION['username'];

        // sanitize input
        $content = strip_tags($content);
        $content = mysqli_real_escape_string($conn, $content);

        $postID = strip_tags($postID);
        $postID = mysqli_real_escape_string($conn, $postID);

        // insert the comment
        $sql = "INSERT INTO comment (content, userID, postID) VALUES ('$content', '$user', '$postID')";
        $result = mysqli_query($conn, $sql);

        // get the id of the inserted comment
        $id = mysqli_insert_id($conn);

        // check result, if error print error
        if (!$result) {
            $error = 'Error: ' . mysqli_error($conn);
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }

        // send notification to post owner if the user is not the owner
        $sql = "SELECT userID, title FROM post WHERE id = '$postID'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        $owner = $result['userID'];
        $title = $result['title'];

        if ($user != $owner) {
            $details = "A user commented on your post titled \"$title\"";
            $link = "post/index?id=$postID#comment-$id";
            $sql = "INSERT INTO notification (userID, link, type, details) VALUES ('$owner', '$link', 'Post Comment', '$details')";
            $result = mysqli_query($conn, $sql);
            // check result if error print error
            if (!$result) {
                $error = 'Error: ' . mysqli_error($conn);
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        }

        // regex to match string that starts with @
        $regex = '/@([A-Za-z0-9_]+)/';
        // match the string
        preg_match_all($regex, $content, $matches);

        // remove duplicates
        $matches = array_unique($matches[0]);

        // then loop through all of them and send the notification
        foreach ($matches as $user) {
            // trim it
            $user = trim($user);
            // remove @ from the string
            $user = str_replace('@', '', $user);

            // make sure the user is not the sender
            if ($_SESSION['username'] != $user) {
                $details = "A user mentioned you in a comment on a post titled \"$title\"";
                $link = "post/index?id=$postID#comment-$id";
                // check if the user exists
                $sql = "SELECT * FROM users WHERE username = '$user'";
                $result = mysqli_query($conn, $sql);

                // check result if error print error
                if (!$result) {
                    $error = 'Error: ' . mysqli_error($conn);
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                }

                // if the user exists
                if ($result) {

                    $sql = "INSERT INTO notification (userID, link, type, details) VALUES ('$user', '$link', 'Comment Mention', '$details')";
                    $result = mysqli_query($conn, $sql);
                    // check result if error print error
                    if (!$result) {
                        $error = 'Error: ' . mysqli_error($conn);
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
                }
            }
        }

        // redirect back to the post
        header('Location: ./index?id=' . $postID);
    } else {
        // if user is not logged in, throw 403
        header("Location: ../403.php");
    }
}