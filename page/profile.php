<?php


if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])){

    ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Intitulé</th>
                <th scope="col">Valeur</th>
            </tr>
        </thead>

        <tbody>
        <?php
            foreach($_POST as $key => $values){
            echo '<tr><td>'.ucfirst($key).'</td><td>'.ucfirst($values).'</td></tr>.';
            }

        ?>
        </tbody>
    </table>

    <?php
}
