<?php
session_start(); 
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}
include('includes/db.php');

if (!isset($_POST['cvv']) || empty($_POST['cvv']) || !isset($_POST['numero']) || empty($_POST['numero']) || !isset($_POST['nom']) || empty($_POST['nom']) || !isset($_POST['exp_date']) || empty($_POST['exp_date'])) {
    header('location: payement.php?message=Il manque un élément, veuillez réessayer&type=danger');
    exit;
} else {
    if (strlen($_POST['numero']) == 16) {
        if (strlen($_POST['cvv']) == 3) {

            $q = 'SELECT montant FROM card WHERE id = :id';
            $req = $bdd->prepare($q);
            $req->execute([':id' => $_GET['id']]);
            $existe = $req->fetch(PDO::FETCH_ASSOC);

            if($existe && $existe['montant'] >= $_GET['montant']){
                // RETRAIT ARGENT
                $q = 'UPDATE card SET montant=montant-:montant WHERE id=:id';
                $req = $bdd->prepare($q);
                $result = $req->execute([
                    'montant' => $_GET['montant'],
                    'id' => $_GET['id']
                ]);

                // AJOUT TRANSACTION
                $q = 'INSERT INTO transaction(id_user, id_card, date, montant, type) VALUES(:id_user, :id_card, NOW(), :montant, "+")';
                $req = $bdd->prepare($q);
                $result = $req->execute([
                    'id_user' => $_SESSION['id'],
                    'id_card' => $_GET['id'],
                    'montant' => $_GET['montant']
                ]);

                // AJOUT CREDIT
                $type = $_GET['type'];
                if($type == 1){
                    $q = 'UPDATE users SET credit=credit+:nombre WHERE id=:id';
                    $req = $bdd->prepare($q);
                    $result = $req->execute([
                        'id' => $_SESSION['id'],
                        'nombre' => '1'
                    ]);
                } elseif($type == 2){
                    $q = 'UPDATE users SET credit=credit+:nombre WHERE id=:id';
                    $req = $bdd->prepare($q);
                    $result = $req->execute([
                        'id' => $_SESSION['id'],
                        'nombre' => '5'
                    ]);
                } elseif($type == 3){
                    $q = 'UPDATE users SET credit=credit+:nombre WHERE id=:id';
                    $req = $bdd->prepare($q);
                    $result = $req->execute([
                        'id' => $_SESSION['id'],
                        'nombre' => '10'
                    ]);
                }else{
                    header('location: payement.php?message=Un problème est survenu a l\'ajout de crédit. veuillez réessayer&type=alerte');
                    exit;
                }
            } else {
                header('location: payement.php?message=Un problème est survenu veuillez réessayer&type=warning');
                exit;
            }
        } else {
            header('location: payement.php?message=Votre numéro de CVV est incorrect, veuillez réessayer (il doit être constitué de 3 chiffres)&type=warning');
            exit;
        }
    } else {
        header('location: payement.php?message=Votre numéro de carte est incorrect, veuillez réessayer  (il doit être constitué de 16 chiffres)&type=warning');
        exit;
    }

    if (!$result) {
        header('location: payement.php?message=Il y a une erreur, veuillez réessayer&type=danger');
        exit;
    }
header('location: reservation.php');
exit;
}
?>
