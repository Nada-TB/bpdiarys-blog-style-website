<?php

	require_once 'models/utilities.php';
	require_once 'models/ModelResetPassword.php';
	require_once 'models/ModelSignIn.php';

	if($_SERVER['REQUEST_METHOD']!== "POST"){
		$title= "Reset Password";
		$description="Want more interaction with bpdiarys? Get your free account to save and comment on your favorites posts! Let's progress together";
		$template="resetPassword";
		include 'views/layout.phtml';

	}else{
		$email= sanitize_input($_POST['email']);
		$password=sanitize_input($_POST['password']);
		$passwordConfirmation=sanitize_input($_POST['passConfirm']);
		if(!empty($email) && !empty($password)&& !empty($passwordConfirmation)){
			$getMember->execute([$email]);
			$member=$getMember->fetch();
			if($member){
				if($email === $member['email']){
					$updatePassword->execute([password_hash($password, PASSWORD_DEFAULT), password_hash($passwordConfirmation, PASSWORD_DEFAULT),$email]);
					header('location:index.php?action=resetPassword&&comment=success');
					exit();
	
				}else{
	
					header('location:index.php?action=resetPassword&&comment=errorMail');
					exit();
				}
			}else{
				header('location:index.php?action=forgottenPassword&&comment=inexistent');
				exit();
			}
	

		}else{
			header('location:index.php?action=resetPassword&&comment=emptyForm');
			exit();
		}
			
	}
