<?php require_once("db_connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['subject'];
    $content = $_POST['content'];
    $sent_date = $_POST['sent_date'];
    $mail_id = $_POST['id'];
    $query = "UPDATE emails SET subject='$title', content='$content', sent_date='$sent_date' WHERE id = '$mail_id'";

    $result = mysqli_query($link, $query);
}
header("Location: edit_mail.php?mail=$mail_id");
