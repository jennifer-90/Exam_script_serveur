<?php


function userExist($champs, $values){

    $connexion= connexion();

    $sql="SELECT $champs FROM user WHERE $champs = ?";
    $query = $connexion->prepare($sql);
    $query->execute();

    $requete = $query->fetchAll();

    $array=[];

    foreach($requete as $key){
        if($key[$champs] === $values){
        return true;
        }
    }
    return false;
};





