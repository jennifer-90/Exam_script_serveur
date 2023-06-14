<?php



/* - verifier si la session est active ou non - idem que la condition faite dans le menu - */

if(!empty($_SESSION['user_id'])) {

    /* - Aller chercher dans la base de données les infos de l'utilisateur qui connecté - via la session  - */

    $x = $_SESSION['user_id'];

    global $connexion;

    $sql = "SELECT username, email, created, lastlogin, admin FROM user WHERE id = $x " ;
    $query = $connexion->prepare($sql);
    $query->execute();
    $results = $query->fetchObject();


?>
        <h2>** VOS INFORMATIONS SUR VOTRE PROFIL: ** </h2>
          <table>
            <thead>
                <tr>
                    <th>Intitulé</th>
                    <th>Valeur</th>
                </tr>
            </thead>

            <tbody>

            <?php
            while ($results){
                echo
                '<tr>
                    <td>Username :</td>
                    <td>'.$results->username.'</td>
                </tr>';
                echo
                '<tr>
                    <td>Email :</td>
                    <td>'.$results->email.'</td>
                </tr>';


                echo
                '<tr>
                    <td>Date de création :</td>
                    <td>'.$results->created.'</td>
                </tr>';

                echo
                '<tr>
                    <td>Dernière connexion :</td>
                    <td>'.$results->lastlogin.'</td>
                </tr>';

               echo
               '<tr>
                    <td>Votre statut :</td>
                    <td>'.$results->admin.'</td>
                </tr>';
                die;
            }

            ?>

            </tbody>
        </table>

    <?php


}



