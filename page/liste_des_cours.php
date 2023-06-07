

<?php



?>

<h2>** LA LISTE DES COURS DANS NOTRE ECOLE: ** </h2>
<table>
    <thead>
        <tr>
            <th>Cours</th>
            <th>Codes</th>
        </tr>
    </thead>

    <tbody>

    <?php

    /* - - - CONNECT - - - */
    connexion();
    global $connexion;

    /* - - - QUERY/PREPARE - - - */

        $requete = 'SELECT * FROM course';

        $query = $connexion->query($requete);
        /* - mysqli::query -- mysqli_query — Effectue une requête sur la base de données - */

    /* - - - EXECUTE - - - */

        foreach( $query as $key) {


            /* - - - FETCH - - - */

            echo '<tr><td>&nbsp;&#x2666; '.$key['name'].'</td><td>'.$key['code'].'</td></tr>';
        }

    ?>
    </tbody>
</table>



