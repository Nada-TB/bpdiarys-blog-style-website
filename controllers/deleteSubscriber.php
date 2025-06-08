<?php
	require_once 'models/utilities.php';
	require_once 'models/MessagesNumber.php';
    require_once 'models/ModelSubscribe.php';


    if($_SERVER['REQUEST_METHOD']!== "POST"){
		$title= "Delete subscriber";
		$description="Want more interaction with bpdiarys? Get your free account to save and comment on your favorites posts! Let's progress together";
		$template="deleteSubscriber";
		include 'views/layout.phtml';

	}else{
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$email=sanitize_input($_POST['email']);
			$checkEmail ->execute([$email]);
			$subscriber=$checkEmail ->fetch();
		
			if($email === $subscriber['mail']){
                $deleteSubscriber->execute([$email]);

				header('location:index.php?action=deleteSubscriber&&comment=success');
				exit();
			}else{

				header('location:index.php?action=deleteSubscriber&&comment=inexistent');
				exit();
			}

		}else{
			header('location:index.php?action=deleteSubscriber&&comment=invalidEmail');
			exit();
		}
	}