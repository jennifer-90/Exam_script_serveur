

<?php

connexion();
global $connexion;

?>

<table>
    <thead>
        <tr>
            <th>Cours</th>
            <th>Codes</th>
        </tr>
    </thead>

    <tbody>

    <?php
        $requete = 'SELECT * FROM course';

        foreach($connexion->query($requete) as $key) {
            echo '<tr><td>'.$key['name'].'</td><td>'.$key['code'].'</td></tr>';
        }

    ?>
    </tbody>
</table>



