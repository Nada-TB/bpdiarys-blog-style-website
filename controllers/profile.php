<?php

// Include the necessary model for message numbers
require_once "models/MessagesNumber.php";

if (array_key_exists('statusMember', $_SESSION) && $_SESSION['statusMember'] === "admin" || $_SESSION['statusMember'] === "member") {
// Set page title and description
$title = "Profile";
$description = "Are you a code newbie? Did you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the skeptical judgment of your entourage? Good news, me too! Here is my daily journey!";

// Specify the template to be used
$template = 'profile';

// Include the main layout file to render the page
include 'views/layout.phtml';
}else{
    header('location:index.php?action=home');
    exit();
}
