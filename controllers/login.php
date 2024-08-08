<?php
	
require_once "models/MessagesNumber.php";

	try{
		 // Set the page title and description
		$title="login page";
		$description="Want more interaction with bpdiarys? Get your free account to save and comment on your favorites posts! Let's progress together";
		 
		// Define the template to be used
		$template='logIn';

		 // Include the layout file to render the page
		include 'views/layout.phtml';
		exit;

	}catch (Exception $e){
		// Handle exceptions by displaying an error page
	  	$title="Budding Programmer Diary's";
	  	$description="Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
		$message="Sorry, this web site isn't available at the moment";
		$template= 'errorPage';

		// Log the exception message for debugging purposes
		error_log('Exception: ' . $e->getMessage());
		// Include the error page layout
		include 'views/layout.phtml';
		exit;
	}