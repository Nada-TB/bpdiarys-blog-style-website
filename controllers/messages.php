<?php

require_once 'models/utilities.php';
require_once 'models/ModelMessages.php';
require_once 'models/MessagesNumber.php';

$condition = array_key_exists('statusMember', $_SESSION) && $_SESSION['statusMember'] === "admin" && $_SESSION['connected'] === "connected";

if (array_key_exists('statusMember', $_SESSION) && $_SESSION['statusMember'] === "admin") {
	$title = "messages";
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$template = "messages";
	include 'views/layout.phtml';
} else {
	header('location:index.php?action=home');
	exit();
}
