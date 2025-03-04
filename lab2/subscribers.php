<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Mails</title>
</head>
<body>
<?php  require_once("db_connect.php");
$sub_id = $_GET['sub'];

 $emails_page = "subscribers.php?mail='";
 $query = "SELECT * FROM subscribers WHERE email_id = '$sub_id'";

 $result = mysqli_query($link, $query);

 if (mysqli_num_rows($result) > 0) {
     echo "<table>";
     echo "<tr><th>Id</th><th>Username</th><th>Email</th><th>Password</th></tr>";
     while ($row = mysqli_fetch_assoc($result)) {
         echo "<tr>";
         echo "<td>" . $row['id'] . "</td>";
         echo "<td>" . $row['username'] . "</td>";
         echo "<td>" . $row['email'] . "</td>";
         echo "<td>" . $row['password'] . "</td>";
         echo "</tr>";
     }
     echo "</table>";
 }
 else {
    echo "<h2 class='no_content'>Ця розсилка не має предплатників</h2>";
 }

?>
</body>
</html>