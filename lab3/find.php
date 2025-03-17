<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Find</title>
</head>
<body>
<header>
    <a href="new_mail.php" class="btn header-btn">New record</a>
    <a href="delete_mail.php" class="btn header-btn">Delete record</a>
    <a href="mails.php" class="btn header-btn">Home page</a>
    <a href="stats.php" class="btn header-btn">Stats</a>
    <a href="find.php" class="btn header-btn">Find</a>
</header>
    <div class="find-box-container">
        <div class="select-option">
            <label for="find">Search by</label>
            <select name="find" id="find">
                <option value="key">Key word</option>
                <option value="pattern">Pattern</option>
                <option value="diapason">Date</option>
            </select>
        </div>
        <div class="key-word__search">
            <label for="key_word_input">Key word:</label>
            <input type="text" id="key_word_input">
        </div>
        <div class="pattern__search">
            <label for="pattern_input">Pattern:</label>
            <input type="text" id="pattern_input">
        </div>
        <div class="diapason__search">
            <label for="diapason-since_input">Since:</label>
            <input type="date" id="diapason-since_input">
            <label for="diapason-until_input">Until:</label>
            <input type="date" id="diapason-until_input">
        </div>
        <a class="btn" id="search" href="find_result.php?findBy=key">Search</a>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const keyWordController = document.querySelector(".key-word__search");
        const patternController = document.querySelector(".pattern__search");
        const diapasonController = document.querySelector(".diapason__search")
        const button = document.getElementById("search")
        const selector = document.getElementById("find");
        let findState = "key";
        button.href = "";

        function updateVisability() {
            keyWordController.style.display = "none";
            patternController.style.display = "none";
            diapasonController.style.display = "none";
            findState = selector.value;
            dropInputValues();

            if (findState === "key")
                keyWordController.style.display = "flex";
            else if (findState === "pattern")
                patternController.style.display = "flex";
            else if (findState === "diapason")
                diapasonController.style.display = "flex";

            button.href = `find_result.php?findBy=${findState}`
        }

        function dropInputValues()
        {
            keyWordController.querySelector("input").value = "";
            patternController.querySelector("input").value = "";
        }

            window.addEventListener("pageshow", function (event) {
                if (event.persisted) {
                location.reload();
            }
        });

        selector.addEventListener("change", updateVisability);

        button.addEventListener("click", () => {
            if (findState === "key")
                button.href += `&options=${keyWordController.querySelector("input").value}`;
            else if (findState === "pattern")
                button.href += `&options=${patternController.querySelector("input").value}`;
            else if (findState === "diapason") {
                button.href += `&options=${diapasonController.querySelector("#diapason-since_input").value},${diapasonController.querySelector("#diapason-until_input").value}`;
            }
        });

        updateVisability();
    });
</script>
</html>