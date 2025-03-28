<?php
session_start();
/*function writeLogLine($success, $email){
    $log = fopen('log.txt', 'a+');

    $line = date('Y/m/d - H:i:s') . ' - Tentative de connexion' . ($success ? ' réussi' : ' échouée') . ' de : ' . $_POST['email'] . "\r\n";

    fputs($log, $line);

    fclose($log);

}*/

if(isset($_POST['email']) && !empty($_POST['email'])){
    setcookie('email', $_POST['email'], time() + 30 * 24 * 3600);
}
/*
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header('location:profil.php?message=EMAIL INVALIDE !');
        exit;
}

if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16 ){
    header('location:profil.php?message=Le mdp doit faire entre 6 et 16 caractères !');
    exit;
}


if($_POST['password'] != $_POST['verif_password']){
    header('location:profil.php?message=Le mot de passe n\'est pas le même !');
    exit;
}

if(isset($_POST['captcha'])){
    if($_POST['captcha'] != $_SESSION['captcha']){
        header('location:profil.php?message=Le code anti-robot est faux !');
        exit;
    }
}*/



include('includes/db.php');

//Requete preparer avec des marqueurs nominatifs
$q = 'UPDATE users SET nom=:nom, password=:password, prenom=:prenom, numero_telephone=:numero_telephone, adresse=:adresse, code_postal=:code_postal, ville=:ville, email=:email, pays=:pays, region=:region WHERE id=:id';

//Preparation de la requete
//prep la requete
$req= $bdd->prepare($q);

//salage de mdp
$salt = 'sal�';
$mdp_salt=$_POST['password'].$salt;

//hachage de mdp
$mdp_hash = hash('sha256',$mdp_salt);

//Execution
$result = $req->execute([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'numero_telephone' => $_POST['numero_telephone'],
    'password' => $mdp_hash,
    'adresse' => $_POST['adresse'],
    'code_postal' => $_POST['code_postal'],
    'ville' => $_POST['ville'],
    'email' => $_POST['email'],
    'pays' => $_POST['pays'],
    'region' => $_POST['region'],
    'id' => $_SESSION['id']

]);

if(!$result){
    header('location:profil.php?message=Il y a eu un problème veuillez rééssayer...&type=warning ');
    exit;
}


//si on arrive c'est que les modification sont prise en comptes
header('location:profil.php?message=modification avec succès ! &type=success');
exit;

?>