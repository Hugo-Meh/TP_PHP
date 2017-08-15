<?php
$en_post = ('POST' === $_SERVER['REQUEST_METHOD']);

$validation=array(
 'nom'=> array(
    'val' => '',
    'err_msg' => '',
    'is_valid' => false,
),
    'prenom'=> array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'mail'=> array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'mdp'=> array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'adr'=> array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'cp'=> array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
    'tel'=> array(
        'val' => '',
        'err_msg' => '',
        'is_valid' => false,
    ),
);

    $l_name=$validation['nom'];
if(array_key_exists('nom',$_POST))
{
    $l_name['val']=trim(filter_input(INPUT_POST,'nom',FILTER_SANITIZE_STRING));
    $l_name['is_valid']=strlen($l_name['val'])>2;
    if ( ! $l_name['is_valid']){
        $l_name['err_msg']='le champ nom est invalid';
    }
}
$f_name=$validation['prenom'];

if(array_key_exists('prenom',$_POST))
{
    $f_name['val']=trim(filter_input(INPUT_POST,'prenom',FILTER_SANITIZE_STRING));
    $f_name['is_valid']=strlen($f_name['val'])>2;
    if ( ! $f_name['is_valid']){
        $f_name['err_msg']='le champ prenom est invalid';
    }
}
$email=$validation['mail'];
if(array_key_exists('mail',$_POST))
{
    $email['val']=trim(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL));
    $email['is_valid']=strlen($email['val'])!=false;
    if ( ! $email['is_valid']){
        $email['err_msg']='email est invalid';
    }
}

$mdp=$validation['mdp'];
if(array_key_exists('mdp',$_POST))
{
    $mdp['val']=trim(filter_input(INPUT_POST,'mdp',FILTER_SANITIZE_STRING));
    $mdp['is_valid']=(1 === preg_match('^[\w$@%*+\-_!]{4,15}$',$mdp['val']));
    if ( ! $mdp['is_valid']){
        $mdp['err_msg']='le champ mot de passe est invalid: il doit contenir au moins un chiffre une lettre majiscule 
        une lettre miniscule et des caractere suivant  $ @ % * + - _ !';
    }
}


$adr=$validation['adr'];

if(array_key_exists('adr',$_POST))
{
    $adr['val']=trim(filter_input(INPUT_POST,'adr',FILTER_SANITIZE_STRING));
    $adr['is_valid']=strlen($adr['val'])>0;
    if ( ! $adr['is_valid']){
        $adr['err_msg']='le champ adresse est invalid';
    }
}


$cp=$validation['cp'];
if(array_key_exists('cp',$_POST))
{
    $cp['val']=trim(filter_input(INPUT_POST,'cp',FILTER_SANITIZE_STRING));
    $cp['is_valid']=(1 === preg_match('^[A-Z]\d[A-Z] \d[A-Z]\d$',$cp['val']));
    if ( ! $cp['is_valid']){
        $cp['err_msg']='le champ code postale est invalid';
    }
}

$tel=$validation['tel'];
if(array_key_exists('tel',$_POST))
{
    $tel['val']=trim(filter_input(INPUT_POST,'tel',FILTER_SANITIZE_STRING));
    $tel['is_valid']=(1 === preg_match('^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$',$tel['val']));
    if ( ! $tel['is_valid']){
        $tel['err_msg']='le champ telephone est invalid';
    }
}
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
            <li><label for="nom">Nom :</label><input type="text" placeholder="votre nom" id="nom" name="nom" required autofocus/>
                <?php if ($en_post && !$l_name['is_valid'])
                {
                    echo'<p class="champ_invalide">'.$l_name['err_msg'].'</p>';
                }

                ?>
            </li>
            <li><label for="penom">Prenom :</label><input type="text" placeholder="votre prenom" id="prenom" name="prenom" required/>
                <?php if ($en_post && !$f_name['is_valid'])
                {
                    echo'<p class="champ_invalide">'.$f_name['err_msg'].'</p>';
                }

                ?>
            </li>
            <li><label for="mail">mail :</label><input type="email" placeholder="exemple@domaine.ca" id="mail" name="mail" required/>
                <?php if ($en_post && !$email['is_valid'])
                {
                    echo'<p class="champ_invalide">'.$email['err_msg'].'</p>';
                }

                ?>

            </li>
            <li><label for="mdp">mot de passe :</label><input type="password" id="mdp" name="mdp" min=8 required/>
                <?php if ($en_post && !$mdp['is_valid'])
                {
                    echo'<p class="champ_invalide">'.$mdp['err_msg'].'</p>';
                }

                ?>
            </li>
            <li><label for="adr">adresse :</label><input type="text" required id="adr" name="adr"/>
                <?php if ($en_post && !$adr['is_valid'])
                {
                    echo'<p class="champ_invalide">'.$adr['err_msg'].'</p>';
                }
                ?>
            </li>
            <li><label for="cp">code postale :</label><input type="text" required id="cp" name="cp"/>
                <?php if ($en_post && !$cp['is_valid'])
                {
                    echo'<p class="champ_invalide">'.$cp['err_msg'].'</p>';
                }
                ?>

            </li>
            <li><label for="tel">téléphone :</label><input type="tel" id="tel" name="tel"/>
                <?php if ($en_post && !$tel['is_valid'])
                {
                    echo'<p class="champ_invalide">'.$tel['err_msg'].'</p>';
                }
                ?>

            </li>
            <li><input type="submit" value="valider inscription"/></li>
        </ul>
    </fieldset>
</form>
</body>
</html>