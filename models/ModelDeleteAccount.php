<?php 

	require_once 'connection_dataBase.php';

	$deleteFavorite=$pdo->prepare('DELETE  FROM favorite_articles WHERE login_Id=?');

	$deleteComments=$pdo->prepare('DELETE comments FROM comments INNER JOIN articles ON comments.article_Id=articles.id WHERE comment_Id=?');
	
	$deleteAccount=$pdo->prepare('DELETE FROM login WHERE id=?');