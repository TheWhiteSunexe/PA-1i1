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
                            <li><a href="../Anglais/accueil.html">home</a></li>
                            <li><a href="../Anglais/equipe.html">Our team</a></li>
                            <li><a href="../Anglais/modules.html">Learning Modules</a></li>
                            <li><a href="../Anglais/contact.html">Contact</a></li>
                            <li><a href="../Anglais/paramètres.php">Settings</a></li>
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
                    <h2>Settings :</h2>
                    <p>Define your settings choices</p>
                    </section>
                </div>
                <section class="section-container">
                    <h1>Choose your language :</h1>
                        <form action="../../connexion/verification.php" method="post">
                            <select name="langue">
                                <option value="fr">French</option>
                                <option value="en">English</option>
                                <option value="es">Spanish</option>
                                <option value="ch">Chinese</option>
                            </select>
                            <button type="submit">Change</button>
                        </form>
                </section>
                <form action="../Pages/css/style.css" method="post">
                    <button type="submit" name="night mode">Enable/Disable night mode</button>
                </form>
        </main>

        <footer>
            <section class="bannerfooter">
                <span><small> 2023 GuepStar Formation - The White Sun - All rights reserved.</small> </span>
            </section>

        </footer>
    </body>

</html>