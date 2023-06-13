<?php
session_start(['cookie_lifetime' => 3600]);



include_once 'config.php';
include_once 'lib/fct_menu.php';
include_once 'lib/connexion_pdo.php';
include_once 'lib/librairy.php';


require_once 'page/header.html';
require_once 'page/menu.php';














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





if(!empty($_GET['sent'])){
    extension($_GET['sent']);
}





require_once 'page/header.html';