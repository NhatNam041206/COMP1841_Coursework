<?php
function totalQuestions($pdo){
    $sql = 'SELECT COUNT(*) FROM `Question`';
    $query = $pdo->query($sql);
    $row = $query->fetch();
    return $row[0];
}
