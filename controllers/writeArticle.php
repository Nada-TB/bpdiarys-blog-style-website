<?php

require_once 'models/utilities.php';
require_once 'models/MessagesNumber.php';
require_once 'models/ModelWriteArticle.php';
require_once 'models/ModelSubscribe.php';


$condition = array_key_exists('statusMember', $_SESSION) && htmlspecialchars($_SESSION['statusMember']) === "admin";

if ($condition) {
	$title = "Write an article";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$template = 'writeArticle';

	try {
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$valueNotEmpty = !empty(trim($_POST['title'] ?? '')) &&
				!empty(trim($_POST['content'] ?? '')) &&
				!empty(trim($_POST['description'] ?? ''))&&
				!empty(trim($_POST['writer'] ?? ''));

			if ($valueNotEmpty) {
				$writer = sanitize_input($_POST['writer']);
				$validation = "valid";
				$description = sanitize_input($_POST['description']);
				$title = sanitize_input($_POST['title']);
				$content = sanitize_input($_POST['content']);
				$id = intval($_SESSION['id']);

				// load the photo and store it in the images folder if it exists
				$image = $_FILES["image"];
				$fileName = $image['name'];
				if ($fileName !== "") {
					$path = '/bpdiarys-github/css/images/' . $fileName;
					$destination = $_SERVER['DOCUMENT_ROOT'] . $path;
					move_uploaded_file($image['tmp_name'], $destination);
				} else {
					$path = "";
				}

				$post = [$title, $content, $path, $writer, $description, $validation, $id];

				try {
					$success=$writeArticle->execute($post);
					if($success){
						// foreach ($subscribersList as $subscriber) {
						// 	$to = htmlentities($subscriber['mail']);
						// 	$subject = "Hello Folk, a new post is available on bpdiarys";
						// 	$txt = "Hi," . "\r\n" . "It's Nada, you have subscribed to my website to get informed when I post a new episode of my story" . "\r\n" . "Good news, a new article is coming heated from the oven ! Go check it on:  https://www.bpdiarys.com/ " . "\r\n" . "Feel free, to leave me a comment by signing In : https://www.bpdiarys.com/index.php?action=signUp" . "\r\n" . "You can also contact me if you wish: https://www.bpdiarys.com/index.php?action=contact" . "\r\n" . "Have a great day" . "\r\n" . "Nada" . "\r\n" . "if you want to unsubscribe click here: https://www.bpdiarys.com/deleteSubscriber";
						// 	$headers = "From: infos@bpdiarys.com";
						// 	mail($to, $subject, $txt, $headers);
						// }

						header("location:index.php?action=writeArticle&&success=success");
						exit();
					}else{
						header("location:index.php?action=writeArticle&&error=writePostError");
						exit();
					}
				} catch (PDOException $e) {
					// Handle any errors that occur during the execution
					echo 'Error: ' . $e->getMessage();
				}
				
			}else{
				header("location:index.php?action=writeArticle&&error=errorForm");
				exit();
			}
		}
	} catch (Exception $e) {
		$title = "General Error";
		$message = "An unexpected error occurred: " . $e->getMessage();
	}

	include 'views/layout.phtml';

} else {
	header("location:index.php?action=home");
	exit();
}
