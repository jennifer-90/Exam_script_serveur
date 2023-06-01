<?php

include_once 'config.php';
include_once 'lib/fct_menu.php';
include_once 'lib/connexion_pdo.php';

require_once 'page/header.html';
require_once 'page/menu.php';


$connexion= connexion();





if(!empty($_GET['sent'])){
    extension($_GET['sent']);
}





require_once 'page/header.html';