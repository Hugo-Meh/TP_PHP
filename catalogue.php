<?php
$title = "page1";
require_once('views/page_top.php');

$categorie = $BD->demande_requete("SELECT * FROM categorie");

?>

<div id="wrapper">
    <div id="wrapper_cat">
        <form method="POST" action="views/article.php">
            <div id="div_cat">

                <?php foreach ($categorie as $donnee): ?>

                    <div class='div_cat_child'>
                        <input type='checkbox' name='<?= $donnee->nom_cat ?>'
                                                      value=<?= $donnee->id_cat ?> />
                        <label for=<?= $donnee->nom_cat ?>><?= $donnee->nom_cat ?></label>

                    </div>
                <?php endforeach ?>
            </div>
            <input type="submit" name="btn_cat" value="valider"/>
        </form>
    </div>
</div>

