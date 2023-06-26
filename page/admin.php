<?php

$tab1='<table class="tableau_admin"><thead><tr><th>INTITULE</th><th>INFORMATION</th></tr></thead><tbody>';
$tab2='</tbody></table><br>';

if(!empty($_SESSION['user_id'])){
    if(menuAdmin($_SESSION['user_id'])){
    ?>

    <h2>** VOUS ETES ADMIN DE CE SITE ! &#128526; **</h2>

        <h3>LES UTILISATEURS DE CE SITE &#x2935; </h3>

            <?php
                $connexion = connexion();
                $sql = $connexion->prepare("SELECT * FROM user");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_OBJ);

                $nb_user= count($result);

                foreach($result as $key){

                    if($key->admin == 1){
                        $admin = 'ADMIN &#10004;';
                    } else {
                        $admin = 'PAS ADMIN &#10006; ';
                    }

                    echo $tab1;
                    echo    '<tr><td>&nbsp;&#x2666; id = </td> <td>&nbsp;&#x2666; '.$key->id.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Nom = </td> <td>&nbsp;&#x2666; '.$key->username.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Email = </td> <td>&nbsp;&#x2666; '.$key->email.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Date de création = </td> <td>&nbsp;&#x2666; '.$key->created.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Date de la dernière connexion = </td> <td>&nbsp;&#x2666; '
                        .$key->lastlogin.'</td></tr>
                            <tr><td>&nbsp;&#x2666; Statut admin = </td> <td>&nbsp;&#x2666; '.$admin.'</td></tr>';
                    echo $tab2;
                } ?>
        
        <div class="admin_update">
            <h3>** Désigner une personne en second-admin, tout en gardant votre sécurité de rester chef admin **</h3>
            <p>Ce second admin n'aura pas la possiblité de changer votre statut admin, mais aura toute la fois la
               possiblité de changer celui des autres.</p>

            <form action="index.php?sent=app/admin" method="post">

                <span> 0 = Pas Admin : </span>
                <input type="radio" name="admin" id="admin" value="0"><br><br>
                <span> 1 = Admin : </span>
                <input type="radio" name="admin" id="admin" value="1"><br><br>


                <span>l'id de l'utilisateur :</span>
                <input type="number" name="id" id="id" placeholder="id" max = "<?php echo $nb_user ?>">


                <input type="submit" value="OK">
                <input type="reset" value="RESET">
            </form>
        </div>








        <div class="admin_update">
            <h3>** Changer les informations d'un utilisateur **</h3>
            <form action="index.php?sent=app/admin" method="post">

                <label for="username">Changer son nom :</label>
                <input type="text" name="username" placeholder="username"><br><br>
                <label for="username">Changer son email :</label>
                <input type="text" name="email" placeholder="email"><br><br>
                <input type="submit" value="OK">
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