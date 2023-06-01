

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

    /* - - - EXECUTE - - - */

        foreach($connexion->query($requete) as $key) {
            /* - mysqli::query -- mysqli_query — Effectue une requête sur la base de données - */

            /* - - - FETCH - - - */

            echo '<tr><td>'.$key['name'].'</td><td>'.$key['code'].'</td></tr>';
        }

    ?>
    </tbody>
</table>



