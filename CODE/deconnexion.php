<?php

// Ouverture de la session
session_start();

// Detruire la session
session_destroy();

// Redirection vers l'accueil
header('location: index.php');
exit;
