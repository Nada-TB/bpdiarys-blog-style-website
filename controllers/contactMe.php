<?php

require_once "models/MessagesNumber.php";
require_once "models/utilities.php";
require_once "models/ModelContactMe.php";

try {
	// Generate a CSRF token if not already set
	if (empty($_SESSION['csrf_token'])) {
		$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	}

	$csrf_token = $_SESSION['csrf_token'];


	$errorName = $errorMail = $errorMessage = $errorToken = "";
	$name = $email = $message = $subject = "";
	$action = "";
	$title = "Contact me";
	$template = 'contact';

	// Handle form submission
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// Check if CSRF token is present

		if (!isset($_POST['csrf_token'])) {
			throw new Exception("CSRF token missing.");
		}

		$submitted_token = sanitize_input($_POST['csrf_token']);
		$name = sanitize_input($_POST['name']);
		$email = sanitize_input($_POST['email']);
		$message = sanitize_input($_POST['message']);
		$subject = sanitize_input($_POST['subject']);

		$isNameValid = !empty($name) && preg_match("/^[a-zA-Z ]{3,50}$/", $name);
		$isEmailValid = !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL);
		$isMessageValid = !empty($message);
		$isSubjectValid = !empty($subject);

		// Ensure token comparison is secure
		$isTokenValid = hash_equals($csrf_token, $submitted_token);

		// Combine all conditions
		if ($isNameValid && $isEmailValid && $isMessageValid && $isTokenValid) {
			try {
				$sendMessage->execute([$name, $email, $subject, $message]);
				$action = "Thanks for your message! We'll get back to you as soon as we can.";
				$title = "Message Sent";
				// Clear form fields and CSRF token
				$name = $email = $message = $subject = "";
				unset($_SESSION['csrf_token']);
				$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
			} catch (Exception $e) {
				$title = "Contact Error";
				$action = "An error occurred while sending your message. Please try again later.";
				// Log error for debugging
				error_log($e->getMessage());
			}
		} else {
			// Set error messages based on validation failures
			$title = "Contact Error";
			$action = "Form is invalid.";

			if (!$isNameValid) {
				$errorName = "Name should be 3 to 50 letters long and contain only letters and spaces.";
			}
			if (!$isEmailValid) {
				$errorMail = "Invalid email address.";
			}
			if (!$isMessageValid) {
				$errorMessage = "Message cannot be empty.";
			}

			if (!$isTokenValid) {
				$errorToken = "Invalid CSRF token.";
			}
		}
	}
	$description = "The budding programmer diary is a space where everyone expresses himself. We belong to the dev community, and we will grow together. Your feedBack fires our motivation, so feel free to contact us ";
	include 'views/layout.phtml';
	exit;
} catch (Exception $e) {
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$title = "Budding Programmer Diary's";
	$message = "Sorry, this web site isn't available at the moment";
	$template = 'errorPage';
	// Log error for debugging
	error_log($e->getMessage());
	include 'views/layout.phtml';
	exit;
}

