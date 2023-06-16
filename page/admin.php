<?php

if(!empty($_SESSION['user_id'])){
?>

<h2>** VOUS ETES ADMIN DE CE SITE ! &#128526; **</h2>












<?php
} else {
    echo "&#9940; &#128558; Héhé bien essayé, mais tu n'as rien à faire ici ! &#128558; &#9940; ";
}