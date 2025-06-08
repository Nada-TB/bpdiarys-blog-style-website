<?php
	function sanitize_input($data) {
    $data = trim($data);
     // Normalize encoding to UTF-8
    $data = mb_convert_encoding($data, 'UTF-8', 'UTF-8');

    // Strip control characters (ASCII < 32, except \n, \r, \t)
    $data = preg_replace('/[^\P{C}\n\r\t]/u', '', $data);
    return $data;
}


	