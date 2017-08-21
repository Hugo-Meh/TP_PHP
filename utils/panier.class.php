<?php

class Panier
{

    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
    }

    function ajouter_panier($livre)
    {
        if (isset($_SESSION['panier'][$livre]))
            $_SESSION['panier'][$livre]++;
        else {
            $_SESSION['panier'][$livre] = 1;
        }
    }

    function supprimer($livre)
    {
        unset($_SESSION['panier'][$livre]);

    }

    function total()
    {
        global $BD;
        $total = 0;
        if (isset($_SESSION['panier'])) {
            $livre_selectionne = implode(',', array_keys($_SESSION['panier']));
            $selection_livre = $BD->demande_requete("SELECT * FROM livres WHERE id_livre IN ($livre_selectionne)");
        }
        if(isset($selection_livre))
            foreach ($selection_livre as $livre) {

                $total += number_format($livre->prix ,2)* $_SESSION['panier'][$livre->id_livre];
            }
        return $total;
    }
    function quantite_panier(){
        $qte=0;
        if (isset($_SESSION['panier'])){
            foreach ($_SESSION['panier'] as $item){
                $qte+=$item;
            }
        }
        return $qte;
    }
}
