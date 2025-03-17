<?php
$db = "first_lab_db";
$link = mysqli_connect("localhost", "admin", "admin", $db , "3307");
if($link) {
    echo '<script>console.log("Connection to MySQL server was successful")</script>';
} else {
    echo '<script>console.log("Connection to MySQL server was unsuccessful")</script>';
}