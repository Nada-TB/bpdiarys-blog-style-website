<?php 
	require_once 'models/MessagesNumber.php';

	if(!empty($_SESSION)&& $_SESSION['connected']==="connected"){
		$title="delete profile";
		$description="Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
		$template="verification";
		include 'views/layout.phtml';
	}else{
		header('location:index.php?action=home');
		exit();
	}