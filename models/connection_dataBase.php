<?php

	try{
		$pdo= new PDO("mysql:host=localhost;dbname=bpdiarys-db;charset=UTF8", "root",""

		);
		
	}catch(Exception $e){
		throw new Exception("Error Processing Request", 1);
		$title="Budding Programmer Diary's";
		$description="Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
		$message="Sorry, this web site isn't available at the moment";
		$template= 'errorPage';
		include 'views/layout.phtml';
	}