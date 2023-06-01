<?php






if(!empty(trim($_POST['username'])) && filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL) && password_hash(($_POST['password']), PASSWORD_DEFAULT)){



    foreach($_POST as $key => $values){
        $$key = $values;
    }

    $parametre_requete=[
        $username,
        $email,
        $password

    ];



    /* - - - - CONNEXION A LA DB - - - - */

    /* - CONNECT - */

    global $connexion;

    /* - QUERY - */

    $requete = $connexion->prepare("INSERT INTO user (username, password, email, created ) VALUES (?, ?, ?, NOW() )");

    /* - EXECUTE - */

    $requete->execute($parametre_requete);

} else {
    echo 'Les champs sont vides';
}

