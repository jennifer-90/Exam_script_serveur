<?php
$x = $_SESSION['user_id'];

$connexion = connexion();
$sql       = $connexion->prepare("SELECT username FROM user WHERE id = ?");
$sql->bindValue(1, $x);
$sql->execute();
$name_user = $sql->fetchColumn();

session_destroy();

session_start();
echo $name_user;
$_SESSION['alert']       = '&#128075; Au revoir ' . $name_user . ' , à bientôt ! &#128075; ';
$_SESSION['alert-color'] = 'success';

header('Location: index.php?sent=page/login');
die;

