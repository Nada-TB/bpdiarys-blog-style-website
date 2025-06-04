<?php
require_once 'models/ModelAddComment.php';
require_once 'models/utilities.php';

$articleId = intval($_POST['articleId']);
if (array_key_exists('connected', $_SESSION) && $_SESSION['connected'] === "connected") {
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$name = sanitize_input($_POST['name']);
		$message = sanitize_input($_POST['message']);	
		$userId = intval($_POST['userId']);

		$condition = !empty($name ?? '') && !empty($message ?? '') && isset($articleId) && isset($userId);
		if ($condition) {
			$addComment->execute([$name, $message, $articleId, $userId]);
			header('Location:index.php?action=article&articleId=' . urlencode($articleId) ."&success=commentSuccess#comments");
			exit();
		} else {
			header('Location: index.php?action=article&articleId=' . urlencode($articleId) . '&error=commentFailed#actionComment');
			exit();
		}
	} else {
		header('Location: index.php?action=article&articleId=' . urlencode($articleId));
		exit();
	}
} else {
	header('Location: index.php?action=article&articleId=' . urlencode($articleId));
	exit();
}
