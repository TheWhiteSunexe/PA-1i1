<?php
session_start(); 

include('includes/db.php'); 

// Le bloc if suivant vérifie si un ID est passé dans l'URL en tant que paramètre GET.
if(isset($_GET['id'])) {
    $id = intval($_GET['id']); // L'ID est nettoyé pour s'assurer qu'il s'agit d'un entier, pour des raisons de sécurité.

    $q = 'SELECT cv FROM users WHERE id = :id';
    $req = $bdd->prepare($q); 
    $req->execute([
        'id' => $id
    ]);
    $user = $req->fetch();

    // $cv contient le nom du fichier du CV qui est enregistré dans la base de données.
    $cv = $user['cv'];

    // Vérification si le CV existe et si le fichier existe réellement dans le dossier 'uploads'.
    if($cv && file_exists('uploads/' . $cv)) {

        // Les en-têtes HTTP sont définis pour indiquer au navigateur qu'un fichier est en cours de transfert.
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream'); // Le type de contenu est défini en tant que flux d'octets, indiquant un téléchargement de fichier.
        header('Content-Disposition: attachment; filename="'.basename($cv).'"'); // On spécifie que le fichier doit être téléchargé avec le nom original.
        header('Expires: 0'); // On indique que le fichier ne doit pas être mis en cache.
        header('Cache-Control: must-revalidate'); // Directives de cache pour forcer la validation.
        header('Pragma: public'); // Header pour la compatibilité avec les anciens navigateurs HTTP/1.0.
        header('Content-Length: ' . filesize('uploads/' . $cv)); // La taille du fichier est envoyée dans l'en-tête pour que le navigateur sache combien de données attendre.
        flush(); // Vide les tampons de sortie du système pour éviter tout problème lors du téléchargement.
        readfile('uploads/' . $cv); // Envoie le fichier au client.
        exit;
    }
}

// Si le fichier n'existe pas ou si aucun ID n'est fourni, une erreur 404 est renvoyée et un message est affiché.
header("HTTP/1.0 404 Not Found");
echo "Fichier non trouvé.";
exit;
?>
