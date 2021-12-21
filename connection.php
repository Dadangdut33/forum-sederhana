<?php
$DEBUG = true;

// connect  to db
$conn = mysqli_connect('localhost', 'root', '', 'forum_sederhana');

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($DEBUG) {
    $root = 'http://' . $_SERVER['HTTP_HOST'] . '/forum-sederhana/';
} else {
    $root = "/";
}