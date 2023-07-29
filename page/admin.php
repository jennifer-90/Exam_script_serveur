<?php

if (!empty($_SESSION['user_id'])) {
    if (menuAdmin($_SESSION['user_id'])) {

        ?>

        <h2>** VOUS ETES ADMIN DE CE SITE ! &#128526; **</h2>

        <h3>LES UTILISATEURS DE CE SITE &#x2935; </h3>

        <table class="tableau_admin">
            <thead>
            <tr>
                <th>&nbsp;&#x2666; id &#x2666;</th>
                <th>&nbsp;&#x2666; Nom &#x2666;</th>
                <th>&nbsp;&#x2666; Email &#x2666;</th>
                <th>&nbsp;&#x2666; Date de création &#x2666;</th>
                <th>&nbsp;&#x2666; Date de la dernière connexion &#x2666;</th>
                <th>&nbsp;&#x2666; Statut admin &#x2666;</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $connexion = connexion();
            $sql       = $connexion->prepare("SELECT * FROM user");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_OBJ);

            foreach ($result as $key) {

                if ($key->admin == 1) {
                    $admin = 'ADMIN &#10004;';
                } else {
                    $admin = 'PAS ADMIN &#10006; ';
                }


                echo '
                        <tr>
                            <td>' . $key->id . '</td>
                            <td>' . $key->username . '</td>
                            <td>' . $key->email . '</td>
                            <td>' . changeDate($key->created) . '</td>
                            <td>' . changeDate($key->lastlogin) . '</td>
                            <td>' . $admin . '</td>
                            </form>
                            </td>
                        </tr>';
            }
            ?>
            </tbody>
        </table>



        <?php
    } else {
        echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";
    }

} else {
    echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";
}

