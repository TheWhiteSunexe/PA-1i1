<?php
session_start();
/*function writeLogLine($success, $email){
    $log = fopen('log.txt', 'a+');

    $line = date('Y/m/d - H:i:s') . ' - Tentative de connaexion' . ($success ? ' réussi' : ' échouée') . ' de : ' . $_POST['email'] . "\r\n";

    fputs($log, $line);

    fclose($log);

}*/

if(isset($_POST['email']) && !empty($_POST['email'])){
    setcookie('email', $_POST['email'], time() + 30 * 24 * 3600);
}

if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        header('location:login antichambre.php?message=EMAIL INVALIDE !&type=danger');
        exit;
    }

if(strlen($_POST['password']) < 6 || strlen($_POST['password']) > 16 ){
    header('location:login antichambre.php?message=Le mdp doit faire entre 6 et 16 caratcères !&type=danger');
    exit;
}


if($_POST['password'] != $_POST['verif_password']){
    header('location:login antichambre.php?message=Le mot de passe n\'est pas le même !&type=danger');
    exit;
}

if(isset($_POST['captcha'])){
    if($_POST['captcha'] != $_SESSION['captcha']){
        header('location:login antichambre.php?message=Le code anti-robot est faux !&type=danger');
        exit;
    }
}

// Vérification du fichier reçu
if ($_FILES['image']['error'] == 0) {

    // Vérification du type
    $acceptable = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['image']['type'], $acceptable)) {
        header('location: inscription.php?message=Le fichier doit être un jpg, png ou gif.&type=danger');
        exit; // Interrompt le code
    }

    // Vérification de la taille du fichier
    $maxSize = 2 * 1024 * 1024; // 2Mo
    if ($_FILES['image']['size'] > $maxSize) {
        header('location: inscription.php?message=Le fichier ne doit pas dépasser 2Mo&type=danger');
        exit; // Interrompt le code
    }

    // on créé un fichier uploads s'il n'existe pas 
    if (!file_exists('uploads')) {
        mkdir('uploads');
    }

    // Enregistrement du fichier sur le serveur
    $from = $_FILES['image']['tmp_name']; // emplacement temporaire sur le serveur

    // image.profil.min.png
    // explode() =>  ['image', 'profil', 'min', 'png']
    $array = explode('.', $_FILES['image']['name']);
    $extension = end($array);

    $filename = 'image-' . time() . '.' . $extension;
    $to = 'uploads/' . $filename;

    move_uploaded_file($from, $to);
}

include('includes/db.php');


//Vérifier que l'email n'existe deja pas dans la bdd
$q='SELECT id FROM users WHERE email = :email';

//Preparer la requete
$req = $bdd->prepare($q);

//Executer la requete
$req->execute(['email' => $_POST['email']]);

//Recuperer les resultats dans un tableau $results
$results = $req->fetchAll();

//Si le tabelau n'est pas vide >
if(!empty($results)){
    header('location:login antichambre.php?message=EMAIL DEJA EXISTANT !');
    exit; //Interrompt le code 
}



//Requete preparer avec des marqueurs nominatifs
$q = 'INSERT INTO users(email, password, prenom, nom, verif_f, image) VALUES(:email,:password, :prenom, :nom, :verif_f, :image)';

//Preparation de la requete
//prep la requete
$req= $bdd->prepare($q);

//salage de mdp
$salt = 'salé';
$mdp_salt=$_POST['password'].$salt;

//hachage de mdp
$mdp_hash = hash('sha256',$mdp_salt);

//Execution
$result = $req->execute([
    'email' => $_POST['email'],
    'password' => $mdp_hash,
    'prenom' => $_POST['prenom'],
    'nom' => $_POST['nom'],
    'verif_f' => $_POST['verif_f'],
    'image' => isset($filename) ? $filename : 'default.jpg'


]);

if(!$result){
    header('location:login antichambre.php?message=Erreur lors de l\'inscription !');
    exit;
}


//si on arrive c'est qu'un nouveau compte a été crée
header('location:login antichambre.php?message=Compte crée avec succès ! Connectez-vous.');
exit;




