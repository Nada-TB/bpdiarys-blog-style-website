<?php

	require_once'models/utilities.php';
	require_once'models/ModelResetPassword.php';
	require_once 'models/ModelSignIn.php';

	if($_SERVER['REQUEST_METHOD']!== "POST"){
		$title= "Reset Password";
		$description="Want more interaction with bpdiarys? Get your free account to save and comment on your favorites posts! Let's progress together";
		$template="resetPassword";
		include 'views/layout.phtml';

	}else{
		if(!empty($_POST['mail']) && !empty($_POST['pass'])&& !empty($_POST['passConfirm'])){
			$getMember->execute([test_input($_POST['mail'])]);
			$member=$getMember->fetch();

			if(test_input($_POST['mail']) == $member['email']){
				$updatePassword->execute([password_hash($_POST['pass'], PASSWORD_DEFAULT), password_hash($_POST['passConfirm'], PASSWORD_DEFAULT),test_input($_POST['mail'])]);
				header('location:index.php?action=resetPassword&&comment=success');
				exit();

			}else{

				header('location:index.php?action=forgottenPassword&&comment=inexistent');
				exit();
			}
		}

	}
