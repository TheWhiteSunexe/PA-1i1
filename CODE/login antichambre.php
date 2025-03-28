<!DOCTYPE HTML>

<html>

    <head>
        <title>Guepstar Formation</title>
        <meta charset="utf-8">
        <meta name="description" content="Site permettant de se former sur l'informatique">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        
        <?php include('includes/header.php'); ?>

        <main class="main-log">
            
            <section class="banner-coapp"> </section>
            <div class="title-log">
            <h1 >Connexion</h1>
            </div>
        <?php
        if (isset($_GET['message']) && !empty($_GET['message'])) {
            echo '<p>' . htmlspecialchars($_GET['message']) . '</p>'; // protection contre XSS
        }
        ?>
        <div class="form-container">
            <section class="section-container-log">
                <section class="text-section-log">
                    <div class="form-left">
                        <div class="connexionlog">
                            <h2 class="title-co">Je possède un compte</h2>

                            <!-- Formulaire de co / method post / email / mot_de_passe / envoyé à verification.php -->
                            <form action="verif_connexion.php" method="post">
                                <input type="email" name="email" placeholder="E-mail" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : ''; ?>">
                                <input type="password" name="password" placeholder="Mot de passe">
                                <input type="submit" value="Connexion">
                            </form>
                        </div>
                    </div>
                </section>

                <section class="image-section-log">
                    <div class="form-right">
                        <div class="inscription">
                            <h2 class="title-inscr">Je crée un compte</h2>
                                <!-- Formulaire d'inscription -->
                                <form action="verification_inscription.php" method="post" enctype="multipart/form-data">
                                <input type="text" name="nom" placeholder="Votre nom" required>
                                <input type="text" name="prenom" placeholder="Votre Prénom" required>
                                <input type="email" name="email" placeholder="Votre mail" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : ""; ?>" required>
                                <input type="password" name="password" placeholder="Votre mot de passe" required>
                                <input type="password" name="verif_password" placeholder="Confirmer votre mot de passe" required>
                                                                <div class="lab-form-title">
                                    <h3>Souhaitez-vous devenir formateur ?</h3>
                                </div>
                                <div class="lab-form">
                                    <label  for="">oui</label>
                                    <input type="radio" name="verif_f" placeholder="OUI" value="1">
                                    <label for="">non</label>
                                    <input type="radio" name="verif_f" placeholder="NON" value="0">
                                </div>
                                <section class="section-container-pp">
                                    <section class="text-section-pp">
                                    <h3>Image de profil :</h3>
                                    </section>

                                    <section class="image-section-pp">
                                        <input type="file" name="image" accept="image/jpeg, image/gif, image/png">
                                     </section>
                                </section>

                                <input type="submit" value="Inscription">
                            </form>
                        </div>
                    </div>
                </section>
            </section>
        </div>
            <!-- 
            <section id="cb2">
                <h2>Connexion :</h2>
                <p>Choisissez votre type de connexion</p>
            </section>

            <section class="section-container">

                <section class="text-section-accueil-2 antichambre-log"> 
                    <button onclick="window.location.href = 'inscription.php';">Inscription</button>
                </section>

                <section class="text-section-accueil-2 antichambre-log">
                    <button onclick="window.location.href = 'connexion.php';">Connexion</button>
                </section>

            </section>-->
        </main>

        <footer>
            <section class="bannerfooter">
                <span><small> 2023 GuepStar Formation - The White Sun - Tous droits réservés.</small> </span>
            </section>

        </footer>
    </body>

</html>