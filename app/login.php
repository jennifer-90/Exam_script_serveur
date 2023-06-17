<?php

/* -- page/login  ==>  °°app/login°°  ==>  index.php  -- */

if(!empty($_POST['username']) && !empty($_POST['password'])){

    foreach ($_POST as $key => $values) {
        $$key = $values;
    }

    $param=[
        $username
        ];

    /* on vérifie si ces données existe bien dans la db*/
    if(userExist('username', [$_POST['username']])){

        /* test du mot de passe*/








        /*on fait la requete pour l'heure de connexion */
        global $connexion;
        $time_connect= $connexion->prepare("UPDATE user SET lastlogin = NOW() WHERE username = ? ");
        $time_connect->execute($param);

        /* Définir la session de l'utilisateur connecté */

        $id= $connexion->prepare("SELECT id FROM `user` WHERE username = ?");
        $id->execute($param);
        $user_id = $id->fetchColumn();
        $_SESSION['user_id']= $user_id;

        $_SESSION['alert']       = 'Bienvenue '. $username. '!';
        $_SESSION['alert-color'] = 'success';
        header('Location: index.php?sent=page/profile' );

    } else{
        $_SESSION['alert']       = '&#9940; Cet utilisateur n\'existe pas &#9940;';
        $_SESSION['alert-color'] = 'danger';
        header('Location: index.php?sent=page/login' );
    }

} else {
    $_SESSION['alert']       = '&#9940; Veuillez remplir les champs &#9940;';
    $_SESSION['alert-color'] = 'danger';
    header('Location: index.php?sent=page/login' );
    }

