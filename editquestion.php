<?php
include 'includes/databaseConnection.php';
try{
    if(isset($_POST['questiontext'])){
            // :questiontext is placeholder, which dislay exactly what users typed in the boxtext.
            $sql = 'UPDATE `Question` SET
            questiontext = :questiontext,
            questiondate = :questiondate,
            questionimage = :questionimage,
            questiondocument = :questiondocument,
            userid = :userid,
            moduleid = :moduleid
            WHERE id = :id';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':questiontext', $_POST['questiontext']);
            $stmt->bindValue(':questiondate', $_POST['questiondate']);
            $stmt->bindValue(':questionimage', $_POST['questionimage']);
            $stmt->bindValue(':questiondocument', $_POST['questiondocument']);
            $stmt->bindValue(':userid', $_POST['userid']);
            $stmt->bindValue(':moduleid', $_POST['moduleid']);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->execute();

            header('location: questions.php');
            exit;
        
    }else{
        $sql = 'SELECT * FROM `Question` WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $question = $stmt->fetch();

        $users = $pdo->query('SELECT id, name FROM `User` ORDER BY name');
        $modules = $pdo->query('SELECT id, name FROM `Module` ORDER BY name');

        $title = 'Edit question';
        ob_start();
        include 'templates/editquestion.html.php';
        $output = ob_get_clean();}
}
catch (PDOException $e){
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
