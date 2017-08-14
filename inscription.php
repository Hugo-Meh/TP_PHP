<?php
/*
*
*
*
*
*/      
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<?php
?>
<form action="traitement.php" method="post">
    <fieldset>
    <legend>INSCRIPTION</legend>
        <ul>
            <li><label for="nom">Nom :</label><input type="text" placeholder="votre nom" id="nom" name="nom" required autofocus/></li>
            <li><label for="penom">Prenom :</label><input type="text" placeholder="votre prenom" id="prenom" name="prenom" required/></li>
            <li><label for="mail">mail :</label><input type="email" placeholder="exemple@domaine.ca" id="mail" name="mail" required/></li>
            <li><label for="mdp">mot de passe :</label><input type="password" id="mdp" name="mdp"required/></li>
            <li><label for="adr">adresse :</label><input type="text" required id="adr" name="adr"/></li>
            <li><label for="cp">code postale :</label><input type="text" required id="cp" name="cp"/></li>
            <li><label for="tel">téléphone :</label><input type="tel" id="tel" name="tel"/></li>
            <li><input type="submit" value="valider inscription"/></li>
        </ul>
    </fieldset>
</form>
</body>
</html>