<?php
	require_once 'connection_dataBase.php';

try {
    // Check if the user is an admin
    if (isset($_SESSION['statusMember']) && $_SESSION['statusMember'] === "admin") {
        // Prepare and execute the SQL statement
        $stmt = $pdo->prepare('SELECT count(id) AS messagesNumber FROM contacts');
        $stmt->execute();
        $messagesNumber = $stmt->fetch(PDO::FETCH_ASSOC);

        // Retrieve the count of messages
        $number = $messagesNumber['messagesNumber'];
    } else {
        // Optionally handle the case where the user is not an admin
        $number = 0;
    }
} catch (PDOException $e) {
    // Log the error for debugging
    error_log('Database query error: ' . $e->getMessage());

    // Handle the error (e.g., set a default value or show an error message)
    $number = 0; // Set a default value in case of an error
}
