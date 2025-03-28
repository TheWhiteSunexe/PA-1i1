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
            echo '<link rel="stylesheet" type="text/css" href="css/style_reservation.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_reservation.css">';
        }
        ?>
    </head>

    <body>
        
      <?php include('includes/header.php'); ?>

      <main>

<div class="payement">
        <div class="card mt-50 mb-50">
            <div class="card-title mx-auto">
                Nouvelle newsletter
            </div>
            <div role="alert">
                        <?php include('includes/message.php'); ?>
            </div>
            <form action="verif_newsletter.php" method="post">
                <div class="row-1">
                    <div class="row row-2">
                        <span id="card-inner">Auteur</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" name="auteur" placeholder="Auteur">
                    </div>
                </div>
                <div class="row-1">
                    <div class="row row-2">
                        <span id="card-inner">Titre de la newsletter</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" name="titre" placeholder="Titre">
                    </div>
                </div>
                <div class="row-1">
                    <div class="row row-2">
                        <span id="card-inner">Contenu de la newsletter</span>
                    </div>
                    <div class="row row-2">
                        <input type="text" name="contenu" placeholder="Contenu">
                    </div>
                </div>

                <button class="btn d-flex mx-auto" type="submit"><b>Envoyer la newsletter</b></button>
            </form>
        </div>
    </div>
</main>

        <?php include('includes/footer.php'); ?>
    </body>

</html>