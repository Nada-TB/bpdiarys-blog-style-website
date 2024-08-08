<?php 

	require_once 'connection_dataBase.php';

	$response=$pdo->prepare('SELECT *  FROM articles ORDER BY timeDate DESC ');
	$response->execute();
	$articles=$response->fetchAll();
