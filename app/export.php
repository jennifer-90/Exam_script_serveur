<?php

session_start();

if (!empty($_SESSION['user_id'])) {
    require_once '../config.php';
    require_once '../lib/connexion_pdo.php';
    require_once '../lib/json.php';

    $user = getUser('id', $_SESSION['user_id']);

    unset($user->password);

    exportJSON($user);
}

