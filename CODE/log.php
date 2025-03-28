<?php
session_start();
if (!isset($_SESSION['email']) || $_SESSION['email'] != 'administrateur@guepstar.com') {
    header('location: index.php');
    exit;
}
?>
<!DOCTYPE HTML>

<html>

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
        
    <?php include('includes/header.php'); ?>
    <?php
    // connexion à la DB
    include('includes/db.php');
    $q = 'SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log';
    $req = $bdd->query($q); // Execution directe de la requete SELECT
    $logco = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <main>
        <?php   
        include('includes/db.php');
        
            $q = '';

            if(isset($_POST['trier'])) {
                if($_POST['trier'] != 1){

                    if($_POST['trier'] == 2){
                        $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log ORDER BY id DESC";
                    }
                    elseif($_POST['trier'] == 3){
                        $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log ORDER BY date ASC";
                    }
                    elseif($_POST['trier'] == 4){
                        $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log ORDER BY date DESC";
                    }
                    elseif($_POST['trier'] == 5){
                        $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log ORDER BY utilisateur ASC";
                    }
                    elseif($_POST['trier'] == 6){
                        $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log ORDER BY utilisateur DESC";
                    }
                    elseif($_POST['trier'] == 7){
                        $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log WHERE niveau='réussi'";
                    }
                    elseif($_POST['trier'] == 8){
                        $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log WHERE niveau='échoué'";
                    }
                } else {
                    // Par défaut, trier par nom croissant
                    $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log ORDER BY id ASC";
                }
            } else {
                // Par défaut, trier par nom croissant
                $q = "SELECT id, date, UPPER(utilisateur) AS email, niveau, message FROM log ORDER BY id ASC";
            }

            // Exécution de la requête SQL
            $sql = $bdd->query($q);

            // Récupération des résultats de la requête
            $logco = $sql->fetchAll(PDO::FETCH_ASSOC);
            ?>
        <div class="void"></div>
        <div class="container">
            <h1>Log de Connexion</h1>
            <div>
                <input type="text" id="search_input" oninput="search()" placeholder="search">
            </div>
            <script src="main.js"></script>
            <form action="log.php" method="post">
            <select name="trier">
                <option value="1" selected>id (croissant)</option>
                <option value="2">id (décroissant)</option>
                <option value="3">date (croissant)</option>
                <option value="4">date (décroissant)</option>
                <option value="5">utilisateur (croissant)</option>
                <option value="6">utilisateur (décroissant)</option>
                <option value="7">réussi</option>
                <option value="8">échoué</option>
            </select>
            <button type="submit">Changer</button>
            </form>
            <div id="result"></div>

            <table class="table table-striped mt-4">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Message</th>
                    <th>Utilisateur</th>
                </tr>
                
                <?php
                foreach ($logco as $log) {
                    echo '<tr>';
                    echo '<td>' . $log['id'] . '</td>';
                    echo '<td>' . $log['date'] . '</td>';
                    echo '<td>' . $log['niveau'] . '</td>';
                    echo '<td>' . $log['message'] . '</td>';
                    echo '<td>' . $log['email'] . '</td>';
                    echo '</tr>';
                }
                ?>

            </table>
        </div>
    </main>

    <?php include('includes/footer.php'); ?>
    </body>
</html>