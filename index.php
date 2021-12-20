<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- include index.css -->
    <link rel="stylesheet" href="index.css">

    <title>Forum Sederhana</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="row">
                <!-- Main content -->
                <div class="col-lg-9 mb-3">
                    <div class="row text-left mb-5">
                        <div class="col-lg-6 mb-3 mb-sm-0">
                            <div class="dropdown bootstrap-select form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50"
                                style="width: 100%;">
                                <select class="form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50"
                                    data-toggle="select" tabindex="-98">
                                    <option> Categories </option>
                                    <option> Games </option>
                                    <option> Science </option>
                                    <option> Tech </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div
                        class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-sm-0">
                                <h5>
                                    <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
                                </h5>
                                <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">20
                                        minutes</a> <span class="op-6">ago by</span> <a class="text-black"
                                        href="#">KenyeW</a></p>
                                <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a
                                        class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2"
                                        href="#">#Wordpress</a> </div>
                            </div>
                            <div class="col-md-4 op-7">
                                <div class="row text-center op-7">
                                    <div class="col px-1"> </div>
                                    <div class="col px-1"> </div>
                                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span
                                            class="d-block text-sm">251 Replies</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0">
                        <div class="row align-items-center">
                            <div class="col-md-8 mb-3 mb-sm-0">
                                <h5>
                                    <a href="#" class="text-primary">HELP! My Windows XP machine is down</a>
                                </h5>
                                <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">54
                                        minutes</a> <span class="op-6">ago by</span> <a class="text-black"
                                        href="#">DanielD</a></p>
                                <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#Development</a> <a
                                        class="text-black mr-2" href="#">#AppStrap Theme</a> </div>
                            </div>
                            <div class="col-md-4 op-7">
                                <div class="row text-center op-7">
                                    <div class="col px-1"> </div>
                                    <div class="col px-1"> </div>
                                    <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span
                                            class="d-block text-sm">251 Replies</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar content -->
                <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
                    <div
                        style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;">
                    </div>
                    <div data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}"
                        data-toggle="sticky" class="sticky" style="top: 85px;">
                        <div class="sticky-inner">
                            <div class="bg-white mb-3">
                                <div class="pos-relative px-3 py-3">
                                    <?php
                                    // check if user is logged in or not
                                    if (isset($_SESSION['user_id'])) {
                                        // if user is logged in, show the logout button
                                        echo '<a href="post/create.php" class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold">Create Post</a>';
                                        echo '<a href="auth/logout.php" class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold" style="background-color: red !important;">Logout</a>';
                                    } else {
                                        // if user is not logged in, show the login button
                                        echo '<a href="auth/login.php" class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold">Login</a>';
                                        echo '<a href="auth/register.php" class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold" style="margin-left: 5px;">Register</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            // check if user is logged in or not
                            if (isset($_SESSION['user_id'])) {
                                // if user is logged in, show the logout button
                                echo '<div class="bg-white text-sm">
                                <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                                    Profile
                                </h4>
                                <hr class="my-0">
                                <div class="row text-center d-flex flex-row op-7 mx-0">
                                    <div class="col-sm-6 flex-ew text-center py-3 border-bottom border-right"> <a
                                            class="d-block lead font-weight-bold" href="#">58</a> Topics </div>
                                    <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                                            class="d-block lead font-weight-bold" href="#">1.856</a> Posts </div>
                                </div>
                                <div class="row d-flex flex-row op-7">
                                    <div class="col-sm-6 flex-ew text-center py-3 border-right mx-0"> <a
                                            class="d-block lead font-weight-bold" href="#">300</a> Members </div>
                                    <div class="col-sm-6 flex-ew text-center py-3 mx-0"> <a
                                            class="d-block lead font-weight-bold" href="#">DanielD</a> Newest Member
                                    </div>
                                </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>