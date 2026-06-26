<?php
if(isset($_POST['questiontext'])){
    try{
        include 'includes/databaseConnection.php';

        $sql = 'INSERT INTO `Question` SET
        questiontext = :questiontext, 
        questiondate = :questiondate,
        questionimage = :questionimage,
        questiondocument = :questiondocument,
        userid = :userid,
        moduleid = :moduleid';

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':questiontext', $_POST['questiontext']);
        $stmt->bindValue(':questiondate', $_POST['questiondate']);
        $stmt->bindValue(':questionimage', $_POST['questionimage']);
        $stmt->bindValue(':questiondocument', $_POST['questiondocument']);
        $stmt->bindValue(':userid', $_POST['userid']);
        $stmt->bindValue(':moduleid', $_POST['moduleid']);
        $stmt->execute();

        header('location: questions.php');
        exit;
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    try {
        include 'includes/databaseConnection.php';

        $users = $pdo->query('SELECT id, name FROM `User` ORDER BY name');
        $modules = $pdo->query('SELECT id, name FROM `Module` ORDER BY name');

        $title = 'Add a new question';
        ob_start();
        include 'templates/addquestion.html.php';
        $output = ob_get_clean();
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}
include 'templates/layout.html.php';
