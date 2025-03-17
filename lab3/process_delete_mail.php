<?php require_once 'db_connect.php';
$mail_ids = $_GET['ids'];
$ids = explode(",", $mail_ids);
foreach ($ids as $id) {
    $query = "DELETE FROM emails WHERE id = '$id'";
    $result = mysqli_query($link, $query);
}
header("Location: delete_mail.php");
