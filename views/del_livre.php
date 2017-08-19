<?php
require_once 'header_connect.php';
//var_dump($_GET);
//var_dump($_SESSION);
$json = array("erreur" => true);
$del=$_GET['del'];
$session_panier=$_SESSION['panier'];
if (isset($_GET['del'])) {
    if (array_key_exists($del, $session_panier)) {
        $requete_panier = 'SELECT prix FROM livres WHERE id_livre=:id';
        $livre = $BD->demande_requete($requete_panier, array('id' => $del));
        $json["erreur"]=false;
        $json["total"]=$panier->total()-$session_panier[$del]*$livre[0]->prix;
        $json["qte"]=$panier->quantite_panier()-$session_panier[$del];
        $json["message"]=" produit ajoute";
        unset($_SESSION['panier'][$del]);

    }
    else $json["message"]="le produit n'existe plus dans le panier veuillez rafraichir la page";

} else {
    $json["message"] = "ce produit est inconnu";
}

echo json_encode($json);
