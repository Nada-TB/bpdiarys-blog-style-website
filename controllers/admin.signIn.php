<?php

require_once 'models/ModelAdminConnection.php';
require_once "models/utilities.php";

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = sanitize_input($_POST['email']);
        $password = sanitize_input($_POST['password']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $getAdmin->execute([$email]);
            $admin = $getAdmin->fetch(PDO::FETCH_ASSOC);

            if ($admin) {
                if (password_verify($password, $admin['password']) === true) {
                    // Session management
                    header('P3P: CP="CAO PSA OUR"'); // Handle cookies in IE
                    session_start();
                    session_regenerate_id(true);
                    // Store user details in session
                    $_SESSION['id'] = $admin['id'];
                    $_SESSION['name'] = $admin['username'];
                    $_SESSION['statusMember'] = $admin['role'];
                    $_SESSION['connected'] = "connected";
                    // Redirect to the home page
                    header('location:index.php?action=adminHomePage');
                } else {
                    echo "password incorrect";
                }
            } else {
                echo "admin doesn't exist";
            }
        } else {
            echo 'invalid email';
        }
    }
} catch (Exception $e) {
    // Log the exception message for debugging purposes
	 error_log('Exception: ' . $e->getMessage());

	 // Handle unexpected errors
	$description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
	$title = "Budding Programmer Diary's";
	$message = "Sorry, this web site isn't available at the moment";
	$template = 'errorPage';
	include 'views/admin.layout.phtml';
	exit;
}
