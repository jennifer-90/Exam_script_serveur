<?php


/**
 * @param string $champs
 * @param array $valuesPost
 * @return bool
 */
function userExist(string $champs, array $valuesPost):bool {

    $connexion = connexion();

    $sql = "SELECT $champs FROM user WHERE $champs = ?";

    $query = $connexion->prepare($sql);
    $query->execute($valuesPost);

    $result = $query->fetchAll();

    return count($result) > 0;
}


/**
 * @param $session
 * @return true|void
 */
function menuAdmin($session){

    $connexion = connexion();

    $query = $connexion->prepare("SELECT admin FROM user WHERE id = ?");
    $query->bindValue(1, $session);
    $query->execute();
    $result = $query->fetchColumn();

    if ($result == 1) {
        return true;
    }
}



