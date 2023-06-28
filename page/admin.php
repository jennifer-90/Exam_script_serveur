<?php

if(!empty($_SESSION['user_id'])){
    if(menuAdmin($_SESSION['user_id'])){

    ?>

    <h2>** VOUS ETES ADMIN DE CE SITE ! &#128526; **</h2>

        <h3>LES UTILISATEURS DE CE SITE &#x2935; </h3>

                <table class="tableau_admin">
                    <thead>
                        <tr>
                            <th>&nbsp;&#x2666; id </th>
                            <th>&nbsp;&#x2666; Nom</th>
                            <th>&nbsp;&#x2666; Email</th>
                            <th>&nbsp;&#x2666; Date de création</th>
                            <th>&nbsp;&#x2666; Date de la dernière connexion</th>
                            <th>&nbsp;&#x2666; Statut admin</th>
                            <th>&nbsp;&#x2666; Modif</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php
                    $connexion = connexion();
                    $sql = $connexion->prepare("SELECT * FROM user");
                    $sql->execute();
                    $result = $sql->fetchAll(PDO::FETCH_OBJ);

                    foreach($result as $key){

                        if($key->admin == 1){
                            $admin = 'ADMIN &#10004;';
                        } else {
                            $admin = 'PAS ADMIN &#10006; ';
                        }



                        echo'
                        <tr>
                            <td>'.$key->id.'</td>
                            <td>'.$key->username.'</td>
                            <td>'.$key->email.'</td>
                            <td>'.$key->created.'</td>
                            <td>'.$key->lastlogin.'</td>
                            <td>'.$admin.'</td>
                            <td>
                            <form action="index.php?sent=app/admin" method="post">
                            <input type="checkbox" name="id" value= "'.$key->id.'">
                            </form>
                            </td>
                        </tr>';
                    }
                    ?>
                    </tbody>
                </table>

    <div class="admin_update">
        <h3>** Désigner une personne en second-admin, tout en gardant votre sécurité de rester chef admin **</h3>
        <p>Ce second admin n'aura pas la possiblité de changer votre statut admin, mais aura toute la fois la
           possiblité de changer celui des autres.</p>

        <form action="index.php?sent=app/admin" method="post">
            <span> 0 = </span>
            <input type="radio" name="adminMod"  value="0"><br>
            <span> 1 = </span>
           <input type="radio" name="adminMod"  value="1"><br>

            <input type="submit" value="ok">
            <input type="reset" value="RESET">
        </form>
    </div>

<?php
    } else {
        echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";
        }

} else {
    echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";
}

