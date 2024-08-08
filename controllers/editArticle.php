<?php 

	require_once 'models/utilities.php';
	require_once 'models/MessagesNumber.php';
	require_once 'models/ModelEditArticle.php';

	if(array_key_exists('statusMember', $_SESSION) && $_SESSION['statusMember']=="admin"){
		$getArticle->execute([intval($_GET['article'])]);
		$post=$getArticle->fetch();

		if($_SERVER['REQUEST_METHOD']!=="POST"){

			$title="Edit an article";
			$description="Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
			
			$template='editArticle';

			include'views/layout.phtml';

		}else{

			$writer=$_SESSION['firstName']." ".$_SESSION['lastName'];
			$validation="valid";
			$image=$_FILES["image"];
	 		$fileName=$image['name'];

	 		if($fileName !==""){
	 			$path ='/css/images/'. $fileName;
				$destination = $_SERVER['DOCUMENT_ROOT'] .$path;
				move_uploaded_file($image['tmp_name'], $destination);
			}else{
				$path="";
			}
					
			$updateArticle->execute(array(test_input($_POST['title']),test_input($_POST['content']),$path,test_input($writer), test_input($_POST['description']), $validation,intval($_SESSION['id']), test_input($_POST['postId'])));

			header("location:index.php?action=tools");
			exit();
		}
		
	}else{
		header('location:index.php?action=home');
		exit();
	}