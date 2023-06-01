<?php

/* -- page/create  ==> °°app/create°° ==> DB  -- */

$url= 'index.php?sent=page/create';

if(!empty($_POST['username']) && filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) && ($_POST['password'])){

    foreach($_POST as $key => $values){
        $$key = $values;
    }

    $parametre_requete=[
        trim($username),
        password_hash($password, PASSWORD_DEFAULT),
        $email,
    ];

    /* - - - - CONNEXION A LA DB - - - - */

    /* - CONNECT - */

    global $connexion;

    /* - QUERY - */

    $requete = $connexion->prepare("INSERT INTO user (username, password, email, created ) VALUES (?, ?, ?, NOW() )");

    /* - EXECUTE - */

    $requete->execute($parametre_requete);

    $url= 'index.php?sent=page/profile';



} else {
    echo 'Les champs sont vides';
}

header('Location'. $url);
echo 'bienvenue '.$username;
