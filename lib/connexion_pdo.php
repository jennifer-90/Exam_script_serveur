<?php

function connexion(){

    global $connexion; // On rappel notre "variable" qui se trouve dans index.php

    if(is_a($connexion, 'PDO')){
        /* - ==>  Si la variable $connexion est connecté à la db alors on ne va pas plus loin, c'est ok <== - */
        return $connexion;

    } else {

        /* - On fait un try / catch - */

        try{
            $connexion= new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';charset=utf8', DB_USER,DB_PWD);

        ################################################# - A REVOIR#  - ############################################
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); /* - A REVOIR-
        Nécessaire avant php 8.0 il fallait le préciser, à voir si dans php 8.2 il le faut toujours */
        #############################################################################################################



        } catch (PDOException $exception_erreur){
            die('Erreur'.$exception_erreur->getMessage());
        }

        return $connexion;

    }

}