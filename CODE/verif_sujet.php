<?php
session_start(); 
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}
// Vérifier si le titre est défini et non vide
if (!isset($_POST['titre']) || empty($_POST['titre'])) {
    header('location: backreservation.php?message=Il manque un élément, veuillez réessayer&type=danger');
    exit;
} else {
    // Inclure le fichier de configuration de la base de données
    include('includes/db.php');

    // Préparer la requête SQL pour insérer le sujet
    $q = 'INSERT INTO forum_messages(titre, date_creation, utilisateur_id) VALUES(:titre, NOW(), :utilisateur_id)';
    $req = $bdd->prepare($q);

    // Exécuter la requête d'insertion du sujet
    $result = $req->execute([
        'titre' => $_POST['titre'],
        'utilisateur_id' => $_SESSION['id']
    ]);

    // Vérifier si l'insertion du sujet s'est bien déroulée
    if ($result) {
        // Récupérer l'ID du sujet inséré
        $sujet_id = $bdd->lastInsertId();

        // Vérifier si des hashtags ont été sélectionnés
        if (isset($_POST['categories']) && is_array($_POST['categories'])) {
            // Préparer la requête d'insertion des hashtags dans la table de liaison
            $sql = "INSERT INTO concerne(id_message, id_hashtag) VALUES(:sujet_id, :hashtag_id)";
            $stmt = $bdd->prepare($sql);

            // Boucler sur chaque hashtag sélectionné
            foreach ($_POST['categories'] as $hashtag_id) {
                // Exécuter la requête d'insertion pour chaque hashtag
                $stmt->execute(['sujet_id' => $sujet_id, 'hashtag_id' => $hashtag_id]);
            }
        }

        // Redirection en cas de succès
        header('location: forum.php?message=Sujet ajouté avec succès&type=success');
        exit;
    } else {
        // Redirection en cas d'échec de l'insertion du sujet
        header('location: forum.php?message=Il y a une erreur, veuillez réessayer&type=danger');
        exit;
    }
}
?>
