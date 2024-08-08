<?php 

	require_once'connection_dataBase.php';

	$deleteMessage=$pdo->prepare('DELETE FROM contacts WHERE id=?');