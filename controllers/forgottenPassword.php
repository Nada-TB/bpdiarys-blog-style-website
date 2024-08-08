<?php
require_once 'models/utilities.php';
require_once 'models/ModelSignIn.php';


try {
	$title = "Forgotten Password";
	$description = "Forgot your password? Enter your email to receive a link to reset it.";
	$template = "forgottenPassword";
	

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$email = sanitize_input($_POST['email']);

		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$getMember->execute([$email]);
			$member = $getMember->fetch(PDO::FETCH_ASSOC);

			if ($member) {
				$to = htmlentities($member['email']);
                $subject = "Password Reset Request";
                $token = bin2hex(random_bytes(32)); // Generate a unique token for security
                //$resetLink = "https://www.bpdiarys.com/resetPassword?token=$token";
				$resetLink = "https://www.bpdiarys.com/resetPassword";
                $txt = "Click the link below to reset your password:\n\n$resetLink";
                $headers = "From: infos@bpdiarys.com\r\n";
                $headers .= "Reply-To: infos@bpdiarys.com\r\n";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

				//   // Store the token in the database with a timestamp for validation
				//   $storeToken = $pdo->prepare('INSERT INTO password_resets (email, token, created_at) VALUES (?, ?, NOW())');
				//   $storeToken->execute([$email, $token]);

                mail($to, $subject, $txt, $headers);
				header('location:index.php?action=forgottenPassword&&comment=success');
				exit();
			} else {
				header('location:index.php?action=forgottenPassword&&comment=inexistent');
				exit();
			}
		}else{
			header('location:index.php?action=forgottenPassword&&comment=invalidEmail');
			exit();
		}
	}

	include 'views/layout.phtml';
} catch (Exception $e) {
	// Handle exceptions by displaying an error page
	$title = "Budding Programmer Diary's";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$message = "Sorry, this web site isn't available at the moment";
	$template = 'errorPage';

	// Log the exception message for debugging purposes
	error_log('Exception: ' . $e->getMessage());
	// Include the error page layout
	include 'views/layout.phtml';
	exit;
}
