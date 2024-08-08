<?php

	require_once'models/utilities.php';
	require_once'models/ModelDeleteMessage.php';
	require_once'models/MessagesNumber.php';

	if(array_key_exists('statusMember', $_SESSION) && $_SESSION['statusMember']=="admin"){
		
		$deleteMessage->execute([intval($_GET['message'])]);
		header('location:index.php?action=messages');
		exit();
	}else{
		header('location:index.php?action=home');
		exit();
	}

