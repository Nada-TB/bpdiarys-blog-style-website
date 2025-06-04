<?php

	require_once 'models/utilities.php';
	require_once 'models/MessagesNumber.php';
	require_once 'models/ModelDeleteAccount.php';

	if(!empty($_SESSION)){

		$deleteFavorite->execute([sanitize_input($_SESSION['id'])]);

		$deleteComments->execute([sanitize_input($_SESSION['id'])]);

		$deleteAccount->execute([sanitize_input($_SESSION['id'])]);
		
		session_destroy();
		header("location:index.php?action=home");
		exit();
	}else{
		header('location:index.php?action=home');
		exit();
	}
