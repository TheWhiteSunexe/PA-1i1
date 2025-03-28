<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>CV FORMATEUR</title>
</head>
<body>
    <?php include('includes/header.php'); ?>

    <main class="main-cv-formateur">
        <div class="container">
            <h1>Télercharger votre CV</h1>
            <!-- Formulaire d'inscription' -->

            <?php
        if (isset($_GET['message']) && !empty($_GET['message'])) {
            echo '<p>' . htmlspecialchars($_GET['message']) . '</p>'; // protection contre XSS
        }
        ?>

            <form action="verif_formateur.php" method="post" enctype="multipart/form-data">

                <div class="mb-4">
                    <label for="inputFile" class="form-label">CV EN LIGNE</label>
                    <input id="inputFile" class="form-control" type="file" name="image" accept="image/jpeg, image/gif, image/png">
                </div>

                <button type="submit" class="btn btn-primary">Envoyer mon CV</button>
            </form>
        </div>
    </main>

    <?php include('includes/footer.php'); ?>
</body>
</html>