<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();

include '../connection.php';

// GET "user" from URL
$user = $_GET['user'];

// check if it exist in db or not
$sql = "SELECT * FROM Users WHERE username = '" . $user . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // if it exist, get the data
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
} else {
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
    <title><?php echo $username; ?>'s profile</title>
</head>

<body>
    <main class="center-vertical-horizontal">
        <div class="container">
            <div class="row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-heading">
                        <a href="../index.php" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-left"></i> Go back home
                        </a>
                    </div>
                    <div class="panel-body">
                        <div class="d-flex justify-content-center">
                            <h1 class="panel-title"><?php echo $username; ?></h1>
                            </h1>
                        </div>
                        <div class="d-flex justify-content-center">
                            <h4>At <?php echo $email ?></h4>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="../index.php?by=<?php echo $username; ?>">Click to see <?php echo $username; ?>'s
                                posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>