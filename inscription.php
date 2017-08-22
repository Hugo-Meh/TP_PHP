<?php

require_once 'data/data_validation.php';
require_once ('views/page_top.php');
$en_post = ('POST' === $_SERVER['REQUEST_METHOD']);

if (!empty($_POST) && ! empty($_POST['inscription'])) {

    if (empty($_POST['inscription']['nom']) || !preg_match("/^[a-zA-Z_]{3,}$/", $_POST['inscription']['nom'])) {
        $validation["nom"]["err_msg"] = "votre nom est invalid";
        $validation["nom"]["is_valid"] = true;

    } else {
        $validation["nom"]["val"] = $_POST['inscription']['nom'];
    }
    if (empty($_POST['inscription']['prenom']) || !preg_match("/^[a-zA-Z_]{3,}$/", $_POST['inscription']['prenom'])) {
        $validation["prenom"]["err_msg"] = "votre prenom est invalid";
        $validation["prenom"]["is_valid"] = true;

    } else {
        $validation["prenom"]["val"] = $_POST['inscription']['prenom'];
    }

    if (empty($_POST['inscription']['mail']) || !filter_var($_POST['inscription']['mail'], FILTER_VALIDATE_EMAIL)) {
        $validation["mail"]["err_msg"] = "votre email est invalid";
        $validation["mail"]["is_valid"] = true;

    } else {
        $requet = 'SELECT mail FROM user WHERE mail=:email';
        $resultat = $BD->demande_requete($requet, array('email' => $_POST['inscription']['mail']));
        if (!empty($resultat)) {
            $validation["mail"]["err_msg"] = "votre email est dejà utilisé";
            $validation["mail"]["is_valid"] = true;

        } else {
            $validation["mail"]["val"] = $_POST['inscription']['mail'];
        }
    }
    if (empty($_POST['inscription']['mdp']) || $_POST['inscription']['mdp'] != $_POST['inscription']['mdpconfirm']
        || !preg_match("/^[a-zA-Z0-9]{6,}$/", $_POST['inscription']['mdp'])) {
        $validation["mdp"]["err_msg"] = "votre password est invalid(alphanumerique)";
        $validation["mdp"]["is_valid"] = true;

    }
    if (strlen($_POST['inscription']['adr'])==0) {
        $validation["adr"]["err_msg"] = "votre champ adresse  est vide";
        $validation["adr"]["is_valid"] = true;

    } else {
        $validation["adr"]["val"] = $_POST['inscription']['adr'];
    }
    if (empty($_POST['inscription']['cp'])
        || !preg_match("/^[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]$/", $_POST['inscription']['cp'])) {
        $validation["cp"]["err_msg"] = "votre champ est invalid exemple de code postal 1H11B1";
        $validation["cp"]["is_valid"] = true;

    } else $validation["cp"]["val"] = $_POST['inscription']['cp'];

    if (!preg_match("/^[0-9]{10}$/", $_POST['inscription']['tel'])) {
        $validation["tel"]["err_msg"] = "votre format du tel est invalid";
        $validation["tel"]["is_valid"] = true;

    } else $validation["tel"]["val"] = $_POST['inscription']['tel'];


}
$test_update =true;
foreach ($validation as $value) {
    if ($value["is_valid"] == true) {
        $test_update=false;
        break;

    }

}
if ($en_post &&  $test_update &&!empty($_POST)) {
    require_once 'utils/traitement.php';
    if(!empty($_POST['inscription']))
    {
    unset($_POST['inscription']);
    }
    exit();
}
?>

<div id="wrapper_inscription">
    <form action="" method="post">
        <legend>INSCRIPTION</legend>
        <ul>
            <li><label for="nom">Nom :</label><input type="text" placeholder="votre nom" id="nom" name="inscription[nom]"
                                                     value='<?= $validation["nom"]["val"] ?>' autofocus/>
                <?php if ($en_post && $validation["nom"]["is_valid"]) {
                    echo '<p class="champ_invalide">' . $validation["nom"]["err_msg"] . '</p>';
                }

                ?>
            </li>
            <li><label for="penom">Prenom :</label><input type="text" placeholder="votre prenom" id="prenom" name="inscription[prenom]"
                                                          value='<?= $validation["prenom"]["val"] ?>'/>
                <?php if ($en_post && $validation["prenom"]["is_valid"]) {
                    echo '<p class="champ_invalide">' . $validation["prenom"]["err_msg"] . '</p>';
                }

                ?>
            </li>
            <li><label for="mail">mail :</label><input type="email" placeholder="exemple@domaine.ca" id="mail" name="inscription[mail]"
                                                       value='<?= $validation["mail"]["val"] ?>'/>
                <?php if ($en_post && $validation["mail"]["is_valid"]) {
                    echo '<p class="champ_invalide">' . $validation["mail"]["err_msg"] . '</p>';
                }

                ?>

            </li>
            <li><label for="mdp">mot de passe :</label><input type="password" id="mdp" name="inscription[mdp]" min=8/>
                <?php if ($en_post && $validation["mdp"]["is_valid"]) {
                    echo '<p class="champ_invalide">' . $validation["mdp"]["err_msg"] . '</p>';
                }

                ?>
            </li>
            <li><label for="mdp">mot de passe :</label><input type="password" id="mdp" name="inscription[mdpconfirm]" min=8/>

            </li>
            <li><label for="adr">adresse :</label><input type="text" id="adr" name="inscription[adr]"
                                                         value='<?= $validation["adr"]["val"] ?>'/>
                <?php if ($en_post && $validation["adr"]["is_valid"]) {
                    echo '<p class="champ_invalide">' . $validation["adr"]["err_msg"] . '</p>';
                }
                ?>
            </li>
            <li><label for="cp">code postale :</label><input type="text" value='<?= $validation["cp"]["val"] ?>' id="cp"
                                                             name="inscription[cp]"/>
                <?php if ($en_post && $validation["cp"]["is_valid"]) {
                    echo '<p class="champ_invalide">' . $validation["cp"]["err_msg"] . '</p>';
                }
                ?>

            </li>
            <li><label for="tel">téléphone :</label><input type="tel" value='<?= $validation["tel"]["val"] ?>' id="tel"
                                                           name="inscription[tel]"/>
                <?php if ($en_post && $validation["tel"]["is_valid"]) {
                    echo '<p class="champ_invalide">' . $validation["tel"]["err_msg"] . '</p>';
                }
                ?>

            </li>
            <li id="submit"><input type="submit" value="valider inscription"/></li>
        </ul>
    </form>
</div>
<?php
    require_once ('views/page_bottom.php');
?>



