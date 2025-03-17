<?php require_once("db_connect.php");
$mail_id = $_GET['mail'];
$query = "SELECT * FROM emails WHERE id = '$mail_id'";
$result = mysqli_query($link, $query);
$mail_info = mysqli_fetch_array($result);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Edit mail</title>
</head>
<body>
<header>
    <a href="new_mail.php" class="btn header-btn">New record</a>
    <a href="delete_mail.php" class="btn header-btn">Delete record</a>
    <a href="mails.php" class="btn header-btn">Home page</a>
    <a href="stats.php" class="btn header-btn">Stats</a>
    <a href="find.php" class="btn header-btn">Find</a>
</header>
    <div class="form-container">
        <form action="process_edited_mail.php" method="post">
            <h2>Edit mail</h2>
            <div class="form-control">
                <label for="subject">New subject:</label>
                <div class="input-wrapper">
                    <input type="text" name="subject" id="subject" value="<?php echo $mail_info['subject'] ?>">
                </div>
            </div>
            <div class="form-control">
                <label for="content">New Content:</label>
                <div class="input-wrapper">
                    <textarea name="content" id="content"><?php echo $mail_info['content']?></textarea>
                </div>
            </div>
            <input type="hidden" name="sent_date" value="<?php echo date("Y-m-d") ?>">
            <input type="hidden" name="id" value="<?php echo $mail_id ?>">
            <button class="btn" type="submit">Update</button>
        </form>
    </div>
</body>
</html>