<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();

include '../connection.php';
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../index.css">
    <title>Register</title>
</head>

<body>
    <main class="center-vertical-horizontal">
        <?php
        // check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // check for empty fields
            if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirmation']) || empty($_POST['username'])) {
                $error = 'Please fill in all the fields';
                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
            } else {
                // check if email is valid
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $error = 'Please enter a valid email';
                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                } else {
                    // check if username already exists in database
                    $sql = "SELECT * FROM Users WHERE username = '" . $_POST['username'] . "'";
                    $result = mysqli_query($conn, $sql);

                    // check result, if error print error
                    if (!$result) {
                        $error = 'Error: ' . mysqli_error($conn);
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    } else {
                        if (mysqli_num_rows($result) > 0) {
                            // if Username exist, show error
                            $error = 'Username already exists';
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        } else {
                            // check if email exists in database
                            $sql = "SELECT * FROM Users WHERE email = '" . $_POST['email'] . "'";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                $error = 'Error: ' . mysqli_error($conn);
                                echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                            } else {
                                if (mysqli_num_rows($result) > 0) {
                                    // if email exist, show error
                                    $error = 'Email already exists';
                                    echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                                } else {
                                    // if all is well, then insert into database
                                    // hash the password first
                                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                                    $sql = "INSERT INTO Users (username, email, password) VALUES ('" . $_POST['username'] . "', '" . $_POST['email'] . "', '" . $password . "')";
                                    $result = mysqli_query($conn, $sql);
                                    if (!$result) {
                                        $error = 'Error: ' . mysqli_error($conn);
                                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                                    }
                                }
                            }
                        }
                    }
                }
            }

            if (!isset($error)) {
                echo '<div class="alert alert-success" role="alert">Successfully registered, will redirect to login page in 3 seconds</div>';
                // redirect to login in 3 secs
                header('refresh: 3; url=login.php');
            }
        }
        ?>
        <div class="container">
            <div class="row bg-white">
                <div class="panel panel-default" style="padding: 12px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                        <figcaption class="blockquote-footer" style="margin-top: 3px;">
                            Already have an account? <a href="login.php">Login</a>
                        </figcaption>
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" onsubmit="return checkPassword()">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                    inlength="3" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                    title="Please enter a valid email address" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Password must containt lowercase, uppercase, number, and minimal of 8 characters"
                                    placeholder="Password" min="8" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Password Confirmation" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username"
                                    placeholder="username" required>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary center"
                                    style="margin-top: 10px; ">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
        // check password same as password validation or not
        function checkPassword() {
            var password = document.getElementById('password');
            var password_confirmation = document.getElementById('password_confirmation');
            if (password.value != password_confirmation.value) {
                alert('Password is not the same with confirmation');
                return false;
            }
            return true;
        }
        </script>
    </main>

</body>

</html>