<?php

require_once "connection_dataBase.php";

try {
			
	$getAdmin = $pdo->prepare('SELECT * FROM admins WHERE email=?');

	
	$create_newPassword = $pdo->prepare('INSERT INTO admins( username,email, password, is_verified, contact_email) VALUES (?,?,?,?,?)');

} catch (PDOException $e) {
	// Log the error for debugging
	error_log('Database preparation error: ' . $e->getMessage());

	// Display a user-friendly error message
	$title = "Budding Programmer Diary";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$message = 'An error occurred while processing your request. Please try again later.';
	$template = 'errorPage';
	include 'views/admin.layout.phtml';
	exit;
}