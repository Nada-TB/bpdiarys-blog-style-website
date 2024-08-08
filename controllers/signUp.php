<?php

require_once "models/MessagesNumber.php";
require_once "models/utilities.php";
require_once 'models/ModelSignUp.php';
require_once 'models/ModelSubscribe.php';

try {
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$namePattern = '/^([a-zA-Z ]{3,10})*$/';
		$emailPattern = "/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/";
		$name = sanitize_input($_POST['name']);
		$email = sanitize_input($_POST['email']);
		$password = sanitize_input($_POST['password']);
		$passwordConfirm = sanitize_input($_POST['passConfirm']);
		$valueNotEmpty = !empty($name) && !empty($email) && !empty($password) && !empty($passwordConfirm);
		// $valueNotEmpty = isset($name) && !empty($name) &&
		// 	isset($email) && !empty($email) &&
		// 	isset($password) && !empty($password) &&
		// 	isset($passwordConfirm) && !empty($passwordConfirm);

		if ($valueNotEmpty) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				//check if email already exists in member's list
				$checkMember->execute([$email]);
				$member = $checkMember->fetch(PDO::FETCH_ASSOC);

				//check if email already exists in subscriber's list
				$checkEmail->execute([$email]);
				$subscriberEmail = $checkEmail->fetch(PDO::FETCH_ASSOC);

				if ($member === false) {
					if ($passwordConfirm === $password) {
						if (preg_match($namePattern, $name)) {
							$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
							$create_account->execute(array($name, $email, $hashedPassword));
							if ($subscriberEmail === false) {
								$addSubscriber->execute([$email]);
							}

							header("location:index.php?action=register&&success=success");
							exit();
						} else {
							header("location:index.php?action=register&&error=invalidName");
							exit();
						}
					} else {
						header("location:index.php?action=register&&error=mismatchPassword");
						exit();
					}
				} else {
					header("location:index.php?action=register&&error=exist");
					exit();
				}
			} else {
				header("location:index.php?action=register&&error=invalidEmail");
				exit();
			}
		} else {
			header("location:index.php?action=register&&error=errorfield");
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
