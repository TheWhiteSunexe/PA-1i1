<?php

require_once('includes/db.php');

if(isset($_GET['search']) && !empty($_GET['search'])) {

    $s = $_GET['search'];

    $stmt = $bdd->prepare('SELECT id, verif_u, verif_f, UPPER(email) AS email,nom,prenom FROM users WHERE nom LIKE ? OR email LIKE ?');
    $success = $stmt->execute([
        "%$s%", "%$s%"
    ]);
    
    if($success) {
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo '<table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                    <th>Téléchargement</th>
                </tr>
            </thead>
            <tbody>';
        foreach ($users as $user) {
            user($user);
        }
        echo '</tbody>
        </table>';
    } else {
        // Gérer l'erreur si la requête échoue
    }
} else {
    // Envoyer un code de réponse HTTP 400 si la requête de recherche est vide
    http_response_code(400);
}


function user($user) {
    

    echo '<tr>';
    echo '<td>' . $user['id'] . '</td>';
    echo '<td>' . $user['nom'] . '</td>';
    echo '<td>' . $user['prenom'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>
            <a class="btn btn-primary btn-sm" href="edit.php?id=' . $user['id'] . '">Modifier</a>
            <a class="btn btn-danger btn-sm" href="delete.php?id=' . $user['id'] . '">Supprimer</a>
        </td>';

    if ($user['verif_u'] == 1) {
        echo '<td>
                <a class="btn btn-success btn-sm" href="telercharger_cv.php?id=' . $user['id'] . '" target="_blank">Voir CV</a>                        
            </td>';
    } else {
        echo '<td></td>';
    }

    echo '</tr>';

}

/*
echo '<tr>';
    echo '<td>' . $user['id'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>
        <a class="btn btn-primary btn-sm" href="edit.php?id=' . $user['id'] . '">Modifier</a>
        <a class="btn btn-danger btn-sm" href="delete.php?id=' . $user['id'] . '">Supprimer</a>
        </td>';

    if ($user['verif_f'] == 0) {
        echo '<td>
        <a class="btn btn-success btn-sm" href="telercharger.php?id=' . $user['id'] . '">Voir CV</a>                        
        </td>';
    } else {
        echo '<td></td>';
    }
    echo '</tr>';*/
?>
