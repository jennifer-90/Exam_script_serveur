<?php

$x = $_SESSION['user_id'];

if (!empty($x)) {

    $msg = '';

    if (!empty($_POST['id'])) {

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $pwd   = password_hash($_POST['n_password'], PASSWORD_DEFAULT);

        if ($x == $_POST['id']) {
            $user            = getUser('id', $_POST['id']);
            $modified_values = [];
            $param           = [];

            if (!empty($_POST['n_password']) && !empty($_POST['o_password'])) {
                if (password_verify($_POST['o_password'], $user->password)) {
                    if ($_POST['o_password'] != $_POST['n_password']) {
                        $modified_values[]       = 'password = ?';
                        $param[]                 = $pwd;
                        $msg                     .= 'Modification du password réussie<br>';
                        $_SESSION['alert-color'] = 'success';
                    } else {
                        $msg .= 'Mot de passe identique';
                    }
                } else {
                    $msg .= 'Mauvais mot de passe<br>';
                }
            }

            if ($email != $user->email) {
                if (userExist('email', $email)) {
                    $msg .= 'Il est des nôôôôôtre ! <br>';
                } else {
                    $modified_values[]       = 'email = ?';
                    $param[]                 = $email;
                    $msg                     .= 'Email modifié';
                    $_SESSION['alert-color'] = 'success';
                }
            } else {
                echo 'Veuillez choisir une autre email';
            }

            if (!empty($modified_values)) {
                $connexion = connexion();
                $sql       = 'update user set ' . implode(', ', $modified_values) . ' where id = ?';
                $param[]   = $user->id;
                $requete   = $connexion->prepare($sql);
                $requete->execute($param);
            }

        } else {
            $msg .= 'Vous n\avez pas le droit de modifier ce profil';
        }

    } else {
        $_SESSION['alert']       = '&#9940; ' . $msg . ' ;&#9940;';
        $_SESSION['alert-color'] = 'danger';
        header('Location: index.php?sent=app/update');
        die;
    }
}

$_SESSION['alert'] = $msg;
header('Location: index.php?sent=page/profile');
die;