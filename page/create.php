<?php

?>

<form action="index.php?sent=app/create" method="post">
    <div>
        <br><h2>** CREATION D'UN COMPTE** </h2><br>

        <label>
            <span>Identifiant</span>
            <input type="text" name="username" id="username" placeholder="identifiant">
        </label><br><br>

        <label>
            <span>Mot de passe</span>
            <input type="password" name="password" id="password" placeholder="Mot de passe">
        </label><br><br>

        <label>
            <span>Email</span>
            <input type="email" name="email" id="email" placeholder="Email">
        </label><br><br>


        <input type="submit" value="S'inscrire'">

        <button type="submit" class="submit"><a href="index.php?sent=page/create">Création d'un compte</a></button>
    </div>
</form><br>


<button type="submit" class="submit"><a href="index.php?sent=page/login">Retour</a></button>