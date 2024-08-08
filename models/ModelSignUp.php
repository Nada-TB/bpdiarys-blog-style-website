<?php

require_once "connection_dataBase.php";

try {
	//check if email already exists		
	$checkMember = $pdo->prepare('SELECT * FROM login WHERE email=?');

	//Create new account
	$create_account = $pdo->prepare('INSERT INTO login(name,email,password) VALUES(?, ?, ?)');
} catch (PDOException $e) {
	// Log the error for debugging
	error_log('Database preparation error: ' . $e->getMessage());

	// Display a user-friendly error message
	$title = "Budding Programmer Diary";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$message = 'An error occurred while processing your request. Please try again later.';
	$template = 'errorPage';
	include 'views/layout.phtml';
	exit;
}
