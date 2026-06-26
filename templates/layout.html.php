<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="forum.css">
        <title><?=$title?></title>
    </head>
    <body>
        <header><h1>Greenwich Student Forum</h1></header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="questions.php">Question List</a></li>
                <li><a href="addquestion.php">Add a new question</a></li>
            </ul>
        </nav>
        <main>
            <?=$output?>
        </main>
        <footer>&copy; Greenwich Student Forum 2026</footer>
    </body>
</html>
