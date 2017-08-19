<?php

require_once 'header_connect.php';
var_dump($_SESSION);
if (!empty($_SESSION['panier'])) {
    foreach ($_SESSION['panier'] as $id_livre => $qte_commande) {
        $requete_commande = 'SELECT DISTINCT U.id_user,P.id_livre,L.prix,L.qte,L.titre FROM panier P 
                            INNER JOIN user U ON P.id_user=U.id_user INNER JOIN livres L ON L.id_livre=P.id_livre
                            WHERE U.mail=:email AND P.id_livre=:id';

        $resultat = $BD->demande_requete($requete_commande, array("email" => "mohamednefzi.1985@gmail.com", "id" => $id_livre));

        if (!empty($resultat)) {
            echo 'update :' . $id_livre;
            $user = $resultat[0]->id_user;
            $tab = array(":new_qte" => $qte_commande,
                ":bool" => false,
                ":id_u" => $user,
                ":id_L" => $id_livre);

            if ($resultat[0]->qte >= $qte_commande) {
                echo 'update ok <br>:';
                $req_update = "UPDATE panier SET qte = qte +$qte_commande ,is_sold=false WHERE id_user=$user AND id_livre=$id_livre";
                $resultat_update = $BD->demande_requete($req_update);
                unset($_SESSION['panier'][$id_livre]);

            } else {
                printf("nous regrettons nous n'avons pas la quantité suffisante pour le livre "
                    . $resultat[0]->titre . ". Vous puvez commander jusqu'a :" . $resultat[0]->qte);
            }

        } else {
            echo 'insert :' . $id_livre;
            $requete_livre = "SELECT * FROM livres WHERE id_livre=:id";
            $resultat = $BD->demande_requete($requete_livre, array("id" => $id_livre));
            if ($resultat[0]->qte >= $qte_commande) {
                $req_insert = "INSERT INTO panier VALUES ($id_livre,1,$qte_commande ,false)";

                $resultat_insert = $BD->demande_requete($req_insert);
                unset($_SESSION['panier'][$id_livre]);
            } else {
                echo "nous regrettons nous n'avons pas la quantité suffisante pour le livre "
                    . $resultat[0]->titre . ". Vous puvez commander jusqu'a :" . $resultat[0]->qte;
            }
        }
    }

} else {
    echo " Veuillez d'abord choisir vos livres et remplir votre panier";

}

