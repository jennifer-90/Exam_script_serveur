<?php


function userExist($champs, array $valuesPost){

    $connexion= connexion();

    $sql="SELECT $champs FROM user WHERE $champs = ?";

    $query = $connexion->prepare($sql);
    $query->execute($valuesPost);

    $result = $query->fetchAll();

    return count($result) > 0;

};




function menu_admin($session){
    $x = $session;

    $connexion = connexion();

    $query = $connexion->prepare("SELECT admin FROM user WHERE id = ?");
    $query->bindValue(1, $x);
    $query->execute();
    $result = $query->fetchColumn();

    if($result == 1) {
        return true;
    }
}


