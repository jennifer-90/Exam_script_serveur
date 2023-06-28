<?php

/* -- °°page/login°°  ==>  app/login  ==>  ==>  index.php  -- */
?>

<div class="formu">
    <form action="index.php?sent=app/login" method="post">
        <div>
            <br>
            <h2>** SE CONNECTER ** </h2><br>
            <label>
                <span>Identifiant:<br><br></span>
                <input type="text" name="username" id="username" placeholder="Identifiant">
            </label><br><br>
            <label>
                <span>Mot de passe:<br><br></span>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
            </label><br><br>
            <input type="submit" value="Se connecter &#10004;">
        </div>
    </form>
    <button type="submit" class="submit"><a href="index.php?sent=page/create">&#128073; Créé-toi un compte</a></button>
</div>



