<?php
if(!empty($_SESSION) && $_SESSION['statusMember']==="admin"){
    try {
        $title="Admin home page";
        $description="This the admin panel";
        $template="admin.homePage";
        $articleNumber=3;
        $messagesNumber=11114;
        $commentsNumber=12;
        include ('views/admin.layout.phtml');
        exit;
    
    } catch (Exception $e) {
        error_log($e->getMessage());
    }
}else{
    $description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$title = "Budding Programmer Diary's";
	$message = "Access Denied! You don't have permission to view this page";
	$template = 'errorPage';
	// Log error for debugging
	//error_log($e->getMessage());
	include 'views/admin.layout.phtml';
	exit;
}
