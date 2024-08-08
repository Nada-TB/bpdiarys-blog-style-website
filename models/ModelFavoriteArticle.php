<?php

require_once 'connection_dataBase.php';

$response2=$pdo->prepare('SELECT * FROM favorite_articles WHERE login_Id=?');
$id=intval($_SESSION['id']);
$response2->execute([$id]);
$favorites=$response2->fetchAll();