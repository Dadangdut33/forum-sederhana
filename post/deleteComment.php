<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../favicon.ico">
    <title>Delete comment</title>
</head>

<body>
    babi
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
            echo '<div class="alert alert-danger" role="alert">
        Error: Comment not found.
        </div>';
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
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">Comment deleted! sucessfully!. Will redirect you back to the post in 3 seconds...</div>';
            // tell will redirect in 3 seconds
            header("refresh:3; url=./?id=" . $postID);
        }
    } else {
        header("Location: ../403.php");
    }

    ?>

</body>

</html>