<?session_start();
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
        echo '<link rel="stylesheet" type="text/css" href="css/style_topic.css">';
    } else {
        echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/style_topic.css">';
    }
    ?>
</head>

    <body>
        
        <?php include('includes/header.php'); ?>
        <main>

        <div class="payement">
                <div class="card mt-50 mb-50">
                    <div class="card-title mx-auto">
                        Ajouter un nouveau sujet
                    </div>
                    <div role="alert">
                                <?php include('includes/message.php'); ?>
                    </div>
                    <form action="verif_sujet.php" method="post">
                        <div class="row-1">
                            <div class="row row-2">
                                <span id="card-inner">Titre du sujet</span>
                            </div>
                            <div class="row row-2">
                                <input type="text" name="titre" placeholder="Titre">
                            </div>
                        </div>
                        <span >Sujet concernés :</span><br>
                        <ul>
                            <li><br>
                                <label>
                                    <input type="checkbox" name="categories[]" value="1">
                                    Annonces
                                    
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="2">
                                    Discussions Générales
                                    
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="3">
                                    Support Technique
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="4">
                                    Technologie
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="5">
                                    Programmation
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="6">
                                    Divertissement
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="7">
                                    Santé et Bien-être
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="8">
                                    Voyages
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="9">
                                    Cuisine
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="10">
                                    Événements
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="11">
                                    Art
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="12">
                                    Carrière et Emploi
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="categories[]" value="13">
                                    Cours
                                </label>
                            </li>
                        </ul>
                        <button class="btn d-flex mx-auto" type="submit"><b>Ajouter le sujet</b></button>
                    </form>
                </div>
            </div>
        </main>

        <?php include('includes/footer.php'); ?>
    </body>

</html>