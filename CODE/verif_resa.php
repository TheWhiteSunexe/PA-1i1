<?php
session_start(); 
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}

include('includes/db.php');

if(isset($_GET['id']) && !empty($_GET['id'])){
    if(!isset($_POST['nom']) || empty($_POST['nom']) || !isset($_POST['prenom']) || empty($_POST['prenom']) || !isset($_POST['date']) || empty($_POST['date']) || !isset($_POST['heure_debut']) || empty($_POST['heure_debut']) || !isset($_POST['heure_fin']) || empty($_POST['heure_fin'])|| !isset($_POST['profession']) || empty($_POST['profession'])|| !isset($_POST['titre']) || empty($_POST['titre'])|| !isset($_POST['description']) || empty($_POST['description'])) {
        header('location: backreservation.php?message=Il manque un élément, veuillez réessayer&type=danger');
        exit;
    } else {
        $q = 'INSERT INTO evenement(id_cours, nom,prenom,profession, titre, description, date, heure_debut, heure_fin) VALUES(:id,:nom,:prenom,:profession, :titre, :description, :date, TIME_FORMAT(:heure_debut, "%H:%i"), TIME_FORMAT(:heure_fin, "%H:%i"))';
        $req = $bdd->prepare($q);
    
        $result = $req->execute([
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'profession' => $_POST['profession'],
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'date' => $_POST['date'],
            'heure_debut' => $_POST['heure_debut'],
            'heure_fin' => $_POST['heure_fin'],
            'id' => $_GET['id']
        ]);
    
        if (!$result) {
            header('location: backreservation.php?message=Il y a une erreur, veuillez réessayer&type=danger');
            exit;
        }
    
        header('location: backreservation.php?message=Ajout de l\'évènement avec succès !&type=success');
        exit;
    }
}else{
    if(!isset($_POST['nom']) || empty($_POST['nom']) || !isset($_POST['prenom']) || empty($_POST['prenom']) || !isset($_POST['date']) || empty($_POST['date']) || !isset($_POST['heure_debut']) || empty($_POST['heure_debut']) || !isset($_POST['heure_fin']) || empty($_POST['heure_fin'])|| !isset($_POST['profession']) || empty($_POST['profession'])|| !isset($_POST['titre']) || empty($_POST['titre'])|| !isset($_POST['description']) || empty($_POST['description'])) {
        header('location: backreservation.php?message=Il manque un élément, veuillez réessayer&type=danger');
        exit;
    } else {
        $q = 'INSERT INTO evenement(nom,prenom,profession, titre, description, date, heure_debut, heure_fin) VALUES(:nom,:prenom,:profession, :titre, :description, :date, TIME_FORMAT(:heure_debut, "%H:%i"), TIME_FORMAT(:heure_fin, "%H:%i"))';
        $req = $bdd->prepare($q);
    
        $result = $req->execute([
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'profession' => $_POST['profession'],
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'date' => $_POST['date'],
            'heure_debut' => $_POST['heure_debut'],
            'heure_fin' => $_POST['heure_fin']
        ]);
    
        if (!$result) {
            header('location: backreservation.php?message=Il y a une erreur, veuillez réessayer&type=danger');
            exit;
        }
    
        header('location: backreservation.php?message=Ajout de l\'évènement avec succès !&type=success');
        exit;
    }  
}