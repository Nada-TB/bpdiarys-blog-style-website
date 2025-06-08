<?php
session_start();

$allowedPages = ['home', 'bio', 'contact', 'favorite', 'profile', 'login', 'logout', 'register'];
$currentPage = in_array($_GET['action'] ?? 'home', $allowedPages, true)
    ? $_GET['action']
    : 'home';



// Define a whitelist of valid actions
$validActions = [
    'home', 'bio', 'contact', 'subscribe', 'login','register', 'signIn', 'signUp', 'logout', 'article',
    'favorite', 'addFavorite', 'deleteFavorite', 'addComment', 'deleteComment', 'profile',
    'verify', 'deleteAccount', 'tools', 'deleteArticle', 'editArticle', 'writeArticle',
    'messages', 'deleteMessage', 'forgottenPassword', 'resetPassword', 'deleteSubscriber','deleteProfile','editProfile', 'admin', 'adminHomePage','adminSignIn','adminLogOut'
];

// Define action to controller mapping
$controllers = [
    'home' => 'homePage.php',
    'bio' => 'whoIam.php',
    'contact' => 'contactMe.php',
    'subscribe' => 'subscribe.php',
    'login' => 'login.php',
    'register'=>'register.php',
    'signIn' => 'signIn.php',
    'signUp' => 'signUp.php',
    'logout' => 'signOut.php',
    'article' => 'showArticle.php',
    'addFavorite' => 'addFavoriteArticle.php',
    'favorite' => 'favoriteArticle.php',
    'deleteFavorite' => 'deleteFavorite.php',
    'addComment' => 'addComment.php',
    'deleteComment' => 'deleteComment.php',
    'profile' => 'profile.php',
    'editProfile'=> 'editProfile.php',
    'deleteProfile'=>'deleteProfile.php',
    'verify' => 'verify.php',
    'deleteAccount' => 'deleteAccount.php',
    'tools' => 'tools.php',
    'deleteArticle' => 'deleteArticle.php',
    'editArticle' => 'editArticle.php',
    'writeArticle' => 'writeArticle.php',
    'messages' => 'messages.php',
    'deleteMessage' => 'deleteMessage.php',
    'forgottenPassword' => 'forgottenPassword.php',
    'resetPassword' => 'resetPassword.php',
    'deleteSubscriber' => 'deleteSubscriber.php',
    'admin' => 'admin.loginPage.php',
    'adminHomePage'=>"admin.homePage.php",
    'adminSignIn'=>"admin.signIn.php",
    'adminLogOut'=>"admin.logout.php"

];

try {
    // Retrieve and sanitize the action parameter
    $action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : 'home';

    // Check if the action is valid
    if (in_array($action, $validActions) && array_key_exists($action, $controllers)) {
        include 'controllers/' . $controllers[$action];
    } else {
        // Default to home page if action is invalid
        include 'controllers/homePage.php';
    }
} catch (Exception $e) {
    // Handle exceptions and show a user-friendly error message
    // $title = "Budding Programmer Diary";
    // $description = "Are you code newbie? Do you quit a promising career to jump into the tech world, without any programming basics, dealing every single day with the septic judgment of your entourage? Good news, me too! Here is my daily!";
    // $message = "Sorry, this website isn't available at the moment";
    // $template = 'errorPage';
    // include 'views/layout.phtml';
    echo $e->getMessage();
}

// Additional security considerations:
// - Ensure sessions are managed securely (e.g., regenerate session ID on login/logout)
// - Validate all user inputs and sanitize outputs in the included controllers

