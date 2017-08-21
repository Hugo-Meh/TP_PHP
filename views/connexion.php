<?php
require_once dirname(__DIR__) . '/utils/header_connect.php';
$en_post = ('POST' === $_SERVER['REQUEST_METHOD']);
if (!empty($_POST['connexion'])) {
    if (!empty($_SESSION['userlogged']))
        unset($_SESSION['userlogged']);
    if (!empty($_POST['connexion']['mail']) && !empty($_POST['connexion']['mdp'])) {
        $requet = "SELECT * FROM user WHERE mail='" . $_POST['connexion']['mail'] . "'";
        $resultat = $BD->demande_requete($requet);
        if (!empty($resultat) && password_verify($_POST['connexion']['mdp'], $resultat[0]->password)) {
            $_SESSION['userlogged']['mail'] = $_POST['connexion']['mail'];
            $_SESSION['userlogged']['is_logged'] = true;
        }
    }
}
if (array_key_exists('deconnexion',$_POST) && !empty($_POST['deconnexion'])){
    unset($_SESSION['userlogged']);
}
?>
<div id="container_insc_conn">
    <?php if (!(array_key_exists('userlogged',$_SESSION))){
        echo '
        <form method="post" action="" id="form_connexion">
        <input type="text" name="connexion[mail]" required placeholder="username" autofocus/>
        <input type="password" name="connexion[mdp]" required placeholder="password"/>
        <input type="submit" value="connexion" />
    </form>';
    }
    else{
        echo '<form method="post" action="" id="form_connexion">
        <input type="submit" name="deconnexion" value="deconnexion" />
        </form>';
    }?>
</div>