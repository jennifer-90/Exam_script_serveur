<?php

    if(isset($_POST['id'])) {

        if (isset($_POST['adminMod'])) {

            $connexion = connexion();

            $sql = $connexion->prepare("SELECT id FROM user ORDER BY id ASC LIMIT 1");
            $sql->execute();
            $result = $sql->fetchColumn();

            if (isset($_POST['id']) == $result) {
                $_SESSION['alert']       = '&#9940; Tu ne peux pas modifier le chef admin &#9940;';
                $_SESSION['alert-color'] = 'danger';
                header('Location: index.php?sent=page/admin');
                die;

            } else {
                $sql   = $connexion->prepare("UPDATE user SET admin = ? WHERE id = ? ");
                $param = [
                    $_POST['adminMod'],
                    $_POST['id']
                    ];
                $sql->execute($param);
            }
        }
    }


























