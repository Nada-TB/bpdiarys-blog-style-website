<?php

require_once "models/MessagesNumber.php";
require_once "models/utilities.php";
require_once 'models/ModelProfile.php';

if (array_key_exists('statusMember', $_SESSION) && $_SESSION['statusMember'] === "admin" || $_SESSION['statusMember'] === "member") {
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$template = "profile";
	$title = sanitize_input($_SESSION['name']) . "'s profile";

	try {
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$valueNotEmpty = isset($_POST['name']) && !empty(trim($_POST['name'])) &&
				isset($_POST['email']) && !empty(trim($_POST['email'])) &&
				isset($_POST['oldPassword']) && !empty(trim($_POST['oldPassword'])) &&
				isset($_POST['newPassword']) && !empty(trim($_POST['newPassword'])) &&
				isset($_POST['passwordConfirm']) && !empty(trim($_POST['passwordConfirm']));

			if ($valueNotEmpty) {
				$name = preg_match("/^([a-zA-Z ]{3,10})*$/", sanitize_input($_POST['name']));
				$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
				$password = preg_match("/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,15}$/", $_POST['newPassword']);
				$getMemberAccount->execute([$email]);
				$memberInfo = $getMemberAccount->fetch(PDO::FETCH_ASSOC);

				if (password_verify($_POST['oldPassword'], $memberInfo['password']) && $email === $memberInfo['email']) {

					if ($name && $email && $password) {
						$newUserInfo = [
							sanitize_input($_POST['name']),
							$email,
							password_hash((sanitize_input($_POST['newPassword'])), PASSWORD_DEFAULT),
							password_hash((sanitize_input($_POST['passwordConfirm'])), PASSWORD_DEFAULT),
							filter_var($_SESSION['id'], FILTER_VALIDATE_INT)
						];


						$updateProfile->execute($newUserInfo);

						$getMemberAccount->execute([$email]);
						$member = $getMemberAccount->fetch(PDO::FETCH_ASSOC);

						//to use session with IE browser
						header('P3P: CP="CAO PSA OUR"');
						session_start();
						session_regenerate_id(true);
						$_SESSION['id'] = $member['id'];
						$_SESSION['name'] = $member['name'];
						//$_SESSION['email']=$member['email'];
						$_SESSION['statusMember'] = $member['statusMember'];
						$_SESSION['tools'] = "tools";
						$_SESSION['logout'] = "logout";

						header("location:index.php?action=profile&&success=success");
						exit();
					}
				} else {
					header("location:index.php?action=profile&&error=errorPass");
					exit();
				}
			} else {
				header("location:index.php?action=profile&&error=errorForm");
				exit();
			}
		}
	} catch (Exception $e) {
		$title = "General Error";
		$message = "An unexpected error occurred: " . $e->getMessage();
	}

	include 'views/layout.phtml';
} else {
	header('location:index.php?action=home');
	exit();
}
