<?php

?>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="catalogue.php">Catalogue</a></li>
        <?php if (!array_key_exists('userlogged',$_SESSION)) {
                        echo '<li><a href="inscription.php">Inscription</a></li>';
        }?>


    </ul>