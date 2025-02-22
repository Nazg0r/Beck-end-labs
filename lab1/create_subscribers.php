<?php
    $link = mysqli_connect("localhost", "root", "",null , "3307");
    if($link) {
        echo '<script>console.log("Connection to MySQL server was successful")</script>';
    } else {
        echo '<script>console.log("Connection to MySQL server was unsuccessful")</script>';
    }
    $db = "first_lab_db";
    $select_db = mysqli_select_db($link, $db);
    if ($select_db) {
        echo '<script>console.log("Database was selected")</script>';
    } else {
        echo '<script>console.log("Database was not selected")</script>';
    }

    $query = "CREATE TABLE subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL)";

    $create_table = mysqli_query($link, $query);
    if ($create_table) {
        echo '<script>console.log("Table was created")</script>';
    } else {
        echo '<script>console.log("Table was not created")</script>';
    }