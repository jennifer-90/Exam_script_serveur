<?php

$name_user = $_SESSION['user_id'];
/* - A revoir pour pouvoir afficher le nom au lieu du n° de l'id - */

session_destroy();

session_start();
$_SESSION['alert'] = '&#128075; AU REVOIR '.$name_user.' ! &#128075; ';
$_SESSION['alert-color'] = 'success';

header('Location: index.php?sent=page/login');

