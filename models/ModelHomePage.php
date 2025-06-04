<?php

require_once "connection_dataBase.php";

try{

$stmt=$pdo->prepare('SELECT * FROM articles WHERE validation=:validation ORDER BY timeDate ASC');
$stmt->bindValue(':validation', 'valid', PDO::PARAM_STR);

$stmt->execute();
$articles= $stmt->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e){
    //Handle exceptions and show a user-friendly error message
    $title = "Budding Programmer Diary";
    $description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
    $message = 'An error occurred while fetching articles. Please try again later.';
    $template = 'errorPage';
    include 'views/layout.phtml';
    exit;
}




