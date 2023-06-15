<?php


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

            <input type="submit" value="Modifié"><br>
        </div>
    </form>
</div>
