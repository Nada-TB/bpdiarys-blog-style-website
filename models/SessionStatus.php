<?php
session_start();

if(!empty($_SESSION)){
	$table=$_SESSION['connected'];
	$json=json_encode($table);
	echo $json;
}else{

	$table="not connected";
	$json=json_encode($table);
	echo $json;
}