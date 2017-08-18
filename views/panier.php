<?php
require_once 'header_connect.php';
require_once 'header.php';
if (isset($_GET['del'])) {
    $panier->supprimer($_GET['del']);
    header("Location: panier.php");
}
if (isset($_SESSION['panier'])) {
    $livre_selectionne = implode(',', array_keys($_SESSION['panier']));
    $selection_livre = $BD->demande_requete("SELECT * FROM livres WHERE id_livre IN ($livre_selectionne)");
}
?>

<div id="wrapper">
    <div id="recap_panier">
        <span>total des livres : </span><span class="total_prix"><?= $panier->total() ?></span><br>
        <span>prix total : </span><span class="qte_total"><?= $panier->quantite_panier() ?></span>
    </div>
    <form action="panier.php" method="post">
        <div id="wrapper_panier">
            <?php if (isset($selection_livre)): ?>

                <?php foreach ($selection_livre as $un_livre): ?>

                    <ul class="article_panier">
                        <li><img class='image' src=../<?= $un_livre->url_img ?> alt=<?= $un_livre->alt_img ?>/></li>
                        <li><span class='titre'>Titre</span><span><?= $un_livre->titre ?></span></li>
                        <li>
                            <span class='titre'>Prix</span><span><?= number_format($un_livre->prix, 2, '.', '') ?>
                                CAD</span></li>
                        <li>
                            <span class="titre">Quantité</span><span><?= $_SESSION['panier'][$un_livre->id_livre] ?></span>
                        </li>
                        <li><a href="panier.php?del=<?= $un_livre->id_livre ?>"><img class="bouton_panier"
                                                                                     src="../image/bouton/corbeille.jpg"
                                                                                     alt="bouton d'ajouter dans panier"></a>
                        </li>
                    </ul>
                <?php endforeach ?>
            <?php endif ?>
        </div>
        <input type="submit" value="valider commande" name="commande"/>
    </form>
</div>

