<?php

if(!empty($_SESSION['user_id'])){

?>

<div class="form">
    <form action="index.php?sent=app/update" method="post">
        <div>
            <br><h2>** MODIFICATION DE VOTRE PROFIL **</h2>

            <label>
                <span>Votre nouveau mot de passe: </span>
                <input type="password" name="password" placeholder="Votre nouveau mot de passe">
            </label><br><br>

            <label>
            <span>Votre nouvel email: </span>
                <input type="email" name="email" placeholder="Votre nouveau email">
            </label><br><br>

            <input type="submit" value="Modifié"><br><br>

            <button type="submit" class="submit"><a href="index.php?sent=page/profile">RETOUR</a></button>
    </form>
        </div>
</div>

    <?php

} else{
    echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";


}