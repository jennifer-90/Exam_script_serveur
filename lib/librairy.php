<?php


function userExist($table, $champs, array $valuesPost){

    $connexion= connexion();

    $sql="SELECT $table FROM user WHERE $champs = ?";

    $query = $connexion->prepare($sql);
    $query->execute($valuesPost);

    $result = $query->fetchAll();

    return count($result) > 0;

};





