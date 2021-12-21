<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();

include '../connection.php';

// GET id from URL
if (isset($_GET['id'])) {

    // check post request that means user is trying to comment
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // get the data
        $content = $_POST['comment'];
        $postID = $_POST['postID'];

        // check if the user is logged in
        if (isset($_SESSION['username'])) {
            // get the user's id
            $user = $_SESSION['username'];

            // insert the comment
            $sql = "INSERT INTO comment (content, userID, postID) VALUES ('$content', '$user', '$postID')";
            $result = mysqli_query($conn, $sql);

            // check result, if error print error
            if (!$result) {
                $error = 'Error: ' . mysqli_error($conn);
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            }
        } else {
            // if user is not logged in, throw 403
            header("Location: ../403.php");
        }
    }

    // get the id
    $id = $_GET['id'];

    // get the data
    $sql = "SELECT p.id as pID, 
            p.title as title, 
            p.content as content,
            p.time as time,
            p.userID as userID,
            t.id as tID,
            t.name as tName  
            FROM post as p JOIN topic as t ON p.topicID = t.id and p.id = $id";

    $result = mysqli_query($conn, $sql);

    // check result, if error print error
    if (!$result) {
        $error = 'Error: ' . mysqli_error($conn);
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    }

    // if there is no data, then redirect to 404 page
    if (mysqli_num_rows($result) == 0) {
        header("Location: ../404.php");
    }

    // if there is data, get the data
    $result = mysqli_fetch_assoc($result);
    $title = $result['title'];
    $content = $result['content'];
    $topic = $result['tName'];
    $user = $result['userID'];
    $time = $result['time'];

    // get all comments of post
    $sql = "SELECT c.id as id, 
            c.content as content,
            c.time as time,
            c.userID as userID,
            c.postID as postID
            FROM comment as c JOIN post as p ON c.postID = p.id and p.id = $id";

    $resultComment = mysqli_query($conn, $sql);

    // get ammount of comments from the result get
    $commentAmmount = mysqli_num_rows($resultComment);
} else {
    // throw 404 if id not get
    header("Location: ../404.php");
}

?>

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
    <title><?php echo $title ?> | Forum Sederhana</title>
</head>

<body>
    <main class="center-vertical-horizontal">
        <div class="container">
            <div class="row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-heading">
                        <a href="../index.php" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-left"></i> Go back home
                            <!-- edit and delete btn if poster is the same as user -->
                            <?php
                            if ($_SESSION['username'] == $user) {
                                echo '<a href="edit.php?id=' . $id . '" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                                <a href="delete.php?id=' . $id . '" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete';
                            }
                            ?>
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="d-flex justify-content-center">
                            <h1 class="panel-title" style="margin-top: 10px;"><?php echo $title ?></h1>
                        </div>
                        <div class="d-flex justify-content-center">
                            <figcaption class="blockquote-footer" style="margin-top: 1px;" id="no-before">
                                <i class="bi bi-person"></i> <a
                                    href="../profile/user=<?php echo $user ?>"><?php echo $user ?></a>
                                <i class="bi bi-tag" style="padding-left: 5px;"></i> <a
                                    href="../topic/topic=<?php echo $topic ?>"><?php echo $topic ?></a>
                                <i class="bi bi-clock" style="padding-left: 5px;"></i> <?php echo $time ?>
                            </figcaption>
                        </div>
                        <?php
                        // echo content
                        echo '<div class="d-flex justify-content-left">';
                        echo '<p class="panel-content">' . $content . '</p>';
                        echo '</div>';
                        ?>
                    </div>
                </div>
                <hr style="width: 90%; margin: 10px auto;" />
            </div>
            <div class="row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-body">
                        <form action="?id=<?php echo $id ?>" method="POST">
                            <div class="form-group">
                                <!-- if user is logged in -->
                                <textarea class="form-control" name="comment" id="comment" rows="8"
                                    placeholder="Write your comment here..."></textarea>
                                <!-- if not logged in -->
                                <?php
                                if (!isset($_SESSION['username'])) {
                                    echo '<textarea class="form-control" name="comment" id="comment" rows="8"
                                    placeholder="You need to be logged in to write a comment..." disabled></textarea>';
                                }
                                ?>
                            </div>
                            <input type="hidden" name="postID" value="<?php echo $id ?>">
                            <input type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>">
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class=" row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Comments (<?php echo $commentAmmount ?>)</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php
                            // check if there is any comment
                            if ($commentAmmount == 0) {
                                echo '<div class="d-flex justify-content-center">';
                                echo '<p class="panel-content">No comment yet</p>';
                                echo '</div>';
                            } else {
                                // if there is comment, get the comment
                                while ($commentGet = mysqli_fetch_assoc($resultComment)) {
                                    $cID = $commentGet['id'];
                                    $content = $commentGet['content'];
                                    $time = $commentGet['time'];
                                    $postUser = $commentGet['userID'];
                                    $postID = $commentGet['postID'];

                                    // echo comment in li 
                                    echo '<li class="list-group-item" id="comment-' . $cID . '">';
                                    echo '<div class="d-flex justify-content-between">';
                                    echo '<div class="d-flex justify-content-start">';
                                    echo '<a href="../profile/user=' . $postUser . '">' . $postUser . '</a>';
                                    echo '</div>';
                                    echo '<div class="d-flex justify-content-end">';
                                    echo '<a href="?id=' . $postID . '#comment-' . $cID . '">' . $time . '</a>';
                                    if ($_SESSION['username'] == $postUser) {
                                        echo '<a href="editComment.php?id=' . $cID . '" class="btn btn-warning btn-sm" style="margin-left: 10px;">
                                        <i class="bi bi-pencil"></i></a>
                                        <a href="deleteComment.php?id=' . $cID . '" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i></a>';
                                    }

                                    echo '</div>';
                                    echo '</div>';
                                    echo '<div class="d-flex justify-content-start">';
                                    echo '<p class="panel-content">' . $content . '</p>';
                                    echo '</div>';
                                    echo '</li>';
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 200px;">‏‏‎ ‎</div>
    </main>


</body>

</html>