<?php
session_start(); 
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

include('includes/db.php');

if(!isset($_POST['contenu']) || empty($_POST['contenu'])) {
    header('location: message.php?id='.$_GET['id'].'&message=Il manque un élément, veuillez réessayer&type=danger');
    exit;
} else {
    $q = 'INSERT INTO forum_commentaires(message_id, contenu, date_creation, utilisateur_id) VALUES(:id, :contenu, NOW(), :utilisateur_id)';
    $req = $bdd->prepare($q);

    $result = $req->execute([
        'id' => $_GET['id'],
        'utilisateur_id' => $_SESSION['id'],
        'contenu' => $_POST['contenu']
    ]);

    if (!$result) {
        header('location: message.php?id='.$_GET['id'].'&message=Il y a une erreur, veuillez réessayer&type=danger');
        exit;
    }

    header('location: message.php?id='.$_GET['id'].'&message=Ajout du sujet avec succès !&type=success');
    exit;
}
?>
