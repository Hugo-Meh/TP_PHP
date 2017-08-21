<?php
require_once '../utils/header_connect.php';

$json = array("erreur" => true);

if (isset($_GET['id']) && $_GET['qte'] && $_GET['prix']) {
    $_SESSION['panier'][$_GET['id']] = intval($_GET['qte']);
    $json["erreur"]=false;
    $json["total"]=$panier->total();
    $json["qte"]=$panier->quantite_panier();
    $json["message"]=" produit ajoute";



} else {$json["message"]=" aucun produit n'a etait sélectionné";}
echo json_encode($json);
