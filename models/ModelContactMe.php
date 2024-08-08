<?php

require_once "connection_dataBase.php";

try {
	// Prepare SQL statement for inserting contact form data
	$sendMessage = $pdo->prepare('INSERT INTO contacts(firstName, email, subject, content, timeDate) VALUES(?, ?, ?, ?, NOW())');
} catch (PDOException $e) {
	 // Log the error for debugging
	 error_log('Database preparation error: ' . $e->getMessage());

	 // Display a user-friendly error message
	$title = "Budding Programmer Diary";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$message = 'An error occurred while preparing your message submission. Please try again later.';
	$template = 'errorPage';
	include 'views/layout.phtml';
	exit;
}
