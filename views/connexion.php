<?php
require_once dirname(__DIR__) . '/utils/header_connect.php';
$en_post = ('POST' === $_SERVER['REQUEST_METHOD']);
if (!empty($_POST['connexion'])) {
    if (!empty($_SESSION['userlogged']))
        unset($_SESSION['userlogged']);
    if (!empty($_POST['connexion']['mail']) && !empty($_POST['connexion']['mdp'])) {
        $requet = "SELECT * FROM user WHERE mail='" . $_POST['connexion']['mail'] . "'";
        $resultat = $BD->demande_requete($requet);
        var_dump($resultat);
        if (!empty($resultat) && password_verify($_POST['connexion']['mdp'], $resultat[0]->password)) {
            $_SESSION['userlogged']['mail'] = $_POST['connexion']['mail'];
            $_SESSION['userlogged']['is_logged'] = true;
        }
        var_dump($_SESSION);
    }
}
?>
<div id="container_insc_conn">
    <form method="post" action="" id="form_connexion">
        <input type="text" name="connexion[mail]" required placeholder="username" autofocus/>
        <input type="password" name="connexion[mdp]" required placeholder="username"/>
        <input type="submit" value="connexion"/>
    </form>
</div>