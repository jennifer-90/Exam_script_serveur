<?php

function connexion() {
    global $connexion;

    if (is_a($connexion, 'PDO')) {
        return $connexion;
    } else {
        try {

            /* PDO */
            $connexion = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PWD);

            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); /* - A REVOIR-
            Nécessaire avant php 8.0 il fallait le préciser, à voir si dans php 8.2 il le faut toujours */


        } catch (PDOException $exception_erreur) {
            die('Erreur' . $exception_erreur->getMessage());
        }
        return $connexion;
    }
}