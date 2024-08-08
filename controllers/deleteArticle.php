<?php 

	require_once'models/utilities.php';
	require_once'models/MessagesNumber.php';
	require_once'models/ModelDeleteArticle.php';

	if(array_key_exists('statusMember', $_SESSION) && $_SESSION['statusMember']=="admin"){

		if(array_key_exists('article', $_GET) && ctype_digit($_GET['article'])){
			$delete_Comment_Article->execute([test_input($_GET['article']) ]);
		
			$deleteArticle->execute([test_input($_GET['article'])]);
			header('location:index.php?action=tools');
			exit();

		}else{
			header('location:index.php?action=tools');
			exit();
		}

	}else{
		header('location:index.php?action=home');
		exit();
	}