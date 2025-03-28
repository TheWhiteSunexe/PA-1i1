<?php

if(isset($_POST['valeurasupp'])) {
    // Appeler la fonction pour supprimer la section
    $essai += $_POST['valeurasupp'];
    delete($essai);
}

function delete($essai){
    // Lire le contenu actuel de modules.html
    $content = file_get_contents('modules.html');

    // Supprimer la section avec l'index unique
    // Par exemple, si chaque section est délimitée par <form ...> et </form>, on supprime la section en utilisant une expression régulière
    //prend la chaine, puis ce avec quoi il doit remplacer puis le contenu
    $content = preg_replace('#<form.*?id="' . $essai . '".*?</form>#s', '', $content);

    // Réécrire le contenu dans modules.html
    file_put_contents('modules.html', $content);
    header('modules.php?message=section supprimée !');
    exit;
}

//---------------------------------------------------CODE ALEATOIRE-----------------------------------------------------------
/*
function generateurAleatoire($length = 30) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $ALEATOIRE = '';
    for ($i = 0; $i < $length; $i++) {
        $ALEATOIRE .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $ALEATOIRE;
}

//$ALEATOIRE = generateurAleatoire();
*/
//-------------------------------------------------FIN CODE ALEATOIRE---------------------------------------------------------

if(isset($_POST['nm'])){
    $choix = ($_POST['nm'] === 'actif') ? 'actif' : 'inactif';
    setcookie('nm', $choix, time() + 30 * 24 * 3600, '/');
    
    if(isset($_COOKIE['nm']) && !empty($_COOKIE['nm'])){
        header('location:profil.php?message=changement effectué&type=success');
        exit;
    }
}


//----------------------------------------------------CHOIX LANGUE------------------------------------------------------------

if(isset($_POST['langue']) && !empty($_POST['langue'])){
    setcookie('langue', $_POST['langue'], time() + 30 * 24 * 3600, '/');
    
    if(isset($_COOKIE['langue']) && !empty($_COOKIE['langue'])){
        header('location:index.php?message=cookie mis en place (langue)');
        exit;
    }
}

/*
if (isset($_POST["langue"])) {

    if($_POST["langue"] == 'fr'){
    header('location: ../../index.php');
    exit;
    }

    if($_POST["langue"] == 'en'){
        header('location: ../langues/Anglais/accueil.html');
        exit;
    }
    if($_POST["langue"] == 'es'){
        header('location: ../langues/Espagnol/accueil.html');
        exit;
    }
    if($_POST["langue"] == 'ch'){
        header('location: ../langues/Mandarin/accueil.html');
        exit;
    }
}*/

//--------------------------------------------------FIN CHOIX LANGUE------------------------------------------------------------


//ESSAI D'AJOUTER DU CODE A LA PAGE MODULE -> admin ajt des vidéos au apprentis

//-------------------------------------------------AJOUT DE MATIERE-------------------------------------------------------------
if (isset($_POST['titre-matière']) && isset($_POST['description-matière']) && $_GET['message'] == 1) {
    try {
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=pa', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $e) {
        die('Erreur PDO : ' . $e->getMessage());
    }
    $q = 'INSERT INTO cours (matiere, chapitre, cours, titre, description) VALUES (:matiere, NULL, NULL, :titre, :description)';
    $req = $bdd->prepare($q);

    $req->execute([
        ':matiere' => $_POST['titre-matière'],
        ':titre' => $_POST['titre-matière'],
        ':description' => $_POST['description-matière']
    ]);

    // Redirection après l'exécution de la requête
    header('location: modules.php?message=ajout réussi !&type=success');
    exit;
}

 /*else{header('location: ../../modules.php?message=erreur');
        exit;
}*/
//-------------------------------------------------AJOUT DE CHAPITRE-------------------------------------------------------------

