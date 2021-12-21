<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();

// conn
include '../connection.php';

// check for get request which is the id of the post
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // get the id
    $id = $_GET['id'];

    // get the data
    $sql = "SELECT * FROM post WHERE id = '$id'";
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
    $topic = $result['topicID'];
    $user = $result['userID'];

    // check if the user is the poster or not
    if ($_SESSION['username'] != $user) {
        header("Location: ../403.php");
    }
}

// check for post request which means edit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $topic = $_POST['topic'];
    $id = $_POST['id'];

    // get user of the post
    $sql = "SELECT userID FROM post WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($result);
    $user = $result['userID'];

    // check if the user is the poster or not
    if ($_SESSION['username'] != $user) {
        header("Location: ../403.php");
    }

    // check if the title is empty
    if ($title == '') {
        echo '<div class="alert alert-danger" role="alert">Title cannot be empty!</div>';
    } else {
        // check if the content is empty
        if ($content == '') {
            echo '<div class="alert alert-danger" role="alert">Content cannot be empty!</div>';
        } else {
            // check if the topic is empty
            if ($topic == '') {
                echo '<div class="alert alert-danger" role="alert">Topic cannot be empty!</div>';
            } else {
                // strip tags
                $title = strip_tags($title);
                $content = strip_tags($content);
                $topic = strip_tags($topic);

                // update the post
                $sql = "UPDATE post SET title = '$title', content = '$content', topicID = '$topic' WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);

                // check result, if error print error
                if (!$result) {
                    $error = 'Error: ' . mysqli_error($conn);
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                } else {
                    // alert success with javascript
                    echo '<script>alert("Post updated successfully!");</script>';
                    // redirect to the post
                    header("Location: ./?id=$id");
                }
            }
        }
    }
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
    <link rel="icon" href="../favicon.ico">
    <title>Edit Forum Post</title>
</head>

<body>
    <main class="center-vertical-horizontal">
        <div class="container">
            <div class="row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-heading">
                        <a href="./?id=<?php echo $id ?>" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-left"></i> Go back to the post
                        </a>
                        <h3 class="panel-title">Create Post</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    value="<?php echo $title ?> " placeholder="title" minlength="5" maxlength="200"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control" name="content" id="content" rows="3" minlength="15"
                                    maxlength="5000" required><?php echo $content ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="topic">Topic</label>
                                <select class="form-control" name="topic" id="topic" required>
                                    <option value="?id=<?php echo $id ?>" hidden disabled>Select a topic</option>
                                    <?php
                                    $sql = "SELECT * FROM topic";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // check if the topic is the same as the one in the post
                                        if ($row['id'] == $topic) {
                                            echo '<option value="' . $row['id'] . '" selected>' . $row['name'] . '</option>';
                                        } else {
                                            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary center"
                                    style="margin-top: 10px;">Post</button>
                                <button onclick="window.location.reload()" class="btn btn-primary center"
                                    style="margin-top: 10px; margin-left: 10px;">Cancel</button>
                            </div>
                        </form>
                        <script>
                        function validateForm() {
                            var title = document.getElementById("title").value;
                            if (title == "") {
                                alert("Title must be filled out");
                                return false;
                            }
                            if (title > 200) {
                                alert("Title must be less than 200 characters");
                                return false;
                            }

                            // verify content
                            var content = document.getElementById("content").value;
                            if (content == "") {
                                alert("Content must be filled out");
                                return false;
                            }
                            if (content > 5000) {
                                alert("Content must be less than 5000 characters");
                                return false;
                            }

                            // verify select topic
                            var topic = document.getElementById("topic").value;
                            if (this.value == "") {
                                alert("Please select a topic");
                                return false;
                            }
                            return true;
                        }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>