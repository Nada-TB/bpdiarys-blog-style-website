<?php

require_once "connection_dataBase.php";

try {
	// Prepare SQL statements
	$getArticle = $pdo->prepare('SELECT * FROM articles WHERE id=?');
	$getCommentNumber = $pdo->prepare('SELECT count(id) AS commentNumber FROM comments WHERE article_Id=?');
	$getComments = $pdo->prepare('SELECT id, name, content, timeDate, comment_Id, article_Id FROM comments WHERE article_Id=? ORDER BY timeDate DESC');
} catch (PDOException $e) {
	// Optionally log the error for debugging
	error_log('Database error: ' . $e->getMessage());

	 // Set error message and include error template
	$title = "Database Error";
    $description = "An error occurred while preparing the database queries. Please try again later.";
    $message = 'An error occurred while preparing the database queries. Please try again later.';
    $template = 'errorPage';
    
    include 'views/layout.phtml';

}
