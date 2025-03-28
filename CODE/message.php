<?session_start();
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: index.php');
    exit;
}
include('includes/db.php');
$q = 'INSERT INTO visite(id_message, id_user) VALUES(:id_message, :id_user)';
$req = $bdd->prepare($q);
$req->execute([
	':id_message' => $_GET['id'],
	':id_user' => $_SESSION['id']
]);
$existe = $req->fetchAll(PDO::FETCH_ASSOC);

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
        echo '<link rel="stylesheet" type="text/css" href="css/style_message.css">';
    } else {
        echo '<link rel="stylesheet" type="text/css" href="css/style.css">';
        echo '<link rel="stylesheet" type="text/css" href="css/style_message.css">';
    }
    ?>
</head>

    <body>
        
        <?php include('includes/header.php'); ?>

        <main class="content">
    <div class="container p-0">

		<h1 class="h3 mb-3">Messages</h1>

		<div class="card">
			<div class="row g-0">
				
				<div class="col-12 col-lg-7 col-xl-9">
					

					<div class="position-relative">
						<div class="chat-messages p-4">
						<?php
						// Connexion à la base de données
						include('includes/db.php');

						// Requête pour récupérer les informations des commentaires depuis la base de données
						$query = "SELECT commentaire_id, message_id, utilisateur_id, contenu, date_creation FROM forum_commentaires WHERE message_id = :sujet ORDER BY date_creation ASC";
						$stmt = $bdd->prepare($query);
						$stmt->execute(['sujet' => $_GET['id']]);

						// Vérifier s'il y a des résultats
						if ($stmt->rowCount() > 0) {
							// Parcourir les résultats
							while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
								// Récupérer les données du commentaire
								$commentaire_id = $row['commentaire_id'];
								$message_id = $row['message_id'];
								$utilisateur_id = $row['utilisateur_id'];
								$contenu = $row['contenu'];
								$date_creation = $row['date_creation'];

								// Requête pour récupérer le nom de l'utilisateur à partir de son ID
								$user_query = "SELECT nom, prenom, image FROM users WHERE id = :utilisateur_id";
								$user_stmt = $bdd->prepare($user_query);
								$user_stmt->execute(['utilisateur_id' => $utilisateur_id]);
								$user_row = $user_stmt->fetch(PDO::FETCH_ASSOC);
								$nom_utilisateur = $user_row['nom'];
								$prenom_utilisateur = $user_row['prenom'];

								// Formatage de la date
								$date_formattee = date('d/m/Y H:i', strtotime($date_creation));

								// Vérification de la date actuelle
								if (date('Y-m-d', strtotime($date_creation)) === date('Y-m-d')) {
									$date_formattee = date('H:i', strtotime($date_creation));
								}
								if($utilisateur_id == $_SESSION['id']){
									echo'							

									<div class="chat-message-right pb-4">
										<div>
											<img src="uploads/' . (isset($user_row['image']) ? $user_row['image'] : 'default.jpg') . '" class="rounded-circle mr-1" width="40" height="40">
											<div class="text-muted small text-nowrap mt-2">'.$date_formattee.'</div>
										</div>
										<div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
											<div class="font-weight-bold mb-1">You</div>
											'.$contenu.'
										</div>
									</div>';
								}else{
									echo '
								<div class="chat-message-left pb-4">
									<div>
										<img src="uploads/' . (isset($user_row['image']) ? $user_row['image'] : 'default.jpg') . '" class="rounded-circle mr-1" width="40" height="40">
										<div class="text-muted small text-nowrap mt-2">'.$date_formattee.'</div>
									</div>
									<div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
										<div class="font-weight-bold mb-1">' . $nom_utilisateur . ' ' . $prenom_utilisateur . '</div>
										'.$contenu.'
									</div>
								</div>';
								}
							}
						}
						?>
						</div>
					</div>

					<div class="flex-grow-0 py-3 px-4 border-top">
						<div class="input-group">
						<form action="verif_message.php?id=<?php echo $_GET['id']; ?>" method="post">
								<input type="text" class="form-control" name="contenu" placeholder="Type your message">
								<button class="btn btn-primary">Send</button>
							</form>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</main>

        <?php include('includes/footer.php'); ?>
    </body>

</html>