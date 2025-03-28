<?php
session_start(); 
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

include('includes/db.php');

if (!isset($_POST['cvv']) || empty($_POST['cvv']) || !isset($_POST['numero']) || empty($_POST['numero']) || !isset($_POST['nom']) || empty($_POST['nom']) || !isset($_POST['prenom']) || empty($_POST['prenom']) || !isset($_POST['exp_date']) || empty($_POST['exp_date'])) {
    header('location: card_check.php?message=Il manque un élément, veuillez réessayer&type=danger');
    exit;
} else {
    if (strlen($_POST['numero']) == 16) {
        if (strlen($_POST['cvv']) == 3) {
            $q = 'INSERT INTO card(numero, exp_date, cvv, id_user, nom, prenom, numero_5, montant) VALUES(:numero, :exp_date, :cvv, :id_user, :nom, :prenom, :numero_5, :montant )';
            $req = $bdd->prepare($q);
            $numero = substr($_POST['numero'], -4);
            if (!empty($numero)) {
                // Salage des données
                $salt = 'salé';
                $numero_salt = $_POST['numero'] . $salt;
                $cvv_salt = $_POST['cvv'] . $salt;

                // Hachage des données
                $numero_hash = hash('sha256', $numero_salt);
                $cvv_hash = hash('sha256', $cvv_salt);
                $montant = rand(1000, 1000000) / 100;
                // Execution de la requête
                $result = $req->execute([
                    'id_user' => $_SESSION['id'],
                    'numero' => $numero_hash,
                    'exp_date' => $_POST['exp_date'], // On ne hache pas la date d'expiration
                    'cvv' => $cvv_hash,
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'numero_5' => $numero,
                    'montant' => $montant
                ]);
            } else {
                header('location: card_check.php?message=Il y a un problème, veuillez réessayer&type=warning');
                exit;
            }
        } else {
            header('location: card_check.php?message=Votre numéro de CVV est incorrect, veuillez réessayer (il doit être constitué de 3 chiffres)&type=warning');
            exit;
        }
    } else {
        header('location: card_check.php?message=Votre numéro de carte est incorrect, veuillez réessayer  (il doit être constitué de 16 chiffres)&type=warning');
        exit;
    }

    if (!$result) {
        header('location: card_check.php?message=Il y a une erreur, veuillez réessayer&type=danger');
        exit;
    }
    setcookie('numero',$_POST['numero'],time()+60*60*24*30);
    setcookie('exp_date',$_POST['exp_date'],time()+60*60*24*30);
    setcookie('cvv',$_POST['cvv'],time()+60*60*24*30);
    // Si on arrive ici, c'est que les modifications sont prises en compte
        $renvoi = $_GET['renvoi'];
        if($renvoi == 1){ 
            header('location: payement.php');
            exit;
        }else{
            header('location: card_check.php?message=Ajout de la carte avec succès !&type=success');
            exit;
        }


}
?>
