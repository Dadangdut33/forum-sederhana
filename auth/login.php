<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();

// check if user is already logged in
if (isset($_SESSION['username'])) {
    header("Location: ../index.php");
}

include '../connection.php';
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
    <title>Login</title>
</head>

<body>
    <main class="center-vertical-horizontal">
        <?php
        // check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check for empty fields
            if (empty($_POST['username']) || empty($_POST['password'])) {
                $error = 'Please fill in all the fields';
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            } else {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // strip tags
                $username = strip_tags($username);
                $password = strip_tags($password);

                // sanitize input
                $username = mysqli_real_escape_string($conn, $username);
                $password = mysqli_real_escape_string($conn, $password);

                // check if email exists in database
                $sql = "SELECT * FROM Users WHERE username = '" . $username . "'";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    $error = 'Error: ' . mysqli_error($conn);
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                } else {
                    if (mysqli_num_rows($result) > 0) {
                        // check if password is correct
                        $row = mysqli_fetch_assoc($result);
                        if (password_verify($password, $row['password'])) {
                            // set session
                            $_SESSION['email'] = $row['email'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['isAdmin'] = $row['isAdmin'];
                        } else {
                            $error = 'Password is incorrect!';
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        }
                    } else {
                        $error = 'Username does not exist';
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
                }
            }

            if (!isset($error)) {
                // alert sucess with js
                echo "<script>
                alert('Login succesfull');
                window.location.href='../index';
                </script>";
            }
        }
        ?>

        <div class="container">
            <div class="row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-heading">
                        <a href="../index.php" class="btn btn-primary btn-sm">
                            <i class="bi bi-arrow-left"></i> Go back home
                        </a>
                        <h3 class="panel-title">Login</h3>
                        <figcaption class="blockquote-footer" style="margin-top: 3px;">
                            Dont have an account yet? <a href="register.php">Register</a>
                        </figcaption>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" class="form-control" name="username" id="username"
                                    placeholder="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary center"
                                    style="margin-top: 10px; ">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>