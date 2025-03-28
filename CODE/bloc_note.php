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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <?php
        if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif') {
            echo '<link rel="stylesheet" type="text/css" href="css/style_nightmode.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_blocnote.css">';
        } else {
            echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
            echo '<link rel="stylesheet" type="text/css" href="css/style_blocnote.css">';
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
        
        <main><br><br>
            <script src="js/blocnote.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
            <div class="page-content container note-has-grid">
                <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center">
                    
                        <?php
                            include('includes/db.php');

                            $q = '';

                            if(isset($_POST['trier'])) {
                                if(!empty($_POST['trier']) && isset($_POST['trier'])){

                                    if($_POST['trier'] == 1){
                                        $q = "SELECT fav,id,titre, description, date FROM blocnote WHERE id_user = :id ORDER BY date ASC";
                                    }
                                    elseif($_POST['trier'] == 2){
                                        $q = "SELECT fav,id,titre, description, date FROM blocnote WHERE id_user = :id ORDER BY date DESC";
                                    }
                                    elseif($_POST['trier'] == 3){
                                        $q = "SELECT fav,id,titre, description, date FROM blocnote WHERE id_user = :id ORDER BY titre ASC";
                                    }
                                    elseif($_POST['trier'] == 4){
                                        $q = "SELECT fav,id,titre, description, date FROM blocnote WHERE id_user = :id ORDER BY titre DESC";
                                    }
                                } else {
                                    // Par défaut
                                    $q = "SELECT fav,id,titre, description, date FROM blocnote WHERE id_user = :id ORDER BY fav DESC ";
                                }
                            } else {
                                // Par défaut
                                $q = "SELECT fav,id,titre, description, date FROM blocnote WHERE id_user = :id ORDER BY fav DESC ";
                            }

                        ?>
                    <li class="nav-item">
                        <form action="bloc_note.php" method="post">
                            <a class=" rounded-pill note-link px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                           <button style="width: 151px;height: 58px;" type="submit">Changer</button>
                            </a>
                            <select name="trier" class="rounded-pill note-link px-2 px-md-3 mr-0 mr-md-2 active" style="border: none!important; width: 250px!important; ">
                                <option value="1" selected>date (croissant)</option>
                                <option value="2">date (décroissant)</option>
                                <option value="3">titre (croissant)</option>
                                <option value="4">titre (décroissant)</option>
                            </select>
                        </form>
                    </li>
                    <li class="nav-item ml-auto">
                        <a href="javascript:void(0)" class="nav-link btn-primary rounded-pill d-flex align-items-center px-3" id="add-notes"> <i class="icon-note m-1"></i><span class="d-none d-md-block font-14">Add Notes</span></a>
                    </li>
                </ul>

                <div class="tab-content bg-transparent">
                    <div id="note-full-container" class="note-has-grid row">

                    <?php
                    // Inclure le fichier de connexion à la base de données
                    include('includes/db.php');

                    try {
                        
                        $req = $bdd->prepare($q);
                        $req->execute([
                            'id' => $_SESSION['id'],
                        ]);
                        
                        // Récupérer toutes les notes
                        $notes = $req->fetchAll(PDO::FETCH_ASSOC);

                        // Vérifier s'il y a des notes
                        if ($notes) {
                            foreach ($notes as $note) {
                                // Échapper les valeurs pour éviter les attaques XSS
                                $titre = htmlspecialchars($note['titre']);
                                $description = htmlspecialchars($note['description']);
                                $date = htmlspecialchars(date("d F Y", strtotime($note['date'])));
                                $id = htmlspecialchars($note['id']);
                                $fav = $note['fav'] == 1 ? 'note-favourite' : '';
                                $starClass = 'fa-star';
                                // Générer le code HTML pour chaque note
                                echo '
                                <div class="col-md-4 single-note-item all-category note-important  ' . $fav . '" data-id="' . $id . '" >
                                    <div class="card card-body">
                                        <span class="side-stick"></span>
                                        <h5 style="width: 100% !important; white-space: normal;'; if(isset($_COOKIE['nm']) && $_COOKIE['nm'] === 'actif'){ echo'color:black;';} echo'" class="note-title text-truncate w-75 mb-0" data-noteheading="' . $titre . '">' . $titre . '</h5>
                                        <p class="note-date font-12 text-muted">' . $date . '</p>
                                        <div class="note-content">
                                            <p class="note-inner-content text-muted" data-notecontent="' . $description . '">' . $description . '</p>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="mr-1"><a style="color: black" href="update_fav.php?id='.$id.'&fav='.$note['fav'].'"><i class="fa ' . $starClass . ' favourite-note"></i></a></span>
                                            <span class="mr-1"><a style="color: black" href="delete_note.php?id='.$id.'"><i class="fa fa-trash"></i></a></span>
                                        </div>
                                    </div>
                                </div>';
                            }
                        } else {
                            echo '<p>Aucune note trouvée.</p>';
                        }
                    } catch (PDOException $e) {
                        echo "Erreur : " . $e->getMessage();
                    }
                    ?>                  
                    </div>
                </div>

                <!-- Modal Add notes -->
                <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content border-0">
                            <div class="modal-header bg-info text-white">
                                <h5 class="modal-title text-white">Ajouter une note</h5>
                                <button style="background-color: #98B9B2;border: none;box-shadow: none;color: rgb(0, 0, 0);" type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <form action="addnote.php" method="post">
                                <div class="modal-body">
                                    <div class="notes-box">
                                        <div class="notes-content">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="note-title" >
                                                        <label for="note-has-title">Titre de la note</label>
                                                        <input style="margin: 0px!important;box-shadow: none!important;" type="text" id="note-has-title" name="titre" class="form-control" minlength="10" placeholder="Titre" required />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="note-description">
                                                        <label for="note-has-description">Description</label>
                                                        <textarea id="note-has-description" name="description" class="form-control" minlength="10" placeholder="Description" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include('includes/footer.php'); ?>
    </body>
</html>      
  