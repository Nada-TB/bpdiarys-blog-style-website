<?php
require_once 'models/ModelDeleteComment.php';
require_once 'models/utilities.php';

$articleId = intval($_GET['articleId']);

if (array_key_exists('connected', $_SESSION) && sanitize_input($_SESSION['connected']) === "connected") {
	$commentId = intval($_GET['commentId']);
	$deleteComment->execute([$commentId]);
}

header('Location:index.php?action=article&&articleId=' . $articleId ."#comments");
exit();
