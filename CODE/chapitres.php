<?php session_start(); ?>
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
                try {
                    // Connexion à la base de données
                    include('includes/db.php');
                    // Récupération du paramètre matiere

                    $matiere = isset($_GET['matiere']) ? htmlspecialchars($_GET['matiere']) : '';
                    echo "
                    <div class=\"void\"></div>
                    <div class=\"container\">
                        <h1>$matiere</h1>";
                    if(isset($_GET['matiere'])) {
                        echo "
                        <button onclick=\"ajouterSection()\">Ajouter un chapitre</button>
                        <script>
                            function ajouterSection() {
                                var matiere = '" . $matiere . "';
                                window.location.href = 'nouvelle_section.php?matiere=' + encodeURIComponent(matiere) + '&message=2';
                            }
                        </script>";
                    }
                    echo "</div>";
                    echo '
                    <div role="alert">';
                    include('includes/message.php');
                    echo '
                    </div>
                    </div>';

                    // Requête SQL pour récupérer les chapitres pour une matière spécifique
                    $q = "SELECT nom, description, id FROM chapitres WHERE matiere_id =:id";
                    $req = $bdd->prepare($q);
                    $req->bindParam(':id', $_GET['id']);
                    $req->execute();

                    // Vérification si des résultats ont été retournés
                    if ($req->rowCount() > 0) {
                        $compteur=0;
                        // Affichage des chapitres dans des balises div séparées
                        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                            $compteur +=1;
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
                            
                            if ($_SESSION['verif_f'] == '2' || $_SESSION['email'] == 'administrateur@guepstar.com') {
                                echo '<button type="button" class="btn btn-success" data-mdb-ripple-init onclick="ajouterchapitre' . $compteur . '()">Modifier le chapitre</button>
                                    <script>
                                        function modifierchapitre' . $compteur . '() {
                                            window.location.href = "nouveau_cours.php?id=' . htmlspecialchars($row["id"]) . '&type=2";
                                        }
                                    </script>
                                    <button type="button" class="btn btn-danger" data-mdb-ripple-init onclick="supprimerchapitre' . $compteur . '()">Supprimer le chapitre</button>
                                    <script>
                                        function supprimerchapitre' . $compteur . '() {
                                            window.location.href = \'supp_cours.php?id=' . htmlspecialchars($row["id"]) . '&id_matieres=' . htmlspecialchars($_GET["id"]) . '&type=2\';
                                        }
                                    </script>';

                            }
                            
                            echo '
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init onclick="voirCours'.$compteur.'()">Voir les cours</button>
                            </div>
                            <script>
                                function voirCours'.$compteur.'() {
                                    window.location.href = "cours.php?matiere_id=' . htmlspecialchars($_GET["id"]) . '&chapitre_id=' . htmlspecialchars($row["id"]) . '";
                                }
                            </script>
                            </figcaption>
                            </figure>';
                        }
                    } else {
                        echo '
                        <figure class="text-center modules">
                            <blockquote class="blockquote">
                                <br><p>Aucun cours trouvée.</p>
                            </blockquote>';
                        if ($_SESSION['verif_f'] == '2' || $_SESSION['email'] == 'administrateur@guepstar.com') {
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


            </script>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
 </html>       