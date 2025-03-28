<?php
// Inclure le fichier de connexion à la base de données
include('includes/db.php');

// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}

// Récupérer les valeurs du formulaire
$titre = htmlspecialchars(trim($_POST['titre']));
$description = htmlspecialchars(trim($_POST['description']));

// Vérifier que les champs ne sont pas vides
if (empty($titre) || empty($description)) {
    header('Location: bloc_note.php?message=Les champs titre et description ne peuvent pas être vides.&type=warning');
    exit;
}

// Vérifier la longueur minimale des champs
if (strlen($titre) < 10 || strlen($description) < 10) {
    header('Location: bloc_note.php?message=Le titre doit contenir au moins 10 caractères et la description au moins 10 caractères.&type=warning');
    exit;
}

// Préparer la requête SQL pour insérer les données
$query = "INSERT INTO blocnote(titre, description, date, id_user) VALUES (:titre, :description, NOW(), :id_user)";

// Préparer et exécuter la déclaration
$req = $bdd->prepare($query);
$result = $req->execute([
    'description' => $description,
    'titre' => $titre,
    'id_user' => $_SESSION['id']
]);

// Vérifier si l'insertion a réussi
if ($result) {
    header('Location: bloc_note.php?message=La note a été ajoutée avec succès.&type=success');
} else {
    header('Location: bloc_note.php?message=Une erreur est survenue lors de l\'ajout de la note.&type=danger');
}
exit;
?>
