<?php

try{
	require_once "models/ModelHomePage.php";
	require_once "models/MessagesNumber.php";
}catch(Exception $e){
	// Handle the error (log the error and display a user-friendly message)
    error_log('Error including model files: ' . $e->getMessage());
	$title = "Budding Programmer Diary";
    $description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
    $message = 'An error occurred while loading the necessary files. Please try again later.';
    $template = 'errorPage';
    include 'views/layout.phtml';
	exit;
}

// Check if the user is connected
$checkConnected = (isset($_SESSION['connected']) && $_SESSION['connected'] === "connected");

$title = "Budding Programmer Diary's";
$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
// Specify the template to use

$template = 'homePage';
if(file_exists('views/layout.phtml')){
	include 'views/layout.phtml';
}else{
	 // Handle the error (log the error and display a user-friendly message)
	 error_log('View layout file not found: views/layout.phtml');

	 echo 'The page layout could not be found. Please try again later.';
	 exit; // Stop execution to prevent further issues
}

