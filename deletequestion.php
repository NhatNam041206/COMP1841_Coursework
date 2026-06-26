<?php
try {
    include 'includes/databaseConnection.php';

    $sql = 'DELETE FROM `Question` WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    header('location: questions.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete question: ' . $e->getMessage();
}

include 'templates/layout.html.php';
