<?php

?>


<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="index.php?sent=page/liste_des_cours">Liste des cours</a></li>
        <li><a href="index.php?sent=page/profile">Profil</a></li>

        <?php
        if (!empty($_SESSION['user_id'])) {

            if (menuAdmin($_SESSION['user_id'])) {
                ?>
                <li><a href="index.php?sent=page/admin">Admin</a></li>
                <?php
            }
        }
        ?>
        <?php
        if (!empty($_SESSION['user_id'])) {
            ?>
            <li><a href="index.php?sent=page/logout">&#10145;&#65039; Logout</a></li>
            <?php
        } else {
            ?>
            <li><a href="index.php?sent=page/login">Login</a></li>
            <?php
        }
        ?>
    </ul>
</nav>
