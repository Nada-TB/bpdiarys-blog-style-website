<?php
	function sanitize_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Added encoding for better security
    return $data;
}


	// function test_input($data) {
	//   $data = trim($data);
	//   $data = stripslashes($data);
	//   $data = htmlspecialchars($data);
	//   return $data;
	// }