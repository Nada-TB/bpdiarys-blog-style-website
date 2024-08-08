<?php

include_once 'connection_dataBase.php';

$updateProfile = $pdo->prepare('UPDATE login SET name =?, email =?, password=?, passwordConfirmation=? WHERE id=?');

$getMemberAccount = $pdo->prepare('SELECT * FROM login WHERE email=?');
