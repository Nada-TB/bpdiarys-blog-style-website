<?php

require_once "models/MessagesNumber.php";
require_once "models/utilities.php";
require_once 'models/ModelAddFavoriteArticle.php';

$addFavoritePermission = sanitize_input($_SESSION['connected']) === 'connected' &&
	sanitize_input($_SESSION['statusMember']) === 'member'
	|| sanitize_input($_SESSION['statusMember']) === 'admin';

if ($addFavoritePermission) {
	 $condition= !empty(sanitize_input($_GET['title']) ?? '')
		&& !empty(intval($_GET['favoriteId']) ?? 0);

	if ($condition) {
		$url = "index.php?action=article&&articleId=" . intval($_GET['favoriteId']);
		$id = intval($_SESSION['id']);
		$title = sanitize_input($_GET['title']);
		$checkUrlExists->execute([$url, $id]);
		$result = $checkUrlExists->fetch(PDO::FETCH_ASSOC);

		if ($result['count'] === 0) {
			$insert_FavoriteArticle->execute([$title, $url, $id]);
			header('location:index.php?action=favorite');
			exit();
		} else {
			header("location:index.php?action=favorite&&error=exist");
			exit();	
		}
	}else{
		header('location:index.php?action=home');
		exit();
	}
} else {
	header('location:index.php?action=home');
	exit();
	
}
