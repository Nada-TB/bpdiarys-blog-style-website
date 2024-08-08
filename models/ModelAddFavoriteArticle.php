<?php

require_once 'connection_dataBase.php';

$checkUrlExists = $pdo->prepare('SELECT COUNT(*) AS count FROM favorite_articles WHERE url = ? AND login_id = ?');

$insert_FavoriteArticle = $pdo->prepare('INSERT INTO favorite_articles(title,url,login_Id) VALUES(?, ?, ?)');
