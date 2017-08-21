<?php
require_once  'views/page_top.php';
$requet = "SELECT * FROM livres";
$tout_livre = $BD->demande_requete($requet);

?>
<div class="wrapper">
    <div id="wrapper_accueil">
        <div id="fleche_gauche"><img src="image/bouton/fleche_gauche.png" alt="fleche gauche"></div>
        <div id="fleche_droite"><img src="image/bouton/fleche_droite.png" alt="fleche gauche"></div>
        <div class="slider_content">
            <?php foreach ($tout_livre as $unlivre): ?>
                <div class="class_slider">
                    <div class="class_slide"><a href="livre.php?id=<?= $unlivre->id_livre ?>"><img
                                    src="<?= $unlivre->url_img ?>" alt="<?= $unlivre->url_img ?> "></a></div>
                    <div class="info_livre">
                        <h2><?= $unlivre->titre ?></h2>
                        <h3><?= $unlivre->auteur ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>


<?php require_once('views/page_bottom.php'); ?>

<!--
<div id="slider_content">
    <?php foreach ($tout_livre as $unlivre): ?>
        <div class="class_slider">
            <div class="class_slide"><a href="views/livre.php?id=<?= $unlivre->id_livre ?>"><img
                            src="<?= $unlivre->url_img ?>" alt="<?= $unlivre->url_img ?> "></a></div>
            <div class="info_livre">
                <h2><?= $unlivre->titre ?></h2>
                <h3><?= $unlivre->auteur ?></h3>
            </div>
        </div>
</div>
    <?php endforeach; ?>

-->