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
        <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.4/components/testimonials/testimonial-3/assets/css/testimonial-3.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <?php
        if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif') {
            echo '<link rel="stylesheet" type="text/css" href="css/style_review.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_nightmode.css">';
            
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style_review.css">';
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
                    include('includes/db.php');

                    // Requête SQL pour récupérer les informations du cours
                    $stmt = $bdd->prepare("SELECT titre, description, id FROM COURS WHERE matiere_id=:matiere_id AND chapitre_id=:chapitre_id");
                    $stmt->execute([
                        ':matiere_id' => isset($_GET['matiere_id']) ? $_GET['matiere_id'] : '',
                        ':chapitre_id' => isset($_GET['chapitre_id']) ? $_GET['chapitre_id'] : '',
                    ]);
                    $lesson = $stmt->fetch(PDO::FETCH_ASSOC);
                    if($lesson) {
                        // Affiche les informations du cours dans les champs de saisie
                        $titre = $lesson['titre'];
                        $description = $lesson['description'];
                        $id = $lesson['id'];

                        echo '<br>
                        <h1 style="position:center;">'.  htmlspecialchars($titre) .'</h1>
                        <p>'.htmlspecialchars($description).'</p>
                        
                        <div class="btn-group" role="group" aria-label="Basic example">';
                        
                        if ($_SESSION['verif_f'] == '2' || $_SESSION['email'] == 'admin@guepstar.com') {
                            echo '<button type="button" class="btn btn-success" data-mdb-ripple-init onclick="ajouterchapitre()">Modifier le cours</button>
                                <script>
                                    function modifierchapitre() {
                                        window.location.href = \'nouveau_cours.php?id=' . htmlspecialchars($lesson["id"]) . '&message=2\';
                                    }
                                </script>
                                <button type="button" class="btn btn-danger" data-mdb-ripple-init onclick="supprimerchapitre()">Supprimer le cours</button>
                                <button type="button" class="btn btn-primary" data-mdb-ripple-init onclick="evenement()">Mise en place d\'un évènement</button>
                                <script>
                                function evenement() {
                                    window.location.href = \'backreservation.php?id=' . htmlspecialchars($lesson["id"]) . '\';
                                }
                                </script>
                                <script>
                                function supprimerchapitre() {
                                    window.location.href = \'supp_cours.php?id=' . htmlspecialchars($lesson["id"]) . '&type=3\';
                                }
                                </script>';
                        }
                        
                        echo '
                        <button type="button" class="btn btn-primary" data-mdb-ripple-init onclick="reservation()">Réserver le cours en présentiel</button>
                        
                        </div>
                        <script>
                            function reservation() {
                                window.location.href = "reservation.php?id='.$id.'";
                            }
                        </script>
                        </figcaption>
                        </figure>';
                    
                    } else {
                        echo "Aucun cours trouvé.";
                    }
                } catch (PDOException $e) {
                    // Gestion des erreurs PDO
                    die('Erreur PDO : ' . $e->getMessage());
                }

                            
                ?>
            </script>
            <section class="bg-light py-5 py-xl-8">
                <div>
                    <div class="row justify-content-md-center">
                        <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                        <h2 class="fs-6 text-secondary mb-2 text-uppercase text-center">Avis sur le cours</h2>
                        <?php
                        $query = "SELECT AVG(note) AS moyenne FROM review WHERE id_cours = :cours_id";
                        $stmt = $bdd->prepare($query);
                        $stmt->execute(['cours_id' => $_GET['cours_id']]);
                        $avg = $stmt->fetch(PDO::FETCH_ASSOC);
                        if(empty($avg['moyenne'])){
                            $avg = 'Aucune note';
                        } else {
                            $avg = $avg['moyenne'];
                        }
                        ?>
                        <p class="text-center">Moyenne : <?php echo $avg; ?></p>


                            <hr>
                            <form action="review.php?id_cours=<?echo $_GET['cours_id']?>" method="post">
                                <div class="row-1">
                                    <div class="row row-2">
                                    
                                        <span id="card-inner">Note (sur 5) :</span>
                                    </div>
                                    <div class="row row-2">
                                        <select style="width: 75px" name="note" id="note">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row-1">
                                    <div class="row row-2">
                                        <span id="card-inner">Commentaire :</span>
                                    </div>
                                    <div class="row row-2">
                                        <input type="text" name="commentaire" placeholder="Commentaire">
                                    </div>
                                </div>
                                <button class="btn d-flex mx-auto" type="submit" type="submit">Envoyer</button>                              
                                
                            </div>
                            </form>

                        </div>
                    </div>
                </div>

                <?php
// Inclure le fichier de configuration de la base de données
include('includes/db.php');

// Vérifier si l'ID du cours est présent dans $_GET
if (isset($_GET['cours_id'])) {
    $cours_id = $_GET['cours_id'];

    // Préparer la commande SQL pour récupérer trois avis aléatoires
    $query = "SELECT date, avis, id_user, note FROM review WHERE id_cours = :cours_id ORDER BY RAND() LIMIT 3";
    $stmt = $bdd->prepare($query);
    $stmt->execute(['cours_id' => $cours_id]);

    // Récupérer les résultats
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Vérifier s'il y a des avis
    if (!empty($reviews)) {
        // Afficher les avis dans le HTML
        foreach ($reviews as $review) {
            $review_text = htmlspecialchars($review['avis']);
            $rating = (int)$review['note'];
            $ratingoff = 5 - $rating;
            $date = $review['date'];
            // Requête pour récupérer le nom de l'utilisateur à partir de son ID
            $query_user = "SELECT nom, prenom FROM users WHERE id = :id_user";
            $stmt_user = $bdd->prepare($query_user);
            $stmt_user->execute(['id_user' => $review['id_user']]);
            
            $user = $stmt_user->fetch(PDO::FETCH_ASSOC);

            $nom = htmlspecialchars($user['nom']);
            $prenom = htmlspecialchars($user['prenom']);

            echo '
            <div class="col-12 col-md-4">
                <div class="card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body p-4 p-xxl-5">
                        <figure>
                            <img class="img-fluid rounded rounded-circle mb-4 border border-5" loading="lazy" src="./assets/img/testimonial-img-1.jpg" alt="">
                            <figcaption>
                                <div class="bsb-ratings text-warning mb-3" data-bsb-star="' . $rating . '" data-bsb-star-off="' . $ratingoff . '"></div>
                                <blockquote class="bsb-blockquote-icon mb-4">' . $review_text . '</blockquote>
                                <h4 class="mb-2">' . $nom . ' ' . $prenom . '</h4>
                                <h5 class="fs-6 text-secondary mb-0">'.$date.'</h5>
                            </figcaption>
                        </figure>
                    </div>
                </div>
            </div>';
        }
    } else {
        echo 'Aucun avis pour le moment, soyez le premier à en écrire un !';
    }
} else {
    echo '<p class="text-center">ID du cours non spécifié.</p>';
}

?>




            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
 </html>   
