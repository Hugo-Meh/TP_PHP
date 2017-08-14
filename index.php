<?php
$nomArticle;
$alt_article;
$nomAuteur;
$image_article;
$title = "index";
require_once ('data/data.php');
require_once ('views/page_top.php');
echo "<main>";
echo "<p>le main de la page dans $title</p>";
foreach ($items as $livre ){
    $nomArticle = $livre['title'];
    $img_article = $livre['img_cover'];
    $alt_article = $livre['img_alt'];
    $nomAuteur = $livre['auteur'];
    require ('views/article.php');
}
echo "</main>";
require_once ('views/page_bottom.php');