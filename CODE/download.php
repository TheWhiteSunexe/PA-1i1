<?php
session_start();

use Dompdf\Dompdf;
use Dompdf\Options;

include('includes/db.php');

$q = 'SELECT id, email, nom, prenom, numero_telephone,adresse,ville,code_postal,Region,pays,credit FROM users WHERE email = ?';

$req = $bdd->prepare($q);

$email = $_SESSION['email'];
$req->execute([$email]);

//Recuperer les resultats dans un tableau $results
$results = $req->fetchAll();

ob_start();
require_once 'pdf-content.php';

$html = ob_get_contents();

ob_end_clean();

require_once 'includes/dompdf/autoload.inc.php';

$options = new Options();
$options->set('defaultFont', 'Courier');


$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('A4','portrait');

$dompdf->render();

$fichier = 'Mes informations.pdf';
$dompdf->stream($fichier);