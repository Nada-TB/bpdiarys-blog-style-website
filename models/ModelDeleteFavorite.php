<?php

	require_once 'connection_dataBase.php';

	$deleteFavorite=$pdo->prepare('DELETE FROM favorite_articles WHERE id=? AND login_Id=?');