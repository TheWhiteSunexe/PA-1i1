<?php session_start();

// Si email ou password n'existent pas ou sont vides > redirection vers connexion.php avec un message d'erreur
if (
    !isset($_FILES['image'])
    || empty($_FILES['image'])
) {
    header('location:cv_formateur.php?message=Vous devez remplir le champ !&type=danger');
    exit; // Interrompt le code
}


// Vérification du fichier reçu
if ($_FILES['image']['error'] == 0) {

    // Vérification du type
    $acceptable = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['image']['type'], $acceptable)) {
        header('location:cv_formateur.php?message=Le fichier doit être un jpg, png ou gif.&type=danger');
        exit; // Interrompt le code
    }

    // Vérification de la taille du fichier
    $maxSize = 900 * 1024 * 1024; // 900Mo
    if ($_FILES['image']['size'] > $maxSize) {
        header('location:cv_formateur.php?message=Le fichier ne doit pas dépasser 900Mo&type=danger');
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

// connexion à la DB
include('includes/db.php');

// Si l'email est déjà utilisé > redirection vers la page d'inscription

// Ecrire la requete SELECT "à trou"
$q = 'SELECT id FROM users WHERE email = :email';

// Préparer la requete 
$req = $bdd->prepare($q);

// Exécuter la requête
$req->execute([
    'email' => $_SESSION['email']
]);

// Récupérer les résultats dans un tableau $results (fetchAll)
$results = $req->fetchAll();


// Si $results n'est pas vide > redirection
if (empty($results)) {
    header('location:cv_formateur.php?message=un problème est survenue, veuillez réessayez !&type=danger');
    exit; // Interrompt le code
}

$q = 'UPDATE users SET cv = :cv WHERE email = :email';

//Preparation de la requete
//prep la requete
$req= $bdd->prepare($q);

// On s'assure que la clé 'email' est définie dans $_SESSION avant de l'utiliser
if (!isset($_SESSION['email'])) {
    // Redirigez l'utilisateur ou gérez l'erreur comme il convient
    header('location:cv_formateur.php?message=Email non défini.&type=danger');
    exit;
}


//Execution
$result = $req->execute([
    'email' => $_SESSION['email'], // Cela lie la valeur de $_SESSION['email'] à :email
    'cv' => isset($filename) ? $filename : 'default.jpg'
]);

if(!$result){
    header('location:cv_formateur.php?message=Erreur lors de l\'inscription !');
    exit;
}


//si on arrive c'est qu'un nouveau compte a été crée


    header('location:cv_formateur.php?message=Télerchargement réussi ! Nous vérifions vos informations...');
    exit;

?>