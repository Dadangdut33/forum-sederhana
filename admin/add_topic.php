<!DOCTYPE html>
<html lang="en">

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

// conn
include '../connection.php';


// check for POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get the data
    $name = $_POST['name'];

    // insert the new tag
    $sql = "INSERT INTO topic (name) VALUES ('$name')";
    $result = mysqli_query($conn, $sql);

    // check result, if error print error
    if (!$result) {
        $error = 'Error: ' . mysqli_error($conn);
        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
    } else {
        // redirect to admin menu
        header("Location: ./index");
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
    <title>Add Topic</title>
</head>

<body>
    <main class="center-vertical-horizontal">
        <div class="container">
            <div class="row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-heading">
                        <a href="./index.php" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-left"></i> Go back to Topic/Tag Menu
                        </a>
                        <div class="text-center">
                            <h3>Add Topic</h3>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="name">Topic</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="margin-top:5px;">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>