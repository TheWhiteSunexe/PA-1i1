<?php
session_start(); 
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

include('includes/db.php');
$q = 'DELETE FROM card WHERE id=:id';

// Préparation de la requête
$req = $bdd->prepare($q);

// Exécution de la requête
$result = $req->execute([
    'id' => $_GET['id']
]);

// Vérification du résultat de la requête
if(!$result) {
    header('Location: card_check.php?message=Il y a eu un problème veuillez réessayer...&type=danger');
    exit;
}

// Redirection avec un message de succès
header('Location: card_check.php?message=Suppression avec succès !&type=success');
exit;
?>
