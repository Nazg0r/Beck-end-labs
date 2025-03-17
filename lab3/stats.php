<?php
    require_once("db_connect.php");
    include_once("db_functions.php");

    $mails_count = get_records_count("emails", $link);
    $subscribers_count = get_records_count("subscribers", $link);

    $mails_count_month = get_records_for_last_month("emails", $link);

    $last_mail = get_last_record("emails", $link);
    $last_mail_query_string = http_build_query(['record' => $last_mail]);

    $_query_string = get_most_popular_record("emails", $link);
    $_query_string_query_string = http_build_query(['record' => $_query_string]);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Stats</title>
</head>
<body>
    <header>
        <a href="new_mail.php" class="btn header-btn">New record</a>
        <a href="delete_mail.php" class="btn header-btn">Delete record</a>
        <a href="mails.php" class="btn header-btn">Home page</a>
        <a href="stats.php" class="btn header-btn">Stats</a>
        <a href="find.php" class="btn header-btn">Find</a>
    </header>
    <div class="stats-container">
        <div class="record">
            <p class="key">Створено листів:</p>
            <p class="value"><?php echo $mails_count?></p>
        </div>
        <div class="record">
            <p class="key">Кільксть підписників:</p>
            <p class="value"><?php echo $subscribers_count?></p>
        </div>
        <div class="record">
            <p class="key">Створено листів за останній місяць:</p>
            <p class="value"><?php echo $mails_count_month?></p>
        </div>
            <div class="record">
            <p class="key">Останній лист:</p>
            <p class="value"><a href="mail_record.php?<?php echo $last_mail_query_string?>">link</a></p>
        </div>
        <div class="record">
            <p class="key">Лист з найбільшою кількістю підписників:</p>
            <p class="value"><a href="mail_record.php?<?php echo $_query_string_query_string?>">link</a></p>
        </div>
    </div>
</body>
</html>