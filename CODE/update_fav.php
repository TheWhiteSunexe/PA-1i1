<?php
include('includes/db.php');
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}

// Vérifier si l'ID de la note et le statut de favori sont définis
if (isset($_GET['id']) && isset($_GET['fav'])) {
    if($_GET['fav'] == 1){
        $fav = 0;
    }else{
        $fav = 1;
    }
    // Préparer la commande SQL pour mettre à jour le favori
    $sql = "UPDATE blocnote SET fav =:fav WHERE id = :noteId AND id_user = :id_user";
    $stmt = $bdd->prepare($sql);

    // Exécuter la requête
    $result = $stmt->execute([
        'fav' => $fav,
        'noteId' => $_GET['id'],
        'id_user' => $_SESSION['id']
    ]);

    if ($result) {
        header('Location: bloc_note.php?message=Ajouté aux favoris !&type=success');
        exit;
    } else {
        header('Location: bloc_note.php?message=Une erreur est survenue bdd, veuillez réessayer&type=danger');
        exit;
    }
} else {
    header('Location: bloc_note.php?message=Une erreur est survenue, veuillez réessayer&type=danger');
    exit;
}
?>
