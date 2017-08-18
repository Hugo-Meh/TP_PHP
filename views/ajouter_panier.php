<?php
require_once 'header_connect.php';

$json=array("erreur"=>true);

if (isset($_GET['id'])) {
    $requete_panier = 'SELECT id_livre FROM livres WHERE id_livre=:id';
    $livre = $BD->demande_requete($requete_panier, array('id' => $_GET['id']));
    if (empty($livre)) {
        $json["message"]="Ce produit n'existe pas";
    }
    else{
    $panier->ajouter_panier($livre[0]->id_livre);
        $json["erreur"]=false;
        $json["total"]=$panier->total();
        $json["qte"]=$panier->quantite_panier();
        $json["message"]=" produit ajoute";
    }
} else {$json["message"]=" aucun produit n'a etait sélectionné";}
echo json_encode($json);


