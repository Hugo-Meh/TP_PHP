<?php
require_once 'page_top.php';


// verifie si la table existe et rempli
if(!empty($bdd)&&!empty($bdd_livre))
    //affiche la liste des item pour chaque catgories  coché
while ($livre = mysqli_fetch_assoc($bdd_livre)) {
    echo '<ul class="article">';
    $requete_livre='SELECT C.nom_cat from categorie C INNER JOIN categorie_livre CL ON C.id_cat=CL.id_cat
                    INNER JOIN livres L ON L.id_livre=CL.id_livre WHERE L.id_livre=\''.$livre['id_livre'].'\'';
    $bdd__cat_livre = mysqli_query($bdd, $requete_livre);
    $cat_livre='';
    while($liste_cat = mysqli_fetch_assoc($bdd__cat_livre)){
        $cat_livre.=$liste_cat['nom_cat'].', ';
    }
    $cat_livre=substr_replace($cat_livre,'.',strlen($cat_livre)-2);
    echo "<li><span class='titre_detail'>Titre: </span><span>{$livre['titre']}</span></li> ";
    echo "<li><img class='image' src='{$livre['url_img']}' alt='{$livre['alt_img']}'/></li>";
    echo "<li><span class='titre_detail'>Auteur : </span><span>{$livre['auteur']}</span></li> ";
    echo "<li><span class='titre_detail'>Categorie : </span><span>{$cat_livre}</span></li> ";
    echo "<li><span class='titre_detail'>Description : </span><span>{$livre['description']}</span></li> ";
    echo "<li><span class='titre_detail'>Prix: </span><span>{$livre['prix']} CAD</span></li> ";
    echo"<li><button name='ajout_panier'>ajouter dans le panier</button></li>";
    echo '</ul>';
}


?>


<!--
<div class="article">
    <h2><?=$nomArticle?></h2>
    <img src="<?=$img_article?>"  alt="<?=$alt_article?>">
    <p>Ecrit par <?=$nomAuteur?></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi
            gravida id purus sed tempor. Morbi sagittis, quam eget
            lacinia sodales, lorem mauris auctor diam, vel semper dolor
            sapien id nisl. Etiam nec turpis nec tortor pretium consectetur
            sed quis enim. Ut mollis urna sit amet leo rutrum, ut
            bibendum tellus fringilla. Duis vitae nibh non erat auctor elementum
            at eget dolor. Integer nisl nulla, laoreet finibus ipsum et,
            porttitor finibus magna. Quisque dictum eu ligula vel interdum.
            Nullam eu leo sodales, scelerisque est a, volutpat justo. Proin ullamcorper
            dignissim nisi, vitae tempor orci semper a. Phasellus eu venenatis nulla. Phasellus
            accumsan sed enim id fringilla. Vestibulum tempor, diam eget consectetur
            maximus, diam quam efficitur lectus, ac sagittis augue augue sit amet elit.
            Aliquam condimentum hendrerit mauris, non mollis augue.</p>
</div>
-->
