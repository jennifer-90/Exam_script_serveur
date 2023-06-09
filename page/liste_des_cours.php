

<?php

/* - BRANCHE TEST - */

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

        $sql = 'SELECT * FROM course';

        $query = $connexion->prepare($sql);


    /* - - - EXECUTE - - - */

        $query->execute();

         $result = $query->fetchObject();


    while ($result) {
        echo '<tr><td>&nbsp;&#x2666; ' . $result->name . '</td><td>' . $result->code . '</td></tr>';
        $result = $query->fetchObject(); // récupérer la prochaine ligne de résultats
        /* - un foreach ne fonctionne pas car le techObject ne renvoie qu'un seul objet à la fois - */
    }


    /* - - var_dump($result); - - */


    ?>
    </tbody>
</table>






