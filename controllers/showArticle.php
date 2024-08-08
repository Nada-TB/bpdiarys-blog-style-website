<?php

try {
	require_once "models/MessagesNumber.php";
	require_once "models/utilities.php";
	require_once 'models/ModelShowArticle.php';
} catch (Exception $e) {
	// Handle the error (log the error and display a user-friendly message)
	error_log('Error including model files: ' . $e->getMessage());
	$title = "Budding Programmer Diary";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$message = 'An error occurred while loading the necessary files. Please try again later.';
	$template = 'errorPage';
	include 'views/layout.phtml';
	exit;
}

try {

	// Validate 'articleId' from the query parameters
	if (!isset($_GET['articleId']) || !ctype_digit($_GET['articleId'])) {
		header('Location: index.php?action=home');
		exit();
	}
	// condition checking if the user is connected
	$checkUserConnected=(isset($_SESSION['connected']) && $_SESSION['connected'] === 'connected');

	// check if the user is admin
	$checkUserStatus=(isset($_SESSION['statusMember']) && $_SESSION['statusMember'] === 'admin');

	// Fetch article details
	$articleId = intval($_GET['articleId']);

	// Fetch the article
	$getArticle->execute([$articleId]);
	$article = $getArticle->fetch(PDO::FETCH_ASSOC);
	if ($article === false) {
		// Article not found
		header('Location: index.php?action=home');
		exit();
	}
	// Fetch the number of comments
	$getCommentNumber->execute([$articleId]);
	$commentNumber = $getCommentNumber->fetch(PDO::FETCH_ASSOC);

	// Fetch comments
	$getComments->execute([$articleId]);
	$comments = $getComments->fetchAll(PDO::FETCH_ASSOC);

	// Set title and description based on article data
	$title = htmlentities($article['title']);
	$description = htmlentities($article['description']);
	$template = 'showArticle';
	// Include the template to display the article
	include 'views/layout.phtml';
} catch (PDOException $e) {
	// Handle database errors
	error_log('Database error: ' . $e->getMessage());
	$title = "Database Error";
	$message = "An error occurred while processing this article. Please try again later.";
	$description = "An error occurred while preparing the database queries. Please try again later.";
	$template = 'errorPage';
	include 'views/layout.phtml';
	exit;
} catch (Exception $e) {
	// Handle general errors
	error_log('General error: ' . $e->getMessage());
	$title = "General Error";
	$message = "An unexpected error occurred. Please try again later.";
	$description = "An error occurred while processing this article. Please try again later.";
	$template = 'errorPage';
	include 'views/layout.phtml';
	exit;
}
