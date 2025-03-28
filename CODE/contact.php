<?php session_start(); ?>


<!DOCTYPE HTML>

<html>

    <head>
        <title>Guepstar Formation</title>
        <meta charset="utf-8">
        <meta name="description" content="Site permettant de se former sur l'informatique">
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
            <section class="banneraccueil"> </section>

                <div class="container">
                    <section id="cb">
                    <h2>Contact</h2>
                    <p>Bienvenue sur la page contact !</p>
                    <p>Rencontrez les créateurs du site ainsi que leur mail pour les contacter.</p>
                    </section>
                </div>
            
            <section class="section-container">

                <section class="image-section">
                    <section class="phototristan"></section>
                </section>
                
                <section class="text-section">
                    <h2>Tristan Gillet</h2>
                    <p></p>
                    <p>"Mylène Farmer supremacy"</p>
                    <a href="../pages/album/cendres de lune.html">-> plus d'informations</a>
                </section>
        </section>

        <div class="container">
            <section id="cb">
            </section>
        </div>

        <section class="section-container">
            <section class="image-section">
                <section class="photoshems"></section>
            </section>
            <section class="text-section">
                <h2>Ahmed </h2>
                <p>Conception du serveur web ainsi que la connexion sur le site</p>
                <p>Après une formation en informatique.....</p>
                <a href="../pages/album/cendres de lune.html">-> plus d'informations</a>
            </section>
        </section>

        <div class="container">
            <section id="cb">
            </section>
        </div>

        <section class="section-container">
            <section class="image-section">
                <section class="photoalexandre"></section>
            </section>
            <section class="text-section">
                <h2>Alexandre Bourdinar</h2>
                <p>Conception de la base de donnée du site</p>
                <p>Après une formation en informatique.....</p>
                <a href="../pages/album/cendres de lune.html">-> plus d'informations</a>
            </section>
        </section>
            
        <div class="container2">
                    <section id="cb">
                    <p>Vous souhaitez recevoir de manière quotidienne les nouveaux cours disponible ? N'hésitez pas, abonnez-vous à notre Newsletter !</p>
                    <p><a href="mailto:NewsletterPAM@gmail.com" target="_blank">NEWSLETTER</a>
                    </p>
                    <p>Besoin d'un renseignement ?
                        
                    </p>
                    <p><a href="mailto:GILLET.Tristan.94@gmail.com" target="_blank">CONTACTER</a></p>
                    </section>
                </div>
        </main>

        <footer>
            <section class="bannerfooter">
                <span><small> 2023 GuepStar Formation - The White Sun - Tous droits réservés.</small> </span>
            </section>

        </footer>
    </body>

</html>