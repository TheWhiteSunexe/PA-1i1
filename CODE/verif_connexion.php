<?php
//Voir pour les alertes :


//ceci n'est pas une page web, il sert a vérifier le formulaire et effectuer des redirections
//si un parametre email a été envoyé via la méthode post et qu'il n'est pas vide> créer un cookie 'email' qui expire dans 30 jours

if (isset($_POST['email']) && !empty($_POST['email'])){
    setcookie('email',$_POST['email'],time()+60*60*24*30);
}

//si email ou mdp n existe pas ou sont vides > redirection vers connexion.php avec un message d'erreur
if (!isset($_POST['email']) || !isset($_POST['password']) || empty($_POST['email']) || empty($_POST['password'])){
    writeLogLine(false,$_POST['email']);
    header('location:login antichambre.php?message=Vous devez remplir les 2 champs!');
    exit;//interromps le code
}

//si l email n est pas valide >redirection avec une erreur

if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    writeLogLine(false,$_POST['email']);
    header('location:login antichambre.php?message=L\'email est invalide, veuillez réessayer');
    exit;//interromps le code
}

//si le compte est utilisateur n existe pas en base de donee>redirect

//connexion a la base de données
include('includes/db.php');


//ecrire la requete (SELECT) a trous
$q= 'SELECT email,id,password,verif_u,verif_f FROM users WHERE email=:email AND password=:password ';

    //prep la requete
    $req= $bdd->prepare($q);

    //salage de mdp
    $salt = 'salé';
    $mdp_salt=$_POST['password'].$salt;

    //hachage de mdp
    $mdp_hash = hash('sha256',$mdp_salt);

    //exec la requete
    $req->execute([
        'email'=> $_POST['email'],
        'password'=> $mdp_hash
    ]);

//recup les results

$recup=$req->fetch();

//si $results est vide >redirection
if(empty($recup)){
    header('location:login antichambre.php?message=Mot de passe incorrect, veuillez réessayer...');
    exit;//interromps le code
}

//si on arrive ici tout est ok

session_start();
//mettre un parametre email avec la valeur de l'email reçu
$_SESSION['email']=$_POST['email'];
$_SESSION['id'] = $recup['id'];
$_SESSION['verif_u'] = $recup['verif_u'];
$_SESSION['verif_f'] = $recup['verif_f'];
//rediriger vers la page d'acceuil
header('location:index.php');
exit;



