<?php

require_once "models/MessagesNumber.php";

try {
	$checkUserStatusConnected=isset($_SESSION['connected'])&& $_SESSION['connected']=== "connected";
	$title = "sign up page";
	$description = "Want more interaction with bpdiarys? Get your free account to save and comment on your favorites posts! Let's progress together";
	$template = 'signUP';
	include 'views/layout.phtml';
} catch (Exception $e) {
	// Log the exception message for debugging purposes
	error_log('Exception: ' . $e->getMessage());


	$title = "Budding Programmer Diary's";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$message = "Sorry, this web site isn't available at the moment";
	$template = 'errorPage';
	include 'views/layout.phtml';
}
