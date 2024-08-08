<?php 

	require_once 'connection_dataBase.php';
	
	$writeArticle=$pdo->prepare('INSERT INTO articles(title,content,image,writer,description, validation, login_Id,timeDate) VALUES(?,?,?,?,?,?,?,NOW())');