<?php
require "views/page_top.php";
require_once 'views/header.php';
$condition_reuete = implode(',', $_POST);
$condition_reuete = str_replace(',valider', "", $condition_reuete);
$condition_reuete = '(' . $condition_reuete . ')';
$requete_livre = 'SELECT * FROM livres L INNER JOIN categorie_livre CL ON L.id_livre=CL.id_livre
                    INNER JOIN categorie C ON C.id_cat=CL.id_cat WHERE C.id_cat IN' . $condition_reuete;
$livre = $BD->demande_requete($requete_livre);

?>

<main>
    <div id="wrapper">
        <div id="wrapper_articles">
            <?php foreach ($livre as $un_livre): ?>

                <form method="get" class="article">

                    <div><span class='titre_detail'>Titre: </span><span><?= $un_livre->titre ?></span></div>
                    <div><a href="livre.php?id=<?= $un_livre->id_livre ?>" title="detail"><img class='image' src=<?= $un_livre->url_img ?> alt=<?= $un_livre->alt_img ?>/></a></div>
                    <div><span class='auteur'>Auteur : </span><span><?= $un_livre->auteur ?></span></div>
                    <div><span class='cat_livre'>Catégorie : </span><span><?= $un_livre->nom_cat ?></span></div>
                    <!-- <div><span class='desc_livre'>Description : </span><span><?= $un_livre->description ?></span></div>-->
                    <div>
                        <span class='prix_livre'>Prix: </span>
                        <span><?= number_format($un_livre->prix, 2, '.', '') ?> CAD</span>
                    </div>
                    <div>
                        <a class="add" href="ajax/ajouter_panier.php?id=<?= $un_livre->id_livre ?>"><img
                                    class="bouton_panier"
                                    src="image/bouton/ajouter_dans_panier.jpg"
                                    alt="bouton d'ajouter dans panier"></a>
                    </div>

                </form>
            <?php endforeach ?>
        </div>
    </div>
</main>