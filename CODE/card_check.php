<?php session_start(); 
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
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"crossorigin="anonymous"></script>
        <?php
        if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif') {
            echo '<link rel="stylesheet" type="text/css" href="css/style_nightmode.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_payement.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_payement.css">';
        }
        ?>
    </head>

    <?php
if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif') {
        echo '<body style="background-color :#353535;">';
    } else {
        echo '<body>';
    }?>
        
        <?php include('includes/header.php'); ?>

        <main>

            <div class="payement">
                <div class="card mt-50 mb-50">
                    <div class="card-title mx-auto">
                        Paramètres bancaires
                    </div>
                    <div class="nav">
                        <ul class="mx-auto">
                            <li><a href="profil.php">Compte</a></li>
                            <li class="active"><a href="#">Payement</a></li>
                        </ul>
                    </div>
                    <div role="alert">
                                <?php include('includes/message.php'); ?>
                    </div>
                    <?php 
                    if(isset($_GET['renvoi'])) {
                    $renvoi = $_GET['renvoi'];
                        if($renvoi == 1){ 
                            echo' <form action="verif_payement.php?renvoi=1" method="post">';
                        }
                    }else{echo' <form action="verif_payement.php" method="post">';}
                    ?>
                    <?php
                        include('includes/db.php');

                        $q = 'SELECT numero, exp_date, cvv, id, numero_5 FROM card WHERE id_user = :id';
                        $req = $bdd->prepare($q);
                        $req->execute([':id' => $_SESSION['id']]);
                        $result = $req->fetchAll(PDO::FETCH_ASSOC);

                        // Vérification si des résultats ont été retournés
                        if (!empty($result)) {
                            echo '<span id="card-header">Cartes enregistrées</span>';
                            $compteur = 0;
                            foreach ($result as $row) {
                                $compteur++;
                                echo '
                                <div class="row row-1">
                                    <div class="col-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>
                                    <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                    </svg>
                                    </div>
                                    <div class="col-7">
                                    <span>&emsp;&emsp;**** **** **** ' . substr($row["numero_5"], -4) . '&emsp;&emsp;&emsp;</span>
                                        <span> </span>
                                        <span>' . $row["exp_date"] . '</span>
                                    </div>
                                    <div class="col-3 d-flex justify-content-center">
                                        <a href="delete_card.php?id=' . htmlspecialchars($row["id"]) . '">Supprimer la carte</a>
                                    </div>
                                </div>
                                ';
                            }
                        }
                        ?>
                            
                        <!--
                        <div class="row row-1">
                            <div class="col-2"><img  class="img-fluid" src="https://img.icons8.com/color/48/000000/visa.png"/></div>
                            <div class="col-7">
                                <input type="text" placeholder="**** **** **** 4296">
                            </div>
                            <div class="col-3 d-flex justify-content-center">
                                <a href="#">Supprimer la carte</a>
                            </div>
                        </div>-->

                        <span id="card-header">Ajouter une nouvelle carte:</span>
                        <div class="row-1">
                            <div class="row row-2">
                                <span id="card-inner">Nom présent sur la carte</span>
                            </div>
                            <div class="row row-2">
                                <input type="text" name="nom" placeholder="Nom">
                            </div>
                        </div>
                        <div class="row-1">
                            <div class="row row-2">
                                <span id="card-inner">Prénom présent sur la carte</span>
                            </div>
                            <div class="row row-2">
                                <input type="text" name="prenom" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="row three">
                            <div class="col-7">
                                <div class="row-1">
                                    <div class="row row-2">
                                        <span id="card-inner">numéro carte</span>
                                    </div>
                                    <div class="row row-2">
                                        <input type="text" name="numero" placeholder="5134-5264-4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <input type="month" name="exp_date" placeholder="Exp. date" min="2024-04">
                            </div>
                            <div class="col-2">
                                <input type="text" name="cvv" placeholder="CVV">
                            </div>
                        </div>
                        <button class="btn d-flex mx-auto" type="submit"><b>Ajouter la carte</b></button>
                    </form>
                </div>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
 </html>