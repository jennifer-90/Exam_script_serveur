<?php

$x = $_SESSION['user_id'];

if(!empty($x)){

    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ;
    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $msg = 'Les champs modifié(s): <br>: ';

    if(!empty($_POST['email']) || !empty($_POST['password'])){

        $sql = "UPDATE user SET ";

        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $sql .= "`email` = '$email', `password` = '$pwd'";
            $msg .= ' - email & mot de passe';

        } elseif(!empty($email)){
            $sql .= "`email` = '$email'";
            $msg .= ' - email';

        } elseif(!empty($pwd)){
            $sql .= "`password` = '$pwd'";
            $msg .= ' - mot de passe';

        }

        $sql .= " WHERE `id`= $x";

        $connexion = connexion();
        $query = $connexion->query($sql);
        $query->execute();

        $_SESSION['alert']       = $msg;
        $_SESSION['alert-color'] = 'success';
        header('Location: index.php?sent=page/profile');
        die;

    } else{
        $_SESSION['alert']       = '&#9940; Vos champs sont vides &#9940;';
        $_SESSION['alert-color'] = 'danger';
        header('Location: index.php?sent=app/update');
        die;
    }
}

