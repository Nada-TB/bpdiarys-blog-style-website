<?php
	require_once 'models/utilities.php';
	require_once'models/MessagesNumber.php';
    require_once 'models/ModelSubscribe.php';


    if($_SERVER['REQUEST_METHOD']!== "POST"){
		$title= "Delete subscriber";
		$description="Want more interaction with bpdiarys? Get your free account to save and comment on your favorites posts! Let's progress together";
		$template="deleteSubscriber";
		include 'views/layout.phtml';

	}else{
		if(!empty($_POST['mail'])){
			$response->execute([test_input($_POST['mail'])]);
			$subscriber=$response->fetch();
			
			if(test_input($_POST['mail']) == $subscriber['mail']){
                $deleteSubscriber->execute([test_input($_POST['mail'])]);

				header('location:index.php?action=deleteSubscriber&&comment=success');
				exit();
			}else{

				header('location:index.php?action=deleteSubscriber&&comment=inexistent');
				exit();
			}

		}
	}