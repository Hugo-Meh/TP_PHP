<?php

?>
    <ul>
        <li class="neutre"><a href="index.php">Accueil</a></li>
        <li class="neutre"><a href="catalogue.php">Catalogue</a></li>
        <?php if (!array_key_exists('userlogged',$_SESSION)) {
                        echo '<li class="neutre"><a href="inscription.php">Inscription</a></li>';
        }?>


    </ul>