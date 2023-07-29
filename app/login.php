<?php

/* -- page/login  ==>  °°app/login°°  ==>  index.php  -- */

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $connexion = connexion();

    foreach ($_POST as $key => $values) {
        $$key = $values;
    }

    $param = [
        $username
    ];

    if (userExist('username', $_POST['username'])) {

        $sql = $connexion->prepare("SELECT password FROM user WHERE username = ?");
        $sql->execute($param);
        $pwdDb = $sql->fetchObject();

        if (password_verify($password, $pwdDb->password)) {

            $time_connect = $connexion->prepare("UPDATE user SET lastlogin = NOW() WHERE username = ? ");
            $time_connect->execute($param);

            /* Définir la session de l'utilisateur connecté */

            $id = $connexion->prepare("SELECT id FROM user WHERE username = ?");
            $id->execute($param);
            $user_id             = $id->fetchColumn();
            $_SESSION['user_id'] = $user_id;

            $_SESSION['alert']       = 'Bienvenue ' . $username . '!';
            $_SESSION['alert-color'] = 'success';
            header('Location: index.php?sent=page/profile');
            die;

        } else {
            $_SESSION['alert']       = '&#9940; Mauvais mot de passe &#9940;';
            $_SESSION['alert-color'] = 'danger';
            header('Location: index.php?sent=page/login');
            die;
        }

    } else {
        $_SESSION['alert']       = '&#9940; Cet utilisateur n\'existe pas &#9940;';
        $_SESSION['alert-color'] = 'danger';
        header('Location: index.php?sent=page/login');
        die;
    }

} else {
    $_SESSION['alert']       = '&#9940; Veuillez remplir les champs &#9940;';
    $_SESSION['alert-color'] = 'danger';
    header('Location: index.php?sent=page/login');
    die;
}

