<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Variables</title>
</head>
<style>
    body {
        display: grid;
        place-items: center;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
    }
</style>
<body>

    <?php

        $book_name = "Mexikanische fluch";

        $read = rand(0, 1);
        $color = "#000";
        $message = "Error!!!";

        if ( $read ) {

            $message = "Du hast \"$book_name\" gelesen.";
            $color = "green";

        } else {

            $message = "Du hast \"$book_name\" nicht gelesen.";
            $color = "red";
        }
    ?>
    <h1 style="color:<?= $color; ?>" >

        <?= $message; ?>

    </h1>

</body>
</html>