 <?php
     $link = mysqli_connect("localhost", "root", "",null , "3307");
     if($link) {
         echo '<script>console.log("Connection to MySQL server was successful")</script>';
     } else {
         echo '<script>console.log("Connection to MySQL server was unsuccessful")</script>';
     }

     $db = "first_lab_db";
     $query = "CREATE DATABASE $db";

     $create_db = mysqli_query($link, $query);
     if ($create_db) {
         echo '<script>console.log("Database was created")</script>';
     }
     else {
         echo '<script>console.log("Database was not created")</script>';
     }