if(isset($_POST['titre-chapitre']) && isset($_POST['description-chapitre']) && $_GET['message']== 2){
    $matiere = $_GET['matiere'];
    try {
        // Connexion à la base de données
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=pa','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // Requête SQL pour insérer un nouveau chapitre
        $q = 'INSERT INTO cours (matiere, chapitre, cours, titre, description) VALUES (:matiere, :chapitre, NULL, :titre, :description)';
        $req = $bdd->prepare($q);

        // Exécution de la requête avec les valeurs liées
        $req->execute([
            ':matiere'=> $matiere,
            ':chapitre'=> $_POST['titre-chapitre'],
            ':titre'=> $_POST['titre-chapitre'],
            ':description'=> $_POST['description-chapitre']
        ]);
        
        // Redirection après l'exécution de la requête
        header('location: chapitres.php?matiere='. htmlspecialchars($matiere) .'&message=2&type=success');
        exit;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        die('Erreur PDO : ' . $e->getMessage());
    }
}


/* else{header('location: ../../chapitres.php?matière='.$matière.'%3B&message=2');
        exit;
}*/
//-------------------------------------------------AJOUT DE COURS-------------------------------------------------------------
if(isset($_POST['titre-cours']) && isset($_POST['description-cours']) && $_GET['message'] == 3){
    $matiere = $_GET['matiere'];
    $chapitre = $_GET['chapitre'];
    try {
        // Connexion à la base de données
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=pa','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // Requête SQL pour insérer un nouveau cours
        $q = 'INSERT INTO cours (matiere, chapitre, cours, titre, description) VALUES (:matiere, :chapitre, :cours, :titre, :description)';
        $req = $bdd->prepare($q);

        // Exécution de la requête avec les valeurs liées
        $req->execute([
            ':matiere'=> $matiere,
            ':chapitre'=> $chapitre,
            ':cours'=> $_POST['titre-cours'],
            ':titre'=> $_POST['titre-cours'],
            ':description'=> $_POST['description-cours']
        ]);
        
        // Redirection après l'exécution de la requête
        header('location: cours.php?matiere='. htmlspecialchars($matiere) .'&chapitre='. htmlspecialchars($chapitre) .'&message=3&type=success');
        exit;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        die('Erreur PDO : ' . $e->getMessage());
    }
}

if(isset($_POST['titre-modif']) && isset($_POST['description-modif']) && $_GET['message']== 4){
    try {
        // Connexion à la base de données
        $bdd = new PDO('mysql:host=localhost;port=3306;dbname=pa','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        // Requête SQL pour mettre à jour un cours existant
        $q = 'UPDATE cours SET titre=:titre, description=:description WHERE id=:id';

        $req = $bdd->prepare($q);

        // Exécution de la requête avec les valeurs liées
        $req->execute([
            ':id' => $_GET['id'],
            ':titre'=> $_POST['titre-modif'],
            ':description'=> $_POST['description-modif']
        ]);
        
        // Redirection après l'exécution de la requête
        header('location: modules.php?matiere='. htmlspecialchars($matiere) .'&message=Modification avec succès !&type=success');
        exit;
    } catch (PDOException $e) {
        // Gestion des erreurs PDO
        die('Erreur PDO : ' . $e->getMessage());
    }
}


if(isset($_POST['email']) && !empty($_POST['email'])){
    setcookie('email', $_POST['email'], time() + 30 * 24 * 3600);
}



if(
    !isset($_POST['email'])
    || empty($_POST['email'])
    || !isset($_POST['password'])
    || empty($_POST['password'])
    ){
        //header('location: connexion.php?message=Vous devez remplir les deux champs !');
        exit;
    }
        
    
if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        //header('location: connexion.php?message=EMAIL INVALIDE !');
        exit;
    }

 
    try{
        //$bdd = new PDO('mysql:host=localhost:3306;dbname=site2','root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        // REMPLACER PAR NOTRE BASE DE DONEE ORACLE
    }
    catch(Exeption $e){
        die('Erreur PDO : ' . $e->getMessage());
    }
$q = 'SELECT id FROM users WHERE email = :email AND pwd = :pwd';

$req = $bdd->prepare($q);

$salt_end = '7583YDDiyeou9';
$salt_start = '63H&GD8yxdxi9';
$mdp_salt = $salt_start . $_POST['password'] . $salt_end;
$mdp_hash = hash('sha256', $mdp_salt);

//Execution
$req->execute([
    'email' => $_POST['email'],
    'password' => $mdp_hash
]);


$results = $req->fetchAll();


if(empty($results)){
    //header('location: connexion.php?message=Identifiants introuvables !');
    exit;
}

// INDEX.PHP ????? 
header('location:index.php?message=Connexion réussi ! BIENVENUE !');
    exit;


?>