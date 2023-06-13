<?php


function userExist($champs, array $valuesPost){

    $connexion= connexion();

    $sql="SELECT $champs FROM user WHERE $champs = ?";

    $query = $connexion->prepare($sql);
    $query->execute($valuesPost);

    $result = $query->fetchAll();

    return count($result) > 0;

};





