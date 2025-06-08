<?php 
try{ 
    require_once "models/MessagesNumber.php";
    require_once "models/utilities.php";
    require_once 'models/ModelSubscribe.php';
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
// Initialize variables
$description = "You may randomly come across the budding programmer diary's. You want to pursue the adventure of code newbie whether you belong or not to the dev community! Don't hesitate, subscribe!";


// Validate and sanitize email
try {
    // Check if email is provided and valid
    if (empty($_POST['newsletterEmail']) || !filter_var($_POST["newsletterEmail"], FILTER_VALIDATE_EMAIL)) {
        $title = "Invalid Mail";
        $message = "Sorry, your mail is invalid";    
    } else {
        // Sanitize the input email
        $input_email = sanitize_input($_POST['newsletterEmail']);
        
       //execute statement to check if email exist
        $checkEmail->execute([$input_email]);
        $subscriberMail = $checkEmail->fetch(PDO::FETCH_ASSOC);
        
        // Handle email existence
        if ($subscriberMail === false) {
            // Email does not exist, insert new email
            $addSubscriber->execute([$input_email]);
            $title = "Subscribe Page";
            $message = "Thanks for subscribing";
        } else {
            // Email already exists
            $title = "Subscribe Error";
            $message = "This mail already exists, if you don't receive our newsletter, please check your spam";
        }
    }
} catch (PDOException $e) {
     // Handle database errors
    error_log('Database error: ' . $e->getMessage());
    $title = "Database Error";
    $message = "An error occurred while processing your subscription. Please try again later.";
} catch (Exception $e) {
    // Handle general errors
    error_log('General error: ' . $e->getMessage());
    $title = "General Error";
    $message = "An unexpected error occurred. Please try again later.";
}

// Include the template to display the result
$template = "subscribe";
include 'views/layout.phtml';

