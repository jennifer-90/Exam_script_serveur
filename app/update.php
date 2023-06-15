<?php


$x = $_SESSION['user_id'];

if(!empty($_SESSION['user_id'])){

    if(!empty($_POST['email']) || !empty($_POST['password'])){


        $email= filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);


        $connexion = connexion();

        $query = $connexion->prepare("UPDATE user SET email = ? ,password = ? WHERE id = ?");

        $query->bindValue(1,$email);
        $query->bindValue(2, $x);
        $query->execute();

        header('Location: index.php?sent=page/profile');
        $_SESSION['alert']       = 'Votre email à bien été modifié :)';
        $_SESSION['alert-color'] = 'success';

    }
}

