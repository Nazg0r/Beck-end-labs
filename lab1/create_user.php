<?php
    $link = mysqli_connect("localhost", "root", "",null , "3307");
    if($link) {
        echo '<script>console.log("Connection to MySQL server was successful")</script>';
    } else {
        echo '<script>console.log("Connection to MySQL server was unsuccessful")</script>';
    }
    $query = "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost' IDENTIFIED BY 'admin' WITH GRANT OPTION";

    $create_user = mysqli_query($link, $query);
    if ($create_user) {
        echo '<script>console.log("User was created")</script>';
    }
    else {
        echo '<script>console.log("User was not created")</script>';
    }
