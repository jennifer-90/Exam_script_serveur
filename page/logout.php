<?php

session_destroy();

session_start();
$_SESSION['alert'] = '&#128075; AU REVOIR ! &#128075; ';
$_SESSION['alert-color'] = 'success';

header('Location: index.php?sent=page/login');

