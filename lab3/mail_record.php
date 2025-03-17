<?php
    $mail_record = $_GET['record'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Mail record</title>
</head>
<body>
    <header>
        <a href="new_mail.php" class="btn header-btn">New record</a>
        <a href="delete_mail.php" class="btn header-btn">Delete record</a>
        <a href="mails.php" class="btn header-btn">Home page</a>
        <a href="stats.php" class="btn header-btn">Stats</a>
        <a href="find.php" class="btn header-btn">Find</a>
    </header>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Subject</th>
                <th>Content</th>
                <th>Sent Date</th>
                <th>Subscribers</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                    echo "<td>" . $mail_record['id'] . "</td>";
                    echo "<td>" . $mail_record['subject'] . "</td>";
                    echo "<td>" . $mail_record['content'] . "</td>";
                    echo "<td>" . $mail_record['sent_date'] . "</td>";
                ?>
                <td><a href='subscribers.php?sub=<?php echo $mail_record['id'];?>'><?php echo 'subscribers' ?></a></td>
                <td><a href='edit_mail.php?mail=<?php echo $mail_record['id'];?>'><?php echo 'Edit mail' ?></a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
