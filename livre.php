<?php
require_once 'views/page_top.php';
if (array_key_exists("id", $_GET)) {
    $requet = "SELECT * FROM livres WHERE id_livre=" . $_GET["id"];
    $un_livre = $BD->demande_requete($requet);

} ?>
<div id="wrapper">
    <div id="wrapper_livre">
        <div><img class='image' src=<?= $un_livre[0]->url_img ?> alt=<?= $un_livre[0]->alt_img ?>/></div>
        <div>
            <div><span class='titre_detail'>Titre: </span><span><?= $un_livre[0]->titre ?></span></div>

            <div><span class='auteur'>Auteur : </span><span><?= $un_livre[0]->auteur ?></span></div>
            <!--<div><span class='cat_livre'>Catégorie : </span><span><?= $un_livre[0]->nom_cat ?></span></div>-->
            <div><span class='desc_livre'>Description : </span><span><?= $un_livre[0]->description ?></span></div>
            <div>
                <span class='prix_livre'>Prix: </span>
                <span><?= number_format($un_livre[0]->prix, 2, '.', '') ?> CAD</span>
            </div>
            <div>
                <a class="add" href="ajax/ajouter_panier.php?id=<?= $un_livre[0]->id_livre ?>"><img
                            class="bouton_panier"
                            src="image/bouton/ajouter_dans_panier.jpg"
                            alt="bouton d'ajouter dans panier"/></a>
            </div>
        </div>
    </div>
</div>