<?php
require_once '../utils/header_connect.php';
echo '<main><div class="wrapper"><div id="valider_commande">';
if (!empty($_SESSION['panier'])) {
    if (!empty($_SESSION["userlogged"]) && $_SESSION["userlogged"]['is_logged']) {
        foreach ($_SESSION['panier'] as $id_livre => $qte_commande) {
            $requete_commande = 'SELECT DISTINCT U.id_user,P.id_livre,L.prix,L.qte,L.titre FROM panier P 
                            INNER JOIN user U ON P.id_user=U.id_user INNER JOIN livres L ON L.id_livre=P.id_livre
                            WHERE U.mail=:email AND P.id_livre=:id';

            $resultat = $BD->demande_requete($requete_commande, array("email" => "mohamednefzi.1985@gmail.com", "id" => $id_livre));

            if (!empty($resultat)) {
                $user = $resultat[0]->id_user;
                $qte_commande = $_SESSION['panier'][$id_livre];
                if ($resultat[0]->qte >= $qte_commande) {
                    $req_update = "UPDATE panier SET qte = qte +$qte_commande ,is_sold=false WHERE id_user=$user AND id_livre=$id_livre";
                    $resultat_update = $BD->demande_requete($req_update);
                    unset($_SESSION['panier'][$id_livre]);
                    echo "<p class='resultat_commande'> votre qantité de commande a été mis a jour  pour le livre'" . $resultat[0]->titre . "</p>";

                } else {
                    echo "<p class='resultat_commande'>nous regrettons nous n'avons pas la quantité suffisante pour le livre "
                        . $resultat[0]->titre . ". Vous pouvez commander jusqu'a :" . $resultat[0]->qte . "</p>";
                }

            } else {
                $requete_livre = "SELECT * FROM livres WHERE id_livre=:id";
                $resultat = $BD->demande_requete($requete_livre, array("id" => $id_livre));
                if ($resultat[0]->qte >= $qte_commande) {
                    $req_insert = "INSERT INTO panier VALUES ($id_livre,1,$qte_commande ,false)";
                    $resultat_insert = $BD->demande_requete($req_insert);
                    echo "<p class='resultat_commande'> votre commande a été ajouté  pour le livre'" . $resultat[0]->titre . "</p>";
                    unset($_SESSION['panier'][$id_livre]);
                } else {
                    echo "<p class='resultat_commande'>nous regrettons nous n'avons pas la quantité suffisante pour le livre "
                        . $resultat[0]->titre . ". Vous pouvez commander jusqu'a :" . $resultat[0]->qte . "</p>";

                }
            }
        }

    }else
        echo "<h2 class='reponse'>vous devez vous connecter pour valider votre commande</h2>";

}else  echo "<h2 class='reponse'>Veuillez d'abord choisir vos livres et remplir votre panier</h2>";
echo "<p><a href='javascript:history.back()'> retour à la page precedente</a></p>";
echo "<p><a href='index.php'> retour a l'accueil</a></p>";

echo"</div></div>";
