<?php session_start(); ?>


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
                    <h2>Notre Equipe :</h2>
                    <p>Choississez parmis des milliers d'heures de vidéos ainsi que de nombreuses ressources à votre disposition</p>
                    </section>
                </div>
                <section class="section-container">
                    <section class="image-section"> 
                        <section class="banner2"></section> <!-- ajouter la photo du pc-->
                    </section>
                    <section class="text-section">
                        <h3>Entrez ci-dessous un thème ou un sujet qui vous interresse !</h3>
                        <input id="searchbar" type="text" name="search" placeholder="Que souhaitez-vous apprendre...">
                        <p>Si jamais la ressource demandé est indisponible pour le moment, nous vous écrirons afin de vous informer de quand elle sera de nouveau disponible.</p>
                    </section>
                </section>

                <div class="container">
                    <section id="cb">
                    <h2>Nous vous partageons du savoir illimité, disponible à toute heure, n'importe où !</h2>
                    <p>Profitez de toutes les vidéos disponible et de 
                        toutes les ressources qui les accompagnent. Plus besoin de chercher 
                        à droite ou à gauche !
                    </p>
                    </section>
                </div>

                <section class="section-container">
                    <section class="image-section">
                        <ul>
                            <li>
                                <select name="quelle plateforme ?">
                                    <option value="haute">Quelle plateforme ?</option>
                                    <option value="Moyenne">Moyenne</option>
                                    <option value="faible">Faible</option>
                                </select>
                            </li>
                            <li>
                                <select name="Accessibilité">
                                    <option value="haute">Accessibilité</option>
                                    <option value="Moyenne">Moyenne</option>
                                    <option value="faible">Faible</option>
                                </select>
                            </li>
                            <li>
                                <select name="Tarification">
                                    <option value="haute">Tarification</option>
                                    <option value="Moyenne">Moyenne</option>
                                    <option value="faible">Faible</option>
                                </select>
                            </li>
                        </ul>
                    </section>
                    <section class="text-section">
                        <p>vidéo à ajouter ?</p>
                    </section>
                </section>
                <div class="container">
                    <section id="cb">
                    <p></p>
                    </section>
                </div>

                <section class="section-container">

                    <section class="text-section-cours">
                        <h2>Pourquoi s'inscrire à nos cours ?</h2>
                    </section>

                    <section class="text-section">
                        <h3>Cours à votre rythme</h3>
                        <p>Profitez de la flexibilité totale pour étudier selon votre emploi du temps. Nos cours sont conçus pour s'adapter à votre rythme d'apprentissage, vous permettant ainsi de progresser à votre propre cadence.</p>
                    </section>

                </section>
                <section class="section-container">

                    <section class="text-section">
                        <h3>Inscription simple en ligne</h3>
                        <p>Notre processus d'inscription en ligne est rapide, facile et intuitif. Plus besoin de longues démarches administratives, vous pouvez vous inscrire en quelques clics et commencer votre formation rapidement.</p>
                    </section>

                    <section class="text-section">
                        <h3>Tuteurs professionnels</h3>
                        <p>Bénéficiez de l'expertise de nos tuteurs professionnels. Ils sont là pour vous guider, répondre à vos questions et vous soutenir tout au long de votre parcours académique ou professionnel.</p>
                    </section>
                    
                </section>
                <div class="container">
                    <section id="cb">
                    <h2>Nos Programmes</h2>
                    <p>ajouter les programmes -> pages -> vidéos</p>
                    </section>
                </div>
                <section class="section-container">
                    <section class="text-section">
                        <h2>Dernières vidéos mises en ligne</h2>
                        <p>ajout de vidéos formats posts</p>
                    </section>
                    <section class="image-section">
                    <section class="banner3"></section>
                    </section>
                </section>
                <section></section>
                <section class="section-container-EDCTA">
                
                    <section class="text-section">
                        <h3></h3>
                    </section>

                    <section class="text-section">
                        <input  id="submit" type="submit" value="Commencer">
                    </section>
                </section>
                
                <section class="section-container">

                    <section class="image-section"> 
                        <section class="bannerweek"></section>
                    </section>

                    <section class="text-section">
                        <h3>Jours de la semaine :</h3>
                        <p>Du lundi au vendredi pour les cours en présentiel et chaque jour sur le site pour les cours en distanciel</p>
                        <h3>Crénaux horaires :</h3>
                        <p>Pours les cours en présentiel entre 10h-13h et 14h-18h</p>
                        <p><small style="color:red" style="font-style: italic;">*pouvant varier en fonction du lieu d'apprentissage</small></p>
                <!-- <select name="paramètres">
                            <option value="mode nuit"><input id="checkbox" type="checkbox">mode nuit</input></option>
                        </select>-->
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