<!DOCTYPE html>
<html lang="en">

<?php
// session
session_start();

// include db connect
include './connection.php';

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="index.css">
  <link rel="icon" href="./favicon.ico">

  <title>Forum Sederhana</title>
</head>

<body>
  <main style="margin-top: 150px">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 mb-3">
          <div class="row text-left mb-5">
            <div class="col-lg-6 mb-3 mb-sm-0">
              <div class="dropdown bootstrap-select form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50"
                style="width: 100%;">
                <select class="form-control form-control-lg bg-white bg-op-9 text-sm w-lg-50" data-toggle="select"
                  tabindex="-98" id="dynamic_select">
                  <option value="./index.php"> All </option>
                  <?php
                  // check for GET request named "topic"
                  if (isset($_GET['topic'])) {
                    // if found, get the value
                    $topic = $_GET['topic'];

                    echo '<option value="./index.php?topic=' . $topic . '" selected hidden>' . $topic . '</option>';
                  } else
                                    if (isset($_GET['by'])) {
                    // if found, get the value
                    $by = $_GET['by'];

                    echo '<option value="./index.php?by=' . $by . '" selected hidden>Seeing post made by ' . $by . '</option>';
                  }

                  // get all topics from db
                  $sql = "SELECT * FROM topic";
                  $result = mysqli_query($conn, $sql);
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="./index.php?topic=' . $row['name'] . ' "> ' . $row['name'] . '</option>';
                  }
                  ?>
                </select>
                <script>
                $(function() {
                  // bind change event to select
                  $('#dynamic_select').on('change', function() {
                    var url = $(this).val(); // get selected value
                    if (url) { // require a URL
                      window.location = url; // redirect
                    }
                    return false;
                  });
                });
                </script>
              </div>
            </div>
            <div class=" col-lg-6 text-lg-right">
              <div
                class="dropdown bootstrap-select form-control form-control-lg bg-white bg-op-9 ml-auto text-sm w-lg-50"
                style="width: 100%;">
                <select class="form-control form-control-lg bg-white bg-op-9 ml-auto text-sm w-lg-50"
                  data-toggle="select" tabindex="-98" disabled>
                  <option id="time"> Date Time </option>
                </select>
              </div>
            </div>
          </div>
          <div
            class="card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-1 border-right-1 border-bottom-1 rounded-0">
            <div class="row align-items-center">
              <h1>About</h1>
              <p>
                This is a simple forum website that is made using PHP and MySQL. This website is made for the purpose of
                learning PHP and MySQL. It is open source and you can use it for your own purpose.
              </p>
            </div>
          </div>
        </div>
        <!-- Sidebar content -->
        <div class="col-lg-3 mb-4 mb-lg-0 px-lg-0 mt-lg-0">
          <div
            style="visibility: hidden; display: none; width: 285px; height: 801px; margin: 0px; float: none; position: static; inset: 85px auto auto;">
          </div>
          <div
            data-settings="{&quot;parent&quot;:&quot;#content&quot;,&quot;mind&quot;:&quot;#header&quot;,&quot;top&quot;:10,&quot;breakpoint&quot;:992}"
            data-toggle="sticky" class="sticky" style="top: 85px;">
            <div class="sticky-inner">
              <h1 class="btn btn-lg btn-block btn-success rounded-0 py-4 mb-3 bg-op-6 roboto-bold"
                style="margin-bottom: 32px !important;" onclick="window.location.href='./'">Forum
                Sederhana</h1>
              <div class="bg-white mb-3">
                <div class="pos-relative px-3 py-3">
                  <?php
                  // check if user is logged in or not
                  if (isset($_SESSION['username'])) {
                    // if user is logged in, show the logout button
                    echo '<a href="post/create.php" class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold">Create Post</a>';
                    echo '<a href="auth/logout.php" class="btn btn-danger btn-sm rounded-0 py-3 mb-3 bg-op-6 roboto-bold" style="margin-left: 5px;">Logout</a>';
                  } else {
                    // if user is not logged in, show the login button
                    echo '<a href="auth/login.php" class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold">Login</a>';
                    echo '<a href="auth/register.php" class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold" style="margin-left: 5px;">Register</a>';
                  }
                  ?>

                  <br />
                  <a href="/about.php"
                    class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold">About</a>
                  <a href="/faq.php"
                    class="btn btn-outline-primary btn-block rounded-0 py-3 mb-3 bg-op-6 roboto-bold">FAQ</a>
                </div>
              </div>
              <?php
              // check if user is logged in or not
              if (isset($_SESSION['username'])) {
                // get amount of user posts
                $sql = "SELECT COUNT(*) AS total FROM post WHERE userId = '" . $_SESSION['username'] . "'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $total = $row['total'];

                // get amount of user notifcations
                $sql = "SELECT COUNT(*) AS total FROM notification WHERE userId = '" . $_SESSION['username'] . "' AND isRead = 0";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $totalNotif = $row['total'];

                // if user is logged in, show the logout button
                echo '<div class="bg-white text-sm">
                                <h4 class="px-3 py-4 op-5 m-0 roboto-bold">
                                    Your Profile
                                </h4>
                                <hr class="my-0">
                                <div class="row text-center d-flex flex-row op-7 mx-0">
                                    <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                                            class="d-block lead font-weight-bold" href="./index.php?by=' . $_SESSION['username'] . '">' . $total . '</a> Posts </div>
                                    <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                                            class="d-block lead font-weight-bold" href="./profile/notification.php?user=' . $_SESSION['username'] . '">' . $totalNotif . '</a> Unread Notification </div>
                                </div>
                                <div class="row text-center d-flex flex-row op-7 mx-0">
                                <div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                                        class="d-block lead font-weight-bold" href="./profile/index.php?user=' . $_SESSION['username'] . '">' . $_SESSION['username'] . '</a> User </div>';

                // check isAdmin or not
                if ($_SESSION['isAdmin'] == 1) {
                  echo '<div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                                        class="d-block lead font-weight-bold" href="./admin/index.php">Admin</a>Admin Menu</div>';
                } else {
                  echo '<div class="col-sm-6 col flex-ew text-center py-3 border-bottom mx-0"> <a
                                        class="d-block lead font-weight-bold" href=""></a></div></div>';
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
  function checkTime(i) {
    if (i < 10) {
      i = "0" + i;
    }
    return i;
  }

  var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October',
    'November', 'December'
  ];
  var today, day, h, m, s;

  function startTime() {
    today = new Date();
    day = days[today.getDay()];
    dayOfMonth = today.getDate();
    month = months[today.getMonth()];
    year = today.getFullYear();
    h = today.getHours();
    m = today.getMinutes();
    s = today.getSeconds();
    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);
    // document.getElementById('time').innerHTML = day + ", " + h + ":" + m + ":" + s;
    document.getElementById('time').innerHTML = `${day} ${dayOfMonth} ${month}, ${h}:${m}:${s}`;
  }
  startTime()

  setInterval(function() {
    startTime()
  }, 500);
  </script>

</body>

</html>