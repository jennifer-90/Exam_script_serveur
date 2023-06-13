<?php
$num_admin= 87;

/* -- page/create  ==> °°app/create°° ==> DB  ==>  page/login -- */

$url= 'index.php?sent=page/create';

if(!empty($_POST['username']) && filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) && ($_POST['password'])){

    if(userExist('username', 'username', [$_POST['username']])){
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

            $user_id = $connexion->lastInsertId(); // Je recupere l'id du dernier utlisateur

            /*----------------------------------------------------------------------------------------------------*/

            /* - Je fais une recherche dans ma base de données pour avoir la ligne de l'id $X - */
            $sql_admin = $connexion->prepare("SELECT id FROM user WHERE id = ?");
            $sql_admin->bindValue(1, $num_admin);
            $result_admin = $sql_admin->execute(); // ATTENTION renvoi un booleen et non une valeur! Utiliser la
            // methode fetch (all - object) pour avoir le résultat de la requete

            /*----------------------------------------------------------------------------------------------------*/

            $result_admin = $sql_admin->fetchAll();   // il doit m'afficher l'utilisateur au id $X


                if($user_id === $result_admin[0]['id']) {     //est-ce que le dernier utilisateur à l'id $X ?

                /* - Si oui, son admin devient "1" - */
                $modif_admin = $connexion->prepare("UPDATE user SET admin = 1 WHERE id = ? ");
                $modif_admin->bindValue(1, $user_id);
                $modif_admin->execute();

                $url = 'index.php?sent=page/login';

                $_SESSION['alert']       = 'Bienvenue admin ' . $username . ' ! Tu peux désormais te connecter :)';
                $_SESSION['alert-color'] = 'success';

                } else{

                    /* - Si non, son admin devient "0" - */
                    $modif_admin = $connexion->prepare("UPDATE user SET admin = 0 WHERE NOT id = ?");
                    $modif_admin->bindValue(1, $user_id);
                    $modif_admin->execute();

                    $url = 'index.php?sent=page/login';

                    $_SESSION['alert']       = 'Bienvenue ' . $username . ' ! Tu peux désormais te connecter :)';
                    $_SESSION['alert-color'] = 'success';

            }
        }

    } /* - Fermeture du "else" de ma fct userExist - */

/* - FIN DE MON TOUT PREMIER IF - */
} else {
    $_SESSION['alert'] = '&#9940; La création de votre compte a échouée, veuillez recommencer &#9940;';
    $_SESSION['alert-color'] = 'danger';
    }
header('Location:'. $url);
