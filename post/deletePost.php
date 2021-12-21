<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../index.css">
    <link rel="icon" href="../favicon.ico">
    <title>Delete Post</title>
</head>

<body>

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
            echo '<div class="alert alert-danger" role="alert">
        Error: Post not found.
        </div>';
        }

        if ($_SESSION['username'] != $postUser) {
            header("Location: ../403.php");
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

                // echo result
                echo $result;
            }
        }

        // check result, if error print error
        if (!$result) {
            $error = 'Error: ' . mysqli_error($conn);
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        } else {
            echo '<div class="alert alert-success" role="alert">Post deleted sucessfully!. Will redirect you to home page in 3 seconds...</div>';
            // tell will redirect in 3 seconds
            header("refresh:3; url=../");
        }
    } else {
        header("Location: ../403.php");
    }
    ?>
</body>

</html>