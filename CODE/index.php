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
            echo '<link rel="stylesheet" type="text/css" href="css/style_chatbot.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_nightmode.css">';
            echo '<link rel="stylesheet" type="text/css" href="bot/bot.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style_chatbot.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
            echo '<link rel="stylesheet" type="text/css" href="bot/bot.css">';
        }
        ?>
    </head>

    <body>
        
        <?php include('includes/header.php'); ?>

        <main>
        
            <section class="banneraccueil"> </section>
            <script src="bot/bot.js"></script>
            <?php include('includes/chatbot.php'); ?>
            <script src="main.js"></script>
            
                <div class="container">
                    <section id="cb">
                    <?php
                        if (isset($_COOKIE['langue']) && !empty($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                            // Récupère la langue à partir du cookie
                            $langue = $_COOKIE['langue'];

                            // Affiche le texte approprié en fonction de la langue
                            if ($_COOKIE['langue'] == 'en') {
                                echo '<h2>What do you want to learn?</h2>';
                            } elseif ($_COOKIE['langue'] == 'es') {
                                echo '<h2>Que quieres aprender?</h2>';
                            } elseif ($_COOKIE['langue'] == 'ch') {
                                echo '<h2>你想学些什么？</h2>';
                            }
                        } else {
                            echo '<h2>Que souhaitez-vous apprendre ?</h2>';
                        }
                    ?>
                    <?php
                    if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                        // Récupère la langue à partir du cookie
                        $langue = $_COOKIE['langue'];
 
                        if($langue == 'en'){
                            echo '<p>Choose from thousands of hours of videos as well as numerous resources at your disposal</p>';
                        }
                        if($langue == 'es'){
                            echo '<p>Elige entre miles de horas de vídeos así como numerosos recursos a tu disposición</p>';
                        }
                        if($langue == 'ch'){
                            echo '<p>从数千小时的视频以及可供您使用的大量资源中进行选择</p>';
                        }
                    }else{
                        echo '<p>Choississez parmis des milliers d\'heures de vidéos ainsi que de nombreuses ressources à votre disposition</p>';
                    }
                    ?>
                    </section>
                </div>
                <section class="section-container">
                    <section class="image-section"> 
                        <section class="banner2"></section> <!-- ajouter la photo du pc-->
                    </section>
                    <section class="text-section">
                        
                        <?php
                            if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                // Récupère la langue à partir du cookie
                                $langue = $_COOKIE['langue'];
 
                                if($langue == 'en'){
                                    echo '<h3>Enter a theme or topic that interests you below!</h3>';
                                }
                                if($langue == 'es'){
                                    echo '<h3>¡Ingresa un tema o tema que te interese a continuación!</h3>';
                                }
                                if($langue == 'ch'){
                                    echo '<h3>在下面输入您感兴趣的主题或话题！</h3>';
                                }
                            }else{
                                echo '<h3>Entrez ci-dessous un thème ou un sujet qui vous interresse !</h3>';
                            }
                        ?>
                        <?php
                            if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                // Récupère la langue à partir du cookie
                                $langue = $_COOKIE['langue'];
 
                                if($langue == 'en'){
                                    echo '<input id="searchbar" type="text" name="search" placeholder="What do you want to learn...">';
                                }
                                if($langue == 'es'){
                                    echo '<input id="searchbar" type="text" name="search" placeholder="Que quieres aprender...">';
                                }
                                if($langue == 'ch'){
                                    echo '<input id="searchbar" type="text" name="search" placeholder="你想学些什么...">';
                                }
                            }else{
                                echo '<input id="searchbar" type="text" name="search" placeholder="Que souhaitez-vous apprendre...">';
                            }
                        ?>
                        <?php
                            if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                // Récupère la langue à partir du cookie
                                $langue = $_COOKIE['langue'];
 
                                if($langue == 'en'){
                                    echo '<p>If the requested resource is currently unavailable, we will write to you to inform you when it will be available again.</p>';
                                }
                                if($langue == 'es'){
                                    echo '<p>Si el recurso solicitado no está disponible actualmente, le escribiremos para informarle cuándo volverá a estar disponible.</p>';
                                }
                                if($langue == 'ch'){
                                    echo '<p>如果请求的资源当前不可用，我们将写信给您，通知您何时可以再次使用。</p>';
                                }
                            }else{
                                echo '<p>Si jamais la ressource demandé est indisponible pour le moment, nous vous écrirons afin de vous informer de quand elle sera de nouveau disponible.</p>';
                            }
                        ?>
                        
                    </section>
                </section>

                <div class="container">
                    <section id="cb">
                    <?php
                            if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                // Récupère la langue à partir du cookie
                                $langue = $_COOKIE['langue'];
 
                                if($langue == 'en'){
                                    echo '<h2>We share unlimited knowledge with you, available anytime, anywhere!</h2>';
                                }
                                if($langue == 'es'){
                                    echo '<h2>Compartimos conocimiento ilimitado contigo, ¡disponible en cualquier momento y en cualquier lugar!</h2>';
                                }
                                if($langue == 'ch'){
                                    echo '<h2>我们与您分享无限知识，随时随地可用！</h2>';
                                }
                            }else{
                                echo '<h2>Nous vous partageons du savoir illimité, disponible à toute heure, n\'importe où !</h2>';
                            }
                    ?>
                    <?php
                            if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                // Récupère la langue à partir du cookie
                                $langue = $_COOKIE['langue'];
 
                                if($langue == 'en'){
                                    echo '<p>Enjoy all the videos available and
                                    all the resources that come with them. No more searching
                                    To the right or to the left !
                                    </p>';
                                }
                                if($langue == 'es'){
                                    echo '<p>Disfruta de todos los vídeos disponibles y
                                    todos los recursos que vienen con ellos. No más búsquedas
                                    ¡A la derecha o a la izquierda!
                                    </p>';
                                }
                                if($langue == 'ch'){
                                    echo '<p>欣赏所有可用的视频并
                                    他们附带的所有资源。 不再寻找
                                    向右还是向左！
                                    </p>';
                                }
                            }else{
                                echo '<p>Profitez de toutes les vidéos disponible et de 
                                    toutes les ressources qui les accompagnent. Plus besoin de chercher 
                                    à droite ou à gauche !
                                    </p>';
                            }
                    ?>
                    </section>
                </div>

                <section class="section-container">
                    <section class="image-section">
                    <?php
                            if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                // Récupère la langue à partir du cookie
                                $langue = $_COOKIE['langue'];
 
                                if($langue == 'en'){
                                    echo '
                                <ul>
                                    <li>
                                        <select name="quelle plateforme ?">
                                            <option value="haute">Which platform?</option>
                                            <option value="Moyenne">Average</option>
                                            <option value="faible">Low</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="Accessibilité">
                                            <option value="haute">Accessibility</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="Tarification">
                                            <option value="haute">Pricing</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                </ul>';
                                }
                                if($langue == 'es'){
                                    echo '
                                <ul>
                                    <li>
                                        <select name="quelle plateforme ?">
                                            <option value="haute">¿cual plataforma?</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="Accessibilité">
                                            <option value="haute">Accesibilidad</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="Tarification">
                                            <option value="haute">Precios</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                </ul>';
                                }
                                if($langue == 'ch'){
                                    echo '
                                <ul>
                                    <li>
                                        <select name="quelle plateforme ?">
                                            <option value="haute">哪个平台？</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="Accessibilité">
                                            <option value="haute">无障碍</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                    <li>
                                        <select name="Tarification">
                                            <option value="haute">价钱</option>
                                            <option value="Moyenne">Moyenne</option>
                                            <option value="faible">Faible</option>
                                        </select>
                                    </li>
                                </ul>';
                                }
                            }else{
                                echo '
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
                                </ul>';
                            }
                    ?>
                        
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

        <?php include('includes/footer.php'); ?>
    </body>

</html>