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
                    <th>INTITULE</th>
                    <th>INFORMATION</th>
                </tr>
            </thead>

            <tbody>

            <?php
                echo
                '<tr>
                    <td>&nbsp;&#x2666; Username :</td>
                    <td>&nbsp;&#x2666;  '.$results->username.'</td>
                </tr>';
                echo
                '<tr>
                    <td>&nbsp;&#x2666;  Email :</td>
                    <td>&nbsp;&#x2666;  '.$results->email.'</td>
                </tr>';


                echo
                '<tr>
                    <td>&nbsp;&#x2666;  Date de création :</td>
                    <td>&nbsp;&#x2666;  '.$results->created.'</td>
                </tr>';

                echo
                '<tr>
                    <td>&nbsp;&#x2666;  Dernière connexion :</td>
                    <td>&nbsp;&#x2666;  '.$results->lastlogin.'</td>
                </tr>';

               echo
               '<tr>
                    <td>&nbsp;&#x2666;  Votre statut :</td>
                    <td>&nbsp;&#x2666;  '.$results->admin.'</td>
                </tr>';

            ?>

            </tbody>
        </table>

    <?php

}

?>

    <?php
        if(!empty($_SESSION['user_id'])){
    ?>
         <br><button type="submit" class="submit_update"><a href="index.php?sent=page/update"> &#x1F449; Modification
                                                                                               de votre
                                                                                        profil</a></button>
    <?php
        }
    ?>


