<?php
//unset($_POST);

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
echo '<form method="POST" action=""><ul class="ul_cat">';
//afficher les categorie enregistré dans la base
// si on ajoute une categorie a la base serait dynamiquement ajouté dans la liste categorie
while ($donnee = mysqli_fetch_assoc($categorie)) {
    $nom_cat = $donnee['nom_cat'];
    echo "<li class='li_cat'><input type='checkbox' name='{$nom_cat}'><label for='{$nom_cat}'>{$nom_cat}</label></li>";
}
echo '</ul>';
echo '<input type="submit" name="btn_cat" value="valider"/>';
echo '</form>';

//traitement de l'afichage des livres des categories coché
if(!empty($_POST)&&array_key_exists('btn_cat',$_POST))
{
if ($_POST['btn_cat'] == 'valider') {
    echo '<div id="container_listes">';
    // parcourir le tableau $_GET en cherchant les categories cochés
    foreach ($_POST as $id => $value) {
        if ($value == 'on') {
            $requete = 'select * from categorie C INNER JOIN articles A ON C.id_cat=A.id_cat WHERE C.nom_cat=\'' . $id . '\'';
            $bdd_liste = mysqli_query($bdd, $requete);
            echo "<div class='list_cat'><p>$id</p>";
            require 'views/article.php';
            echo "</div>";
        }
    }
    echo '</div>';

}
}
echo "</main>";

require_once('views/page_bottom.php');

?>


