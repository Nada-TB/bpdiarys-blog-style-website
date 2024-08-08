<?php

require_once 'connection_dataBase.php';

$addComment = $pdo->prepare('INSERT INTO comments(name,content,timeDate,article_Id,comment_Id ) VALUES(?,?,NOW(),?,?)');
