<?php
require_once 'page_top.php';
?>
<header>
    <?php require_once ('connexion.php');
    require_once ('menu.php'); ?>
    <p>haut de la page</p>
    <a href="panier.php"><img src="image/bouton/mon_panier.jpg" alt="image mon panier"></a>

    <div id="recap_panier">
        <span>Prix total : </span><span class="total_prix"><?= $panier->quantite_panier()!=null?$panier->total():"" ?></span><br>
        <span>quantité total : </span><span class="qte_total"><?= $panier->quantite_panier()!=null?$panier->quantite_panier():"" ?></span>
    </div>
</header>