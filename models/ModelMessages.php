<?php 
	require_once 'connection_dataBase.php';

	$response=$pdo->prepare('SELECT * FROM contacts ORDER BY timeDate DESC');
	$response->execute();
	$messages=$response->fetchAll();