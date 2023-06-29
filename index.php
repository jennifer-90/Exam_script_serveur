<?php
session_start(['cookie_lifetime' => 3600]);


require_once 'config.php';
require_once 'lib/fct_menu.php';
require_once 'lib/connexion_pdo.php';
require_once 'lib/librairy.php';


require_once 'page/header.html';
include_once 'page/menu.php';


$connexion = connexion();


if (!empty($_SESSION['alert'])) {
    if (!empty($_SESSION['alert-color'])
        && in_array($_SESSION['alert-color'], ['danger', 'info', 'success', 'warning']) // white-list
    ) {
        $alertColor = $_SESSION['alert-color'];
        unset($_SESSION['alert-color']);
    } else {
        $alertColor = 'danger';
    }
    echo '<div class="alert alert-' . $alertColor . '">' . $_SESSION['alert'] . '</div>';
    unset($_SESSION['alert']);
}


if (!empty($_GET['sent'])) {
    extension($_GET['sent']);
}


require_once 'page/header.html';





