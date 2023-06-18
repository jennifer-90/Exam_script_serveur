<?php


$connexion = connexion();

if(!empty($_SESSION['user_id'])){

    if(!empty($_POST['admin']) && !empty($_POST['id'])){

        $sql= $connexion->prepare("SELECT id FROM user ORDER BY id ASC LIMIT 1");
        $sql->execute();
        $result = $sql->fetchColumn();

            if(($_POST['id']) == $result){

                $_SESSION['alert']       = '&#9940; Tu ne peux pas modifier le chef admin &#9940;';
                $_SESSION['alert-color'] = 'danger';
                header('Location: index.php?sent=page/profile');

            } else {

                $admin = $_POST['admin'];
                $id    = $_POST['id'];

                $sql = $connexion->prepare("UPDATE user SET admin = ? WHERE id = ?");
                $sql->bindValue(1, $admin);
                $sql->bindValue(2, $id);
                $sql->execute();

                $_SESSION['alert']       = 'Statut admin changé';
                $_SESSION['alert-color'] = 'success';
                header('Location: index.php?sent=page/profile');

            }
    }
}

