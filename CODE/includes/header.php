<header>
            <section class="section-container-accueil">
                <section class="text-section-accueil"> <!--retirer le -1 car sinon ça bug ? étrangement...-->
                <h1 class="titre-header">GuepStar Formation</h1>
                </section>
                <section class="text-section-accueil-2">
                    <nav class="nav1">
                        <ul>
                        <?php
                            if(isset($_SESSION['id'])){
                            include('includes/db.php');
                            $q = 'SELECT image FROM users WHERE id = :id';
                            $req = $bdd->prepare($q);
                            $req->execute([
                                'id' => $_SESSION['id']
                            ]);

                            $result = $req->fetch(PDO::FETCH_ASSOC);}

                            if(isset($_SESSION['email'])){
                                if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                    // Récupère la langue à partir du cookie
                                    $langue = $_COOKIE['langue'];
    
                                    if($langue == 'en'){
                                        echo '
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="modules.php">Learning Modules</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                            <li><a href="reservation.php">Evènement</a></li>
                                            <li><a href="forum.php">Forum</a></li>
                                        ';/*}*/
                                    }
                                    if($langue == 'es'){
                                        echo '
                                            <li><a href="index.php">bienvenida</a></li>
                                            <li><a href="modules.php">Módulos de aprendizaje</a></li>
                                            <li><a href="contact.php">Contactar</a></li>
                                            <li><a href="reservation.php">Evènement</a></li>
                                            <li><a href="forum.php">Forum</a></li>
                                        ';
                                    }
                                    if($langue == 'ch'){
                                        echo '
                                            <li><a href="index.php">欢迎</a></li>
                                            <li><a href="modules.php">学习模块</a></li>
                                            <li><a href="contact.php">接触</a></li>
                                            <li><a href="reservation.php">Evènement</a></li>
                                            <li><a href="forum.php">Forum</a></li>
                                        ';
                                    }
                                }else{
                                    echo '
                                        <li><a href="index.php">Accueil</a></li>
                                        <li><a href="modules.php">Modules d\'apprentissage</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="reservation.php">Evènement</a></li>
                                        <li><a href="forum.php">Forum</a></li>
                                    ';
                                    
                                }
                            }
                            else{
                                if (isset($_COOKIE['langue']) && $_COOKIE['langue']!='fr') {
                                    // Récupère la langue à partir du cookie
                                    $langue = $_COOKIE['langue'];
    
                                    if($langue == 'en'){
                                        echo '
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                        ';/*}*/
                                    }
                                    if($langue == 'es'){
                                        echo '
                                            <li><a href="index.php">bienvenida</a></li>
                                            <li><a href="contact.php">Contactar</a></li>
                                        ';
                                    }
                                    if($langue == 'ch'){
                                        echo '
                                            <li><a href="index.php">欢迎</a></li>
                                            <li><a href="contact.php">接触</a></li>
                                        ';
                                    }
                                }else{
                                    
                                    echo '
                                        <li><a href="index.php">Accueil</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                    ';
                                    
                                }

                            }
                        
                            
                            ?>
                        </ul>
                    </nav>
                </section>
                <section class="text-section-accueil-3">
                    <nav class="nav2">
                        <ul>
                            <li>
                                <?php
                                if(isset($_SESSION['email'])){
                                    echo '
                                        <img src="uploads/' . (isset($result['image']) ? $result['image'] : 'default.jpg') . '" alt="" class="user-pic user-pic-background" onclick="toggleMenu()">';

                                    if ($_SESSION['email'] == 'administrateur@guepstar.com') {
                                    echo '<div class="sub-menu-wrap" id="subMenu">
                                        <div class="sub-menu">
                                            <div class="user-info">
                                                <img src="uploads/' . (isset($result['image']) ? $result['image'] : 'default.jpg') . '" class="user-pic-background" alt="">
                                                <h2>Settings</h2>
                                            </div>
                                            <hr>
                                            <a href="profil.php" class="sub-menu-link"><img src="images/profile.png" alt="">
                                                <p>Edit Profile</p>
                                                <span>></span>
                                            </a>
                                            <a href="bloc_note.php" class="sub-menu-link"><img src="images/sticky.svg" alt="">
                                                <p>Bloc note</p>
                                                <span>></span>
                                            </a>
                                            <a href="agenda.php" class="sub-menu-link"><img src="images/geo-alt.svg" alt="">
                                                <p>Agenda</p>
                                                <span>></span>
                                            </a>
                                            <a href="surprise/index.php" class="sub-menu-link"><img src="images/x-circle.svg" alt="">
                                                <p>Administration</p>
                                                <span>></span>
                                            </a>
                                            <a href="backreservation.php" class="sub-menu-link"><img src="images/geo-alt.svg" alt="">
                                                <p>Réservation</p>
                                                <span>></span>
                                            </a>
                                            <a href="deconnexion.php" class="sub-menu-link"><img src="images/logout.png" alt="">
                                                <p>Log-out</p>
                                                <span>></span>
                                            </a>
                                        </div>';
                                    }
                                    echo '<div class="sub-menu-wrap" id="subMenu">
                                        <div class="sub-menu">
                                            <div class="user-info">
                                                <img src="uploads/' . (isset($result['image']) ? $result['image'] : 'default.jpg') . '" class="user-pic-background" alt="">
                                                <h2>Settings</h2>
                                            </div>
                                            <hr>
                                            <a href="profil.php" class="sub-menu-link"><img src="images/profile.png" alt="">
                                                <p>Edit Profile</p>
                                                <span>></span>
                                            </a>
<a href="agenda.php" class="sub-menu-link"><img src="images/geo-alt.svg" alt="">
                                                <p>Agenda</p>
                                                <span>></span>
                                            </a>

                                            <a href="bloc_note.php" class="sub-menu-link"><img src="images/geo-alt.svg" alt="">
                                                <p>Bloc note</p>
                                                <span>></span>
                                            </a>';
                                            if ($_SESSION['verif_f'] == 1) {
                                                echo '<a href="cv_formateur.php" class="sub-menu-link"><img src="images/profile.png" alt="">
                                                <p>CV FORMATEUR</p>
                                                <span>></span>
                                            </a>';
                                            }
                                            if ($_SESSION['verif_f'] == 1) {
                                                echo '<a href="réservation.php" class="sub-menu-link"><img src="images/profile.png" alt="">
                                                <p>R�servation</p>
                                                <span>></span>
                                            </a>';
                                            }
                                            echo '<a href="deconnexion.php" class="sub-menu-link"><img src="images/logout.png" alt="">
                                                <p>Log-out</p>
                                                <span>></span>
                                            </a>
                                        </div>';
                                }else{
                                    echo '
                                    <img src="uploads/' . (isset($result['image']) ? $result['image'] : 'default.jpg') . '" alt="" class="user-pic user-pic-background" onclick="toggleMenu()">
                                    <div class="sub-menu-wrap" id="subMenu">
                                        <div class="sub-menu">
                                            <div class="user-info">
                                                <img src="uploads/' . (isset($result['image']) ? $result['image'] : 'default.jpg') . '" class="user-pic-background" alt="">
                                                <h2>Settings</h2>
                                            </div>
                                            <hr>
                                            <a href="login antichambre.php" class="sub-menu-link"><img src="images/profile.png" alt="">
                                                <p>Log-in</p>
                                                <span>></span>
                                                
                                            </a>
                                        </div>';
                                }
                                ?>
                            </li>
                        </ul>
                    </nav>
                </section>
            </section>  

            <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }

    </script>

        </header>