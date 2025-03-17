<?php require_once("db_connect.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['subject'];
    $content = $_POST['content'];
    $sent_date = $_POST['sent_date'];
    $query = "INSERT INTO emails (subject, content, sent_date) VALUES ('$title', '$content', '$sent_date')";
    $result = mysqli_query($link, $query);
}
header("Location: new_mail.php");