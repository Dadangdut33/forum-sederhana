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
    <title>Delete comment</title>
</head>

<body>

    <?php
    // session
    session_start();

    include '../connection.php';

    // check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // get comment id
        $commentID = $_POST['id'];

        // verify that user is the same as the comment's user
        $sql = "SELECT * FROM comment WHERE id = '" . $commentID . "'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $commentUser = $row['userID'];
            $postID = $row['postID'];
        } else {

            // 
            echo '<div class="alert alert-danger" role="alert">
        Error: Comment not found.
        </div>';
        }

        if ($_SESSION['username'] != $commentUser) {
            header("Location: ../403.php");
        }

        // delete comment
        $sql = "DELETE FROM comment WHERE id = '$commentID'";
        $result = mysqli_query($conn, $sql);

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