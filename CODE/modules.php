<?php session_start(); 
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}?>
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

        <main>
            <section class="bannermodules"> </section>
            
            <?php 
                    $matiere = isset($_GET['matiere']) ? htmlspecialchars($_GET['matiere']) : '';
                    echo '
                    <div class="void"></div>
                    <div class="container">
                        <h1>Modules de cours</h1>';
                    if ($_SESSION['verif_f'] == '1' || $_SESSION['email'] == 'administrateur@guepstar.com') {
                        echo '
                        <br>
                        <button onclick="ajouterSection()">Ajouter une matière</button>
                        <script>
                            function ajouterSection() {
                                window.location.href = \'nouvelle_section.php?message=1\';
                            }
                        </script>
                        <div class="search-container">
                        <input type="text" id="searchInput" placeholder="Search...">
                        <button onclick="search()">Search</button>
                    </div>
                    <div id="searchResults">
                        <!-- Résultats de la recherche seront affichés ici -->
                    </div>
                
                    <script src="script.js"></script>
                        ';
                    }
                    echo '
                    <div role="alert">';
                    include('includes/message.php');
                    echo '
                    </div>
                    </div>';
                    
                try {
                    // Connexion à la base de données
                    include('includes/db.php');

                    // Requête SQL pour récupérer les matières distinctes
                    $sql = "SELECT nom,id, description FROM matieres";
                    $result = $bdd->query($sql);
                    
                    // Vérification si des résultats ont été retournés
                    if ($result->rowCount() > 0) {
                        // Affichage des matières dans des balises div séparées
                        $compteur=0;
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $compteur += 1;
                            echo '
                            <figure class="text-center modules">
                            <blockquote class="blockquote">
                            <br><p>' . htmlspecialchars($row["nom"]) . '</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                            <br>' . htmlspecialchars($row["description"]) . '<br>
                            </figcaption>
                            <figcaption class="blockquote-footer">
                            
                            <div class="btn-group" role="group" aria-label="Basic example">';
                                if ($_SESSION['verif_f'] == '1' || $_SESSION['email'] == 'administrateur@guepstar.com') {
                                    echo '<br><button type="button" class="btn btn-success" data-mdb-ripple-init onclick="modifierchapitre' . $compteur . '()">Modifier la matière</button>
                                    <script>
                                        function modifierchapitre' . $compteur . '() {
                                            window.location.href = \'nouveau_cours.php?id=' . htmlspecialchars($row["id"]) . '&message=1\';
                                        }
                                    </script>
                                    <button type="button" class="btn btn-danger" data-mdb-ripple-init onclick="supprimerchapitre' . $compteur . '()">Supprimer la matière</button>
                                    <script>
                                        function supprimerchapitre' . $compteur . '() {
                                            window.location.href = \'supp_cours.php?id=' . htmlspecialchars($row["id"]) . '&type=1\';
                                        }
                                    </script>';
                                }
                            echo '<button type="button" class="btn btn-primary" data-mdb-ripple-init onclick="ajouterchapitre' . $compteur . '()">Voir les chapitres</button>
                                  </div>
                                  <script>
                                      function ajouterchapitre' . $compteur . '() {
                                          window.location.href = "chapitres.php?id=' . htmlspecialchars($row["id"]) . '";
                                      }
                                  </script>
                                  </figcaption>
                                  </figure>';
                        }
                        
                    } else {
                        echo '
                        <figure class="text-center modules">
                            <blockquote class="blockquote">
                                <br><p>Aucune matière trouvée.</p>
                            </blockquote>';
                        if ($_SESSION['verif_f'] == '1' || $_SESSION['email'] == 'administrateur@guepstar.com') {
                            echo '
                            <br><figcaption class="blockquote-footer">
                                Vous pouvez en ajouter une dès maintenant !
                            </figcaption><br>';
                        }
                        echo '</figure>';
                    }
                    
                } catch (PDOException $e) {
                    // Gestion des erreurs PDO
                    die('Erreur PDO : ' . $e->getMessage());
                }
                ?>
            
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>      
  