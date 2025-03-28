<!DOCTYPE HTML>

<html>

    <head>
        <title>Guepstar Formation</title>
        <meta charset="utf-8">
        <meta name="description" content="Site permettant de se former sur l'informatique">
        <?php
        if(isset($choix)&& $choix == 'censéetrenuit') {
            echo '<link rel="stylesheet" type="text/css" href="../..css/style nightmode.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="../../css/style.css">';
        }
        ?>
    </head>

    <body>
        
        <header>
            <section class="section-container-accueil">
                <section class="text-section-accueil"> <!--retirer le -1 car sinon ça bug ? étrangement...-->
                <h1>GuepStar Formation</h1>
                </section>
                <section class="text-section-accueil-2">
                    <nav class="nav1">
                        <ul>
                            <li><a href="../Français/accueil.html">Accueil</a></li>
                            <li><a href="../Français/equipe.html">Notre équipe</a></li>
                            <li><a href="../Français/modules.html">Modules d'apprentissage</a></li>
                            <li><a href="../Français/contact.html">Contact</a></li>
                            <li><a href="../Français/paramètres.php">Paramètres</a></li>
                        </ul>
                    </nav>
                </section>
                <section class="text-section-accueil-3">
                    <nav class="nav2">
                        <ul>
                            <li><a href="../../../Pages/connexion/login antichambre.html">Login</a></li>
                        </ul>
                    </nav>
                </section>
            </section> 
        </header>

        <main>
            <section class="banneraccueil"> </section>

                <div class="container">
                    <section id="cb">
                    <h2>Paramètres :</h2>
                    <p>Definissez vos choix en matière de paramètres</p>
                    </section>
                </div>
                <section class="section-container">
                    <h1>Choisissez votre langue :</h1>
                        <form action="../../connexion/verification.php" method="post">
                            <select name="langue">
                                <option value="fr">Français</option>
                                <option value="en">English</option>
                                <option value="es">Español</option>
                                <option value="ch">Chinois</option>
                            </select>
                            <button type="submit">Changer</button>
                        </form>
                </section>
                <form action="../Pages/css/style.css" method="post">
                    <button value="On" type="submit" name="night mode">Activer/Désactiver le mode nuit</button>
                </form>
        </main>

        <footer>
            <section class="bannerfooter">
                <span><small> 2023 GuepStar Formation - The White Sun - Tous droits réservés.</small> </span>
            </section>

        </footer>
    </body>

</html>