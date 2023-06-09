<?php

/* -- page/create  ==> °°app/create°° ==> DB  ==>  page/login -- */

$url= 'index.php?sent=page/create';
$message = '';

if(!empty($_POST['username']) && filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) && ($_POST['password'])){

    if(userExist('username', ($_POST['username']))){
        $_SESSION['alert']       = '&#9940; Cet utilisateur existe déjà &#9940;';
        $_SESSION['alert-color'] = 'danger';
        header('Location: index.php?sent=page/create' );

    } else {


        foreach ($_POST as $key => $values) {
            $$key = $values;
        }


        $parametre_requete = [
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


        if ($requete->rowCount()) {
            $url = 'index.php?sent=page/login';

            $_SESSION['alert']       = 'Bienvenue ' . $username . ' ! Tu peux désormais te connecter :)';
            $_SESSION['alert-color'] = 'success';

        }


    } /* - Le "sinon" de ma fct userExist - */

/* - FIN DE MON TOUT PREMIER IF - */
} else {
    $_SESSION['alert'] = '&#9940; La création de votre compte a échouée, veuillez recommencer &#9940;';
    $_SESSION['alert-color'] = 'danger';
    }


header('Location:'. $url);
