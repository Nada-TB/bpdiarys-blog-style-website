<?php 

	require_once 'connection_dataBase.php';

	$getArticle=$pdo->prepare('SELECT * FROM articles WHERE id=?');
	
	$updateArticle=$pdo->prepare('UPDATE articles SET title=?, content=?, image=?,writer=?, description=?, validation=?, login_Id=? WHERE id=?');