<?php
$title = "page1";
require_once('views/page_top.php');
echo "<main>";

// connexion a la base de donnee
try {
    $bdd = mysqli_connect('localhost', 'root', '', 'tp_php');
} // message d'erreur si echec de connexion
catch (Exception $exception) {
    die('Erreur : ' . $exception->getMessage());
}
$categorie = mysqli_query($bdd, 'select nom_cat from categorie');
echo '<form><ul class="ul_cat">';
//afficher les categorie enregistré dans la base
// si on ajoute une categorie a la base serait dynamiquement ajouté dans la liste categorie
while ($donnee = mysqli_fetch_assoc($categorie)) {
    $nom_cat = $donnee['nom_cat'];
    echo "<li class='li_cat'><input type='checkbox' name='{$nom_cat}'><label for='{$nom_cat}'>{$nom_cat}</label></li>";
}
echo '</ul>';
echo '<button name="btn_cat" value="liste_cat">valider</button> ';
echo '</form>';
if ($_GET['btn_cat'] == 'liste_cat') {
    echo '<div id="container_listes">';
    // parcourir le tableau $_GET en cherchant les categories cochés
    foreach ($_GET as $id => $value) {
        if ($value == 'on') {
            echo $id;
            $requete = 'select * from categorie C INNER JOIN articles A ON C.id_cat=A.id_cat WHERE C.nom_cat=\'' . $id . '\'';
            $bdd_liste = mysqli_query($bdd, $requete);

            echo '<ul class="article">';
            //affiche la liste des item pour chaque catgories  coché
            while ($article = mysqli_fetch_assoc($bdd_liste)) {
                echo "<li><img src='{$article['url_img']}' alt='{$article['alt_img']}'/></li>";
                echo "<li><span class='titre_detail'>Nom  de l'article: </span><span>{$article['alt_img']}</span></li> ";
                echo "<li><span class='titre_detail'>Description: </span><span>{$article['description']}</span></li> ";
                echo "<li><span class='titre_detail'>Prix: </span><span>{$article['prix']} CAD</span></li> ";
            }
            echo '</ul>';

        }
    }
    echo '</div>';
}

echo "</main>";

require_once('views/page_bottom.php');

?>


