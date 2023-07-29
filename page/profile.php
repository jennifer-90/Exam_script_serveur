<?php

if (!empty($_SESSION['user_id'])) {

    $x = $_SESSION['user_id'];

    global $connexion;

    $sql   = "SELECT username, email, created, lastlogin, admin FROM user WHERE id = $x ";
    $query = $connexion->prepare($sql);
    $query->execute();
    $results = $query->fetchObject();

    if (menuAdmin($_SESSION['user_id'])) {
        $admin = $results->admin;
        $admin = 'Oui, vous êtes admin de ce site';
    } else {
        $admin = 'Non, vous n\'êtes pas admin de ce site';
    }

    ?>
    <h2>** VOS INFORMATIONS SUR VOTRE PROFIL: ** </h2>
    <table>
        <thead>
        <tr>
            <th>INTITULE</th>
            <th>INFORMATION</th>
        </tr>
        </thead>

        <tbody>

        <?php
        echo
            '<tr>
                    <td>&nbsp;&#x2666; Username :</td>
                    <td>&nbsp;&#x2666;  ' . $results->username . '</td>
                </tr>';
        echo
            '<tr>
                    <td>&nbsp;&#x2666;  Email :</td>
                    <td>&nbsp;&#x2666;  ' . $results->email . '</td>
                </tr>';
        echo
            '<tr>
                    <td>&nbsp;&#x2666;  Date de création :</td>
                    <td>&nbsp;&#x2666;  ' . changeDate($results->created) . '</td>
                </tr>';

        echo
            '<tr>
                    <td>&nbsp;&#x2666;  Dernière connexion :</td>
                    <td>&nbsp;&#x2666;  ' . changeDate($results->lastlogin ). '</td>
                </tr>';

        echo
            '<tr>
                    <td>&nbsp;&#x2666;  Votre statut :</td>
                    <td> &nbsp;&#x2666;  ' . $admin . '</td></tr>';
        ?>
        </tbody>
    </table>

    <?php

    echo '<a href="app/export.php"> EXPORTER </a><br>';
}
?>







<?php
if (!empty($_SESSION['user_id'])) {
    ?>
    <br>
    <button type="submit" class="submit_update"><a href="index.php?sent=page/update"> &#x1F449; Modification
                                                                                      de votre
                                                                                      profil</a></button>
    <?php


}

?>










