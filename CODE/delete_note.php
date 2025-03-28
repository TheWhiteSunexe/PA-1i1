<?php
include('includes/db.php');
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header('Location: login.php'); // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    exit;
}

// Vérifier si l'ID de la note est défini
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Préparer la commande SQL pour supprimer la note
    $sql = "DELETE FROM blocnote WHERE id = :noteId AND id_user = :userId";
    $stmt = $bdd->prepare($sql);

    // Exécuter la requête
    $result = $stmt->execute([
        'noteId' => $_GET['id'],
        'userId' => $_SESSION['id']
    ]);

    if ($result) {
        header('Location: bloc_note.php?message=Note supprimée avec succès&type=success');
        exit;
    } else {
        header('Location: bloc_note.php?message=Une erreur est survenue, veuillez réessayer&type=danger');
        exit;
    }
} else {
    header('Location: bloc_note.php?message=ID de note invalide&type=danger');
    exit;
}
?>
