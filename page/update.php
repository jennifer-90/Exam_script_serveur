<?php

if (!empty($_SESSION['user_id'])) {

    $user = getUser('id', $_SESSION['user_id']);

    $output='
    
    <div class="form">
        <form action="index.php?sent=app/update" method="post">
            <div>
                <br>
                <h2>** MODIFICATION DE VOTRE PROFIL **</h2>

                <input type="hidden" name="id" value="' . $user->id . '">
                
                <label>
                    <span>Votre ancien mot de passe: </span>
                    <input type="password" name="o_password" placeholder="Votre ancien mot de passe">
                </label><br><br>

                <label>
                    <span>Votre nouveau mot de passe: </span>
                    <input type="password" name="n_password" placeholder="Votre nouveau mot de passe">
                </label><br><br>

                <label>
                    <span>Votre nouveau email: </span>
                    <input type="email" name="email" value="'.$user->email.'">
                </label><br><br>

                <input type="submit" value="Modifié"><br><br>

                <button type="submit" class="submit_update"><a href="index.php?sent=page/profile">RETOUR &#128281;</a>
                </button>
        </form>
    </div>
    </div>';

   echo $output;

} else {
    echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";


}