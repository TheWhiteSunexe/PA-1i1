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

// Vérification du fichier reçu
if ($_FILES['image']['error'] == 0) {

    // Vérification du type
    $acceptable = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['image']['type'], $acceptable)) {
        header('Location: profil.php?message=Le fichier doit être un jpg, png ou gif'.$_FILES['image']['type'].'.&type=danger');
        exit; // Interrompt le code
    }

    // Vérification de la taille du fichier
    $maxSize = 2 * 1024 * 1024; // 2Mo
    if ($_FILES['image']['size'] > $maxSize) {
        header('Location: profil.php?message=Le fichier ne doit pas dépasser 2Mo&type=danger');
        exit; // Interrompt le code
    }

    // On créé un répertoire 'uploads' s'il n'existe pas
    if (!file_exists('uploads')) {
        mkdir('uploads');
    }

    // Enregistrement du fichier sur le serveur
    $from = $_FILES['image']['tmp_name']; // emplacement temporaire sur le serveur

    // Obtenir l'extension du fichier
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    // Générer un nom de fichier unique basé sur le timestamp
    $filename = 'image-' . time() . '.' . $extension;
    $to = 'uploads/' . $filename;

    // Déplacer le fichier téléchargé vers le répertoire 'uploads'
    if (!move_uploaded_file($from, $to)) {
        // En cas d'échec du déplacement du fichier
        header('Location: profil.php?message=Une erreur est survenue lors de l\'enregistrement du fichier&type=danger');
        exit; // Interrompt le code
    }
}


/*
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
    header('location:profil.php?message=EMAIL DEJA EXISTANT !');
    exit; //Interrompt le code 
}*/


include('includes/db.php');

//Requete preparer avec des marqueurs nominatifs
$q = 'UPDATE users SET image=:image WHERE id=:id';

//Preparation de la requete
//prep la requete
$req= $bdd->prepare($q);

//Execution
$result = $req->execute([
    'image' => isset($filename) ? $filename : 'default.jpg',
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