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
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Lab1</title>
</head>
<body>
    <header>
        <a href="new_mail.php" class="btn header-btn">New record</a>
        <a href="delete_mail.php" class="btn header-btn">Delete record</a>
        <a href="mails.php" class="btn header-btn">Home page</a>
        <a href="stats.php" class="btn header-btn">Stats</a>
        <a href="find.php" class="btn header-btn">Find</a>
    </header>
<?php
require_once("db_connect.php");
if (!isset($link)) {
    die("Database connection not found. Please check db_connect.php.");
}

$query = "SELECT * FROM emails";
$result = mysqli_query($link, $query) or die("Query failed: " . mysqli_error($link));
echo "<table>";
echo "<tr><th>Id</th><th>Subject</th><th>Content</th><th>Sent Date</th><th>Subscribers</th><th>Delete</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['subject'] . "</td>";
    echo "<td>" . $row['content'] . "</td>";
    echo "<td>" . $row['sent_date'] . "</td>";
    ?>

    <td><a href='subscribers.php?sub=<?php echo $row['id'];?>'><?php echo 'subscribers' ?></a></td>
    <td><input type="checkbox"  email_id="<?php echo $row['id'];?>"></td>

    <?php

    echo "</tr>";
}
echo "</table>";
?>

<button class="btn delete">Delete</button>

</body>
<script>
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const btn = document.querySelector('.delete');
    const selectedRows = [];

    for (let checkbox of checkboxes) {
        checkbox.addEventListener('change', function () {
            if (this.checked) {
                selectedRows.push(this.getAttribute('email_id'));
                console.log(this.getAttribute('email_id'));
            } else {
                selectedRows.splice(selectedRows.indexOf(this.getAttribute('email_id')), 1);
            }
        });
    }

    btn.addEventListener('click', function () {
        if (selectedRows.length === 0) return;
        window.location.href = 'process_delete_mail.php?ids=' + selectedRows;
    })
</script>
</html>
<?php
