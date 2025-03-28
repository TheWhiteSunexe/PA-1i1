<?php
include('includes/db.php');
$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 1) {
    // Vérifier d'abord s'il y a des cours associés à cette matière
    $check_q = 'SELECT COUNT(*) AS total FROM COURS WHERE chapitre_id=:id';
    $check_req = $bdd->prepare($check_q);
    $check_req->execute(['id' => $id]);
    $result = $check_req->fetch(PDO::FETCH_ASSOC);

    if ($result['total'] > 0) {
        // S'il y a des cours associés, rediriger avec un message d'erreur ou effectuer une autre action appropriée
        header('Location: modules.php?id='.$id.'&message=Il existe des cours associés à cette matière. Supprimez d\'abord les cours.&type=danger');
        exit;
    }
    // S'il n'y a pas de cours associés, supprimer le chapitre
    $q = 'DELETE FROM MATIERES WHERE id=:id';
} elseif ($type == 2) {
    // Vérifier d'abord s'il y a des cours associés à ce chapitre permet d'ajouter une sécurité
    $check_q = 'SELECT COUNT(*) AS total FROM COURS WHERE chapitre_id=:id';
    $check_req = $bdd->prepare($check_q);
    $check_req->execute(['id' => $id]);
    $result = $check_req->fetch(PDO::FETCH_ASSOC);

    if ($result['total'] > 0) {
        // S'il y a des cours associés, rediriger avec un message d'erreur
        header('Location: chapitres.php?id='.$_GET['id_matieres'].'message=Il existe des cours associés à ce chapitre. Supprimez d\'abord les cours.&type=danger');
        exit;
    }

    // S'il n'y a pas de cours associés, supprimer le chapitre
    $q = 'DELETE FROM CHAPITRES WHERE id=:id';
} elseif ($type == 3) {
    $q = 'DELETE FROM COURS WHERE id=:id';
   
} else {
    header('Location: modules.php?message=Il y a eu un problème de type.&type=danger');
    exit;
}

// Préparation de la requête
$req = $bdd->prepare($q);

// Exécution de la requête
$result = $req->execute(['id' => $id]);


// Vérification du résultat de la requête
if(!$result) {
    header('Location: modules.php?message=Il y a eu un problème veuillez rééssayer.&type=danger');
    exit;
}
if($type == 2) {
    header('Location: cours.php?matiere_id='.htmlspecialchars($_GET["matiere_id"]).'&chapitre_id='.htmlspecialchars($_GET["chapitre_id"]).'&message=Suppression avec succès&type=success');
    exit;
}elseif($type == 1) {
    header('Location: chapitres.php?matiere_id='.htmlspecialchars($_GET["matiere_id"]).'&message=Suppression avec succès&type=success');
    exit;
}else{
    header('Location: modules.php?message=Suppression avec succès !&type=success');
    exit;
}

// Redirection avec un message de succès

?>
