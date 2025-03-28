<?php session_start(); ?>
<!DOCTYPE HTML>

<html>

    <head>
        <title>Guepstar Formation</title>
        <meta charset="utf-8">
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
            
            <div class="section-container-ajout-cours">
            <?php if(isset($_GET['message']) && $_GET['message'] == 1) { 
                echo '
                <div class="form-container">
                    <section class="section-container-log">
                        <section class="text-section-log">
                            <div class="form-left">
                                <div class="connexioncours">
                                    <h2 class="title-co">Ajouter votre Matière :</h2>
                                    <form action="verification.php?message=1" method="post">
                                        <input type="text" name="titre-matière" placeholder="Titre de la matière" required>
                                        <input type="text" name="description-matière" placeholder="Description de la matière" required>
                                        <input type="submit" value="Envoyer">
                                    </form>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
                ';
            }/*
                <form action="verification.php?message=1" method="post">
                    <section class="image-section">
                        <div class="title">                    
                            <input type="text" name="titre-matière" placeholder="Titre de la matière" required>
                        </div>
                        <div class="description">
                            <input type="text" name="description-matière" placeholder="Description de la matière" required>
                        </div>
                        <div>
                            <input type="submit" class="submit-button" value="Envoyer">
                        </div>
                    </section>
                </form>*/


            if(isset($_GET['message']) && $_GET['message'] == 2 && isset($_GET['matiere'])) { 
                $matiere = isset($_GET['matiere']) ? $_GET['matiere'] : '';
                echo '
                <form action="verification.php?matiere=' . htmlspecialchars($matiere) . '&message=2" method="post">
                    <section class="image-section">
                        <div class="title">                    
                            <input type="text" name="titre-chapitre" placeholder="Titre du chapitre" required>
                        </div>
                        <div class="description">
                            <input type="text" name="description-chapitre" placeholder="Description du chapitre" required>
                        </div>
                        <div>
                            <input type="submit" class="submit-button" value="Envoyer">
                        </div>
                    </section>
                </form>';
            }
            


            if(isset($_GET['message']) && $_GET['message'] == 3) { 
                $matiere = isset($_GET['matiere']) ? $_GET['matiere'] : '';
                $chapitre = isset($_GET['chapitre']) ? $_GET['chapitre'] : '';
                echo '
                <form action="verification.php?matiere=' . htmlspecialchars($matiere) . '&chapitre=' . htmlspecialchars($chapitre) . '&message=3" method="post">
                    <section class="image-section">
                        <div class="title">                    
                            <input type="text" name="titre-cours" placeholder="Titre du cours" required>
                        </div>
                        <div class="description">
                            <input type="text" name="description-cours" placeholder="Veuillez entrer votre cours" required>
                        </div>
                        <div class="vidéo">     
                            <label for="vidéo">Choisissez un cours à poster :</label>               
                            <input type="file" name="video" placeholder="choisissez votre vidéo :">
                        </div>
                        <div>
                            <input type="submit" class="submit-button" value="Envoyer">
                        </div>
                    </section>
                </form>';
            }
            
                ?>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>

</html>