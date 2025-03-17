<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <title>Create new Email</title>
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
        <form action="process_new_mail.php" method="post">
            <h2>Create new email</h2>
            <div class="form-control">
                <label for="subject">Subject:</label>
                <div class="input-wrapper">
                    <input type="text" name="subject" id="subject">
                </div>
            </div>
            <div class="form-control">
                <label for="content">Content:</label>
                <div class="input-wrapper">
                    <textarea name="content" id="content"></textarea>
                </div>
            </div>
            <input type="hidden" name="sent_date" value="<?php echo date("Y-m-d") ?>">
            <button class="btn" type="submit">Create</button>
        </form>
    </div>
</body>
</html>