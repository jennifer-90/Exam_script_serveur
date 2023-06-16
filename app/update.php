<?php


$x = $_SESSION['user_id'];
$sql = "UPDATE user SET ";

if(!empty($_SESSION['user_id'])){

    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ;
    $pwd = $_POST['password'];

    if(!empty($_POST['email']) || !empty($_POST['password'])){

        if (!empty($_POST['email']) && !empty($_POST['password'])){
            $sql .= "`email` = '$email', `password` = '$pwd'";

        } elseif(!empty($email)){
            $sql .= "`email` = '$email'";

        } elseif(!empty($pwd)){
            $sql .= "`password` = '$pwd'";
        }

        $sql .= " WHERE `id`= $x";

        $connexion = connexion();
        $query = $connexion->query("$sql");
        $query->execute();



        // ATTENTION REFAIRE LE MESSAGE EN FONCTION EMAIL/PWD !
        header('Location: index.php?sent=page/profile');
        $_SESSION['alert']       = 'Votre email à bien été modifié &#128077;';
        $_SESSION['alert-color'] = 'success';

    }

}

