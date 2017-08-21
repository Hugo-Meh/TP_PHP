<?php
require_once 'views/header.php';

if (!empty($_GET['del'])) {
    $panier->supprimer($_GET['del']);
}

if (!empty($_SESSION['panier'])) {
    $livre_selectionne = implode(',', array_keys($_SESSION['panier']));
    $selection_livre = $BD->demande_requete("SELECT * FROM livres WHERE id_livre IN (" . $livre_selectionne . ")");
}
?>

<div id="wrapper">
    <!--<?php if (!empty($panier)): ?>
        <div id="recap_panier">
            <span>total des livres : </span><span class="total_prix"><?= $panier->total() ?></span><br>
            <span>prix total : </span><span class="qte_total"><?= $panier->quantite_panier() ?></span>
        </div>
    <?php endif; ?>-->
    <form action="views/valider_commande.php" method="post">
        <input class="bouton_submit" type="submit" value="valider commande" name="commande"/>
        <div id="wrapper_panier">
            <?php if (isset($selection_livre)): ?>

                <?php foreach ($selection_livre as $un_livre): ?>
                    <ul class="article_panier" id="<?= $un_livre->id_livre ?>">
                        <li><img class='image' src=<?= $un_livre->url_img ?> alt=<?= $un_livre->alt_img ?> /></li>
                        <li><span class='titre'>Titre</span><span><?= $un_livre->titre ?></span></li>
                        <li>
                            <span class='titre'>Prix</span><span
                                    class="prix"><?= number_format($un_livre->prix, 2, '.', '') ?>
                                CAD</span></li>
                        <li>
                            <span class="titre qte_title">Quantité</span><span
                                    class="qte"><?= $_SESSION['panier'][$un_livre->id_livre] ?></span>
                        </li>
                        <li><a class="del" href="ajax/del_livre.php?del=<?= $un_livre->id_livre ?>"><img
                                        class="del_article"
                                        src="image/bouton/corbeille.jpg"
                                        alt="bouton d'ajouter dans panier"></a>
                        </li>
                    </ul>
                <?php endforeach ?>
            <?php endif ?>
        </div>

    </form>
</div>

