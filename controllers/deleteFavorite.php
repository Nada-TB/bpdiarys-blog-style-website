<?php

require_once "models/utilities.php";
require_once 'models/ModelDeleteFavorite.php';

if (array_key_exists('connected', $_SESSION) && $_SESSION['connected'] === "connected") {
	if (array_key_exists('favoriteId', $_GET) && intval($_GET['favoriteId'])) {
		$favoriteId=intval($_GET['favoriteId']);
		$userId=intval($_SESSION['id']);

		$deleteFavorite->execute([$favoriteId, $userId]);
		header('location:index.php?action=favorite&&success=success');
		exit();
	}
} else {
	header("index.php?action=home");
	exit();
}
