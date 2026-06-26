<?php
try{
    include 'includes/databaseConnection.php';
    include 'includes/DatabaseBaseFunctions.php';
    $sql = '
        SELECT `Question`.id, questiontext, questiondate, questionimage, questiondocument, `User`.name AS user_name, email, `Module`.name AS module_name 
        FROM `Question` 
        INNER JOIN `User` ON `Question`.userid = `User`.id 
        INNER JOIN `Module` ON `Question`.moduleid = `Module`.id
        ORDER BY questiondate DESC;
    ';
    $questions = $pdo->query($sql);
    $title = 'Question List';
    $totalQuestions = totalQuestions($pdo);
    
    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database Error:' . $e->getMessage();
}
include 'templates/layout.html.php';
