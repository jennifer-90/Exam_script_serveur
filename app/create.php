<?php

/* -- page/create  ==> °°app/create°° ==> DB  ==>  page/login -- */

$url= 'index.php?sent=page/create';
$message = '';

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

    if($requete->rowCount()){
        $url= 'index.php?sent=page/login';
    }

} else {
    echo 'Les champs sont vides';
    }


header('Location:'. $url);
echo $message.='Bienvenue '.$username;
die;