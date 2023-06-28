<?php
/* -- °°page/create°°  ==> app/create ==> DB  ==> page/login -- */
?>
<div class="formu">
    <form action="index.php?sent=app/create" method="post">
        <div>
            <br>
            <h2>** CREATION D'UN COMPTE** </h2><br>
            <label>
                <span>Identifiant:<br><br></span>
                <input type="text" name="username" id="username" placeholder="Identifiant">
            </label><br><br>
            <label>
                <span>Mot de passe:<br><br></span>
                <input type="password" name="password" id="password" placeholder="Mot de passe">
            </label><br><br>
            <label>
                <span>Email<br><br></span>
                <input type="email" name="email" id="email" placeholder="Email">
            </label><br><br>
            <input type="submit" value="S'inscrire &#10004;"><br>
        </div>
    </form>
    <button type="submit" class="submit"><a href="index.php?sent=page/login">Revenir à Login &#128281;</a></button>
</div>

