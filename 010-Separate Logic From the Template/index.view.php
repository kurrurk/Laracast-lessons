<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast 1 - 009-Lambda Functions</title>
</head>
<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
        margin: 0;
        font-family: sans-serif;
        padding: 10px;
        box-sizing: border-box;
    }
    hr {
        width: 100%;
    }
    em {
        font-weight: 200;
    }
</style>
<body>

<h3>Vorgeschlagene Bücher von <em><?= FILTER_AUTOR; ?></em>:</h3>

<ul>
    <?php foreach ($filteredBooks as $book) : ?>
        <li>
            <a href="<?= $book['purchaseUrl']; ?>" target="_blank">
                <?= $book['name']." (". $book['releaseYear'] .") - ". $book['author']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<hr>

<h3>Empfohlene Bücher zwischen <em><?= YEAR_AFTER; ?></em> und <em><?= YEAR_BEFORE; ?></em>:</h3>

<ul>
    <?php foreach ($filteredBooks2 as $book) : ?>
        <li>
            <a href="<?= $book['purchaseUrl']; ?>" target="_blank">
                <?= $book['name']." (". $book['releaseYear'] .") - ". $book['author']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>