<?php 

try {
  if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== 'connected') {

    $title="Admin login page ";
    $description="This is the logging page for admin";
     
    // Define the template to be used
    $template='admin.loginPage';

     // Include the layout file to render the page
    include 'views/admin.layout.phtml';
    exit;

  }else{
    header ("location:index.php?action=adminHomePage");
    exit();
  }

    

}catch(Exception $e){
    error_log($e->getMessage());

}