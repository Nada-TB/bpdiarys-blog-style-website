<?php

	require_once'connection_dataBase.php';

	$delete_Comment_Article= $pdo->prepare('DELETE comments FROM comments INNER JOIN login ON comments.comment_Id=login.id WHERE article_Id=?');

	$deleteArticle= $pdo->prepare('DELETE FROM articles WHERE id=?');