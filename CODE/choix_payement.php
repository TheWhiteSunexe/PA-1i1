<?php session_start(); 
include('includes/db.php');

$q = 'SELECT numero, exp_date, cvv FROM card WHERE id_user = :id';
$req = $bdd->prepare($q);
$req->execute([':id' => $_SESSION['id']]);
$existe = $req->fetchAll(PDO::FETCH_ASSOC);
if (empty($existe)) {
    header('location: card_check.php?renvoi=1');
    exit;
}

include('includes/db.php');

$credit_query = "SELECT credit FROM users WHERE id = :user_id";
$stmt = $bdd->prepare($credit_query);
$stmt->execute(['user_id' => $_SESSION['id']]);
$user_credit = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user_credit['credit'] > 0) {
    $update_query = "UPDATE users SET credit = credit - 1 WHERE id = :user_id";
    $stmt = $bdd->prepare($update_query);
    $stmt->execute(['user_id' => $_SESSION['id']]);

    $insert_query = "INSERT INTO reserve (id_user, id_evenement) VALUES (:user_id, :event_id)";
    $stmt = $bdd->prepare($insert_query);
    $stmt->execute(['user_id' => $_SESSION['id'], 'event_id' => $_GET['id']]);

    header('location: reservation.php?message=réservation effectuée&type=success');
    exit;
}

?>


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
            echo '<link rel="stylesheet" type="text/css" href="css/style_choix.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_choix.css">';
        }
        ?>
    </head>

    <body>
        
        <?php include('includes/header.php'); ?>

        <main>
        <section id="pricing" class="pricing-content section-padding">
            <div class="container">					
                <div class="section-title text-center"><br><br>
                    <h1>Tarification des cours</h1><br>
                    <p>Prenez le temps de sélectionner le nombre de crédits correspondant à vos besoins, vous permettant ainsi d'accéder à des cours en présentiel dispensés par l'un de nos professeurs qualifiés. Nous sommes là pour vous accompagner dans votre parcours d'apprentissage.</p><br>
                    
                </div>
                
                </div>	
			
                    <div class="row text-center">									
                        <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                            <div class="single-pricing">
                                <div class="price-head">								
                                    <h2 <?if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif'){ echo' style="color:black;"';} ?>>Débutant</h2>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <h1 class="price" <?if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif'){ echo' style="color:black;"';} ?> >$10</h1>
                                <h5 <?if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif'){ echo' style="color:black;"';} ?> >1 crédits</h5><br>
                                <a href="payement.php?choix=1">Get start</a>
                            </div>
                        </div><!--- END COL -->	
                        <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                            <div class="single-pricing">
                                <div class="price-head">								
                                    <h2 <?if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif'){ echo' style="color:black;"';} ?>>Populaire</h2>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <h1 class="price" <?if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif'){ echo' style="color:black;"';} ?>>$45</h1>
                                <h5 <?if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif'){ echo' style="color:black;"';} ?> >5 crédits</h5><br>
                                <a href="payement.php?choix=2">Get start</a>
                            </div>
                        </div><!--- END COL -->	
                        <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                            <div class="single-pricing single-pricing-white">
                                <div class="price-head">								
                                    <h2 >Advance</h2>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                                <span class="price-label">Best</span>
                                <h1 class="price">$90</h1>
                                <h5>10 crédits</h5><br>
                                <a href="payement.php?choix=3">Get start</a>
                            </div>
                        </div><!--- END COL -->			  
                    </div><!--- END ROW -->
                </div><!--- END CONTAINER --><br><br>
            </section>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
 </html>