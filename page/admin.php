<?php

$tab1='<table class="tableau_admin"><thead><tr><th>INTITULE</th><th>INFORMATION</th></tr></thead><tbody>';
$tab2='</tbody></table><br>';

if(!empty($_SESSION['user_id'])){
    if(menu_admin($_SESSION['user_id'])){
    ?>

    <h2>** VOUS ETES ADMIN DE CE SITE ! &#128526; **</h2>

        <h3>LES UTILISATEURS DE CE SITE &#x2935; </h3>

            <?php
                $connexion = connexion();
                $sql = $connexion->prepare("SELECT * FROM user");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_OBJ);

                foreach($result as $key){
                    echo $tab1;
                    echo    '<tr><td>&nbsp;&#x2666; id = </td> <td>&nbsp;&#x2666; '.$key->id.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Nom = </td> <td>&nbsp;&#x2666; '.$key->username.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Email = </td> <td>&nbsp;&#x2666; '.$key->email.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Date de création = </td> <td>&nbsp;&#x2666; '.$key->created.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Date de la dernière connexion = </td> <td>&nbsp;&#x2666; '
                        .$key->lastlogin.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Statut admin = </td> <td>&nbsp;&#x2666; '.$key->admin.'</td></tr>';
                    echo $tab2;
                } ?>

    <?php
    } else {
        echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";
        }
} else {
    echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";
}