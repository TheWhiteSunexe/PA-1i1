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
        <?php
            // Connexion à la base de données
            include('includes/db.php');

            // Récupérer les informations de l'utilisateur depuis la base de données
            $stmt = $bdd->prepare("SELECT titre, description FROM cours WHERE id=:id");
            $stmt->execute([':id' => $_GET['id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Vérifie si les informations de l'utilisateur ont été trouvées
            if($user) {
                // Affiche les informations de l'utilisateur dans les champs de saisie
                $titre = $user['titre'];
                $description = $user['description'];
            }        
            $result = $req->fetch(PDO::FETCH_ASSOC);
            ?>
        <div class="section-container-ajout-cours">
             
                <div class="form-container">
                    <section class="section-container-log">
                        <section class="text-section-log">
                            <div class="form-left">
                                <div class="connexioncours">
                                    <h2 class="title-co">Ajouter votre Matière :</h2>
                                    <form action="verification.php?message=4&id=<?php echo htmlspecialchars($_GET['id']); ?>" method="post">
                                        <input type="text" name="titre-modif" placeholder="Titre de la matière" value="<?php echo $titre; ?>" required>
                                        <input type="text" name="description-modif" placeholder="Description de la matière" value="<?php echo $description; ?>" required>
                                        <input type="submit" value="Envoyer">
                                    </form>
                                </div>
                            </div>
                        </section>
                    </section>
                </div>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>

</html>