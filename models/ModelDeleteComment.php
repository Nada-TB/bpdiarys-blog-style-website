<?php 

	require_once 'connection_dataBase.php';

	$deleteComment=$pdo->prepare('DELETE comments FROM comments INNER JOIN articles ON comments.article_Id=articles.id WHERE comments.id=? ');