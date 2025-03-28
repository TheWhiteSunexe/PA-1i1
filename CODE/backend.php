<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] != 'administrateur@guepstar.com') {
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
        <title>Guepstar Formation</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device, initial-scale">
        <meta name="description" content="Site permettant de se former sur l'informatique">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <?php
        if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif') {
            echo '<link rel="stylesheet" type="text/css" href="css/style_nightmode.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
        }
        ?>
    </head>

<body>
     <main>   

        <?php
            include('includes/header.php');
            include('includes/db.php');

            $q = '';

            if(isset($_POST['trier'])) {
                if($_POST['trier'] != 1){

                    if($_POST['trier'] == 2){
                        $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users ORDER BY nom DESC";
                    }
                    elseif($_POST['trier'] == 3){
                        $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users ORDER BY id ASC";
                    }
                    elseif($_POST['trier'] == 4){
                        $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users ORDER BY id DESC";
                    }
                    elseif($_POST['trier'] == 5){
                        $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users ORDER BY email ASC";
                    }
                    elseif($_POST['trier'] == 6){
                        $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users ORDER BY email DESC";
                    }
                    elseif($_POST['trier'] == 7){
                        $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users WHERE verif_u='1'";
                    }
                    elseif($_POST['trier'] == 8){
                        $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users WHERE verif_u='0'";
                    }
                } else {
                    // Par défaut, trier par nom croissant
                    $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users ORDER BY nom ASC";
                }
            } else {
                // Par défaut, trier par nom croissant
                $q = "SELECT id, verif_f, UPPER(email) AS email, UPPER(prenom) AS prenom, UPPER(nom) AS nom FROM users ORDER BY nom ASC";
            }

            // Exécution de la requête SQL
            $sql = $bdd->query($q);

            // Récupération des résultats de la requête
            $users = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="void"></div>
        <div class="containeruti">
            <h1>Modifier les Utilisateurs</h1>
        
            <div class="input-group mb-3">
                <input type="text" id="search_input" class="form-control" oninput="search()" placeholder="search">
                <button class="input-group-text" id="basic-addon2" type="submit">chercher</button>
            </div>
            <script src="main.js"></script>
            <form action="backend.php" method="post">
            <select name="trier">
                <option value="1" selected>nom (croissant)</option>
                <option value="2">nom (décroissant)</option>
                <option value="3">id (croissant)</option>
                <option value="4">id (décroissant)</option>
                <option value="5">email (croissant)</option>
                <option value="6">email (décroissant)</option>
                <option value="7">formateur uniquement</option>
                <option value="8">utilisateur uniquement</option>
            </select>
            <button type="submit">Changer</button>
            </form>

            <form action="download-backend.php" method="post">
                <button class="btn btn-primary profile-button" type="submit">Télécharger les utilisateurs</button>
            </form>

            <?php
        if (isset($_GET['message']) && !empty($_GET['message'])) {
            echo '<p>' . htmlspecialchars($_GET['message']) . '</p>'; // protection contre XSS
        }
        ?>
           
            <div id="result">
            <table class="table table-striped mt-4">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Actions</th>
                        <th>Téléchargement</th>
                    </tr>
                    
                    <?php
                    foreach ($users as $user) {
                        echo '<tr>';
                        echo '<td>' . $user['id'] . '</td>';
                        echo '<td>' . $user['nom'] . '</td>';
                        echo '<td>' . $user['prenom'] . '</td>';
                        echo '<td>' . $user['email'] . '</td>';
                        echo '<td>
                            <a class="btn btn-primary btn-sm" href="edit.php?id=' . $user['id'] . '">Modifier</a>
                            <a class="btn btn-danger btn-sm" href="delete.php?id=' . $user['id'] . '">Supprimer</a>
                            
                            </td>';

                        if ($user['verif_f'] == 1) {
                            echo '<td>
                            <a class="btn btn-success btn-sm" href="telercharger_cv.php?id=' . $user['id'] . '" target="_blank">Voir CV</a>                        
                            </td>';
                        }else{
                            echo '<td>
                                                    
                            </td>';
                        }
                        
                
                        
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <?php include('includes/footer.php'); ?>
</body>

</html>