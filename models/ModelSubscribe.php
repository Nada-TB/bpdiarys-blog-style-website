<?php
require_once "connection_dataBase.php";

try {

	// Check if email already exists in the subscriber's mail list

	$checkEmail = $pdo->prepare('SELECT mail FROM subscribe WHERE mail=?');

	// Add a new mail subscriber
	$addSubscriber = $pdo->prepare('INSERT INTO subscribe (mail) VALUES (?)');

	// Get the list of subscribers
	$getAllSubscribers = $pdo->prepare('SELECT mail FROM subscribe');
	$getAllSubscribers->execute();
	$subscribersList = $getAllSubscribers->fetchAll(PDO::FETCH_COLUMN);

	// Delete a subscriber
	$deleteSubscriber = $pdo->prepare('DELETE FROM subscribe WHERE mail = ?');
} catch (PDOException $e) {
	//Handle exceptions and show a user-friendly error message
	$title = "Budding Programmer Diary";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$message = 'An error occurred while subscribing. Please try again later.';
	$template = 'errorPage';
	include 'views/layout.phtml';

	// Optionally log the error for debugging
	error_log('Database error: ' . $e->getMessage());
}
