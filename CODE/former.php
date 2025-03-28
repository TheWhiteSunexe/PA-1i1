<?php session_start(); ?>


<!DOCTYPE HTML>

<html>

    <head>
        <title>Guepstar Formation</title>
        <meta charset="utf-8">
        <meta name="description" content="Site permettant de se former sur l'informatique">
        <?php
        if(isset($choix)&& $choix == 'actif') {
            echo '<link rel="stylesheet" type="text/css" href="css/style nightmode.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
        }
    ?>
    </head>

    <body>
        
    <?php include('includes/header.php'); ?>

        <main>
            <section class="banneraccueil"> </section>   
        </main>

        <?php include('includes/footer.php'); ?>
    </body>
</html>