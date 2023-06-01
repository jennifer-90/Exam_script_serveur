<?php


?>



<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Nom du cours</th>
            <th scope="col">Code</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td></td>
            <td></td>
        </tr>
    </tbody>
</table>


<?php


/* - CONNECT - */

global $connexion;

/* - QUERY - */

$sql = 'SELECT * user FROM course';

$requete = $sql->prepare();

/* - EXECUTE- */

$requete->execute();






foreach($requete as $key => $values){
    echo $key.' '.$values;
}


?>

