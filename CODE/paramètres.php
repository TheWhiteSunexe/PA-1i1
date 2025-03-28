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
                <div class="container">
                    <section id="cb">
                    <h2>Paramètres :</h2>
                    <p>Definissez vos choix en matière de paramètres</p>
                    </section>
                </div>
                <section class="section-container">
                    <h1>Choisissez votre langue :</h1>
                    <form action="verification.php" method="post">
                        <select name="langue">
                            <option value="fr">Français</option>
                            <option value="en">English</option>
                            <option value="es">Español</option>
                            <option value="ch">Chinois</option>
                        </select>
                        <button type="submit">Changer</button>
                    </form>
                </section>
                <?php
                if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif') {
                    echo '<form action="verification.php" method="post">
                    <button value="inactif" type="submit" name="nm">Désactiver le mode nuit</button>
                    </form>';
                } else {
                    echo '<form action="verification.php" method="post">
                    <button value="actif" type="submit" name="nm">Activer le mode nuit</button>
                    </form>';
                }
                ?>
                
        </main>

        <footer>
            <section class="bannerfooter">
                <span><small> 2023 GuepStar Formation - The White Sun - Tous droits réservés.</small> </span>
            </section>

        </footer>
    </body>

</html>