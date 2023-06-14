<?php



/* -- page/create  ==> °°app/create°° ==> DB  ==>  page/login -- */

$url = 'index.php?sent=page/create';

if(!empty($_POST['username']) && filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) && ($_POST['password'])){

    if(userExist('username', [$_POST['username']])){
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
        /* - - - - CONNECT - */
        global $connexion;
        /* - - - - QUERY - */
        $requete = $connexion->prepare("INSERT INTO user (username, password, email, created ) VALUES (?, ?, ?, NOW() )");
        /* - - - - EXECUTE - */
        $requete->execute($parametre_requete);


        if($requete->rowCount()) {
            $user_id = $connexion->lastInsertId();
            /*----------------------------------------------------------------------------------------------------*/

            /* - Je fais une recherche dans ma db pour avoir mon tout premier que j'affecte à  $X - */
            $num_admin = $connexion->prepare("SELECT id FROM `user` ORDER BY id ASC LIMIT 1");
            $num_admin->execute();  /*--  ATTENTION renvoi un booleen et non une valeur! Utiliser la methode fetch
  (all - object -column - ... ) pour avoir le résultat de la requete --*/
            $x = $num_admin->fetchColumn();


                if($user_id == $x) {

                    /* - Si oui, son admin devient "1" - */
                    $modif_admin = $connexion->prepare("UPDATE user SET admin = 1 WHERE id = ? ");
                    $modif_admin->bindValue(1, $user_id);
                    $modif_admin->execute();

                    $url = 'index.php?sent=page/login';
                    $_SESSION['alert']       = 'Bienvenue admin ' . $username . ' ! Tu peux désormais te connecter :)';
                    $_SESSION['alert-color'] = 'success';

                } else{

                    /* - Si non, son admin devient "0" - */
                    $modif_admin = $connexion->prepare("UPDATE user SET admin = 0 WHERE id > ?");
                    $modif_admin->bindValue(1, $x);
                    $modif_admin->execute();

                    $url = 'index.php?sent=page/login';
                    $_SESSION['alert']       = 'Bienvenue ' . $username . ' ! Tu peux désormais te connecter :)';
                    $_SESSION['alert-color'] = 'success';
            }
                /*----------------------------------------------------------------------------------------------------*/


        } /* - FIN de mon IF pour la ligne supplémentaire -  */

    } /* - Fermeture du "else" de ma fct userExist - */

/* - FIN DE MON TOUT PREMIER IF - */
} else {
    $_SESSION['alert'] = '&#9940; La création de votre compte a échouée, veuillez recommencer &#9940;';
    $_SESSION['alert-color'] = 'danger';
    }
header('Location:'. $url);
