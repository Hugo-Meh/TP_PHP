<?php
require_once 'header_connect.php';

if(!empty($_POST['inscription'])) {
    $adresse = $_POST['inscription']['adr'] . " " . $_POST['inscription']['cp'];
    $password = password_hash($_POST['inscription']["mdp"], PASSWORD_BCRYPT);
    $requete_insert = "INSERT INTO `user`( `nom`, `prenom`, `mail`, `password`, `adresse`,`tel`)VALUES
 ('" . $_POST['inscription']['nom'] . "','" . $_POST['inscription']['prenom'] . "','" . $_POST['inscription']['mail'] . "','" . $password . "','" . $adresse . "',null)";

    $res = $BD->demande_requete($requete_insert);


}
?>

<div id="reponse_inscription">
    <h1 ="reponse">VOUS ETES MAINTENANT ENREGISTRES</h1>
    <a href="index.php"><button>RETOUR A LA PAGE D'ACCUEUIL</button></a>
</div>

