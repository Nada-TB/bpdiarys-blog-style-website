<?php

require_once "models/MessagesNumber.php";
require_once "models/utilities.php";
require_once 'models/ModelSignIn.php';

try {
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		// Sanitize and validate email
		$email = sanitize_input($_POST['email']);
		$password = sanitize_input($_POST['password']);
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			// Prepare and execute the query to get the member
			$getMember->execute([$email]);
			$member = $getMember->fetch(PDO::FETCH_ASSOC);

			if ($member && password_verify($password, $member['password']) === true) {
				// Session management
				header('P3P: CP="CAO PSA OUR"'); // Handle cookies in IE
				session_start();
				session_regenerate_id(true);
				// Store user details in session
				$_SESSION['id'] = $member['id'];
				$_SESSION['name'] = $member['name'];
				$_SESSION['statusMember'] = $member['statusMember'];
				$_SESSION['tools'] = "tools";
				$_SESSION['logout'] = "logout";
				$_SESSION['connected'] = "connected";
				$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

				// Redirect to the home page
				header('location:index.php?action=home');
				exit();
			} else {
				// Invalid password or email
				header("location:index.php?action=login&&error=invalid");
				exit();
			}
		} else {
			// Invalid email format
			header('location:error=index.php?action=login&&error=invalidEmail');
			exit();
		}
	}
} catch (Exception $e) {
	 // Log the exception message for debugging purposes
	 error_log('Exception: ' . $e->getMessage());

	 // Handle unexpected errors
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$title = "Budding Programmer Diary's";
	$message = "Sorry, this web site isn't available at the moment";
	$template = 'errorPage';
	include 'views/layout.phtml';
	exit;
}
