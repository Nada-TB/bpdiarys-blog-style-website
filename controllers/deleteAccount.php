<?php

	require_once 'models/utilities.php';
	require_once 'models/MessagesNumber.php';
	require_once 'models/ModelDeleteAccount.php';

	if(!empty($_SESSION)){

		$deleteFavorite->execute([test_input($_SESSION['id'])]);

		$deleteComments->execute([test_input($_SESSION['id'])]);

		$deleteAccount->execute([test_input($_SESSION['id'])]);
		
		session_destroy();
		header("location:index.php?action=home");
		exit();
	}else{
		header('location:index.php?action=home');
		exit();
	}
