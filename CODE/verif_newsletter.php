<?php
    // Inclusion du fichier de configuration de la base de données
    include('includes/db.php');

    // Vérification si l'utilisateur est autorisé à accéder à cette page (pour les admins seulement)
    // Vérifiez les autorisations d'accès ici...

    // Initialisation des variables
    $email = 'oui'; // Adresse email
    $nom = 'oui'; // Nom ou auteur ou pseudo ou ...

    // Requête d'insertion pour ajouter la newsletter dans la base de données
    $q = 'INSERT INTO newsletter (auteur, date, titre, texte) VALUES (:auteur, NOW(), :titre, :texte)'; // Utilisation de NOW() pour insérer la date actuelle
    $req = $bdd->prepare($q);

    // Exécution de la requête d'insertion
    $result = $req->execute([
        'auteur' => $_POST['auteur'], // Utilisation de la variable $nom pour l'auteur
        'titre' => $_POST['titre'], // Utilisation de la variable $titre pour le titre
        'texte' => $_POST['contenu'] // Utilisation de la variable $contenu pour le texte
    ]);

    // Vérification si l'insertion s'est effectuée avec succès
    if ($result) {
        echo "Enregistrement réussi!";
    } else {
        echo "Erreur lors de l'enregistrement: " . $req->errorInfo()[2]; // Affichage de l'erreur en cas d'échec
    }

    // Inclure le fichier de configuration de la base de données
    include('includes/db.php');

    // Titre du mail
    $titre = $_POST['titre'];

    // Contenu de l'email (exemple)
    $contenu_email = $_POST['contenu'];

    // Requête pour récupérer les adresses e-mail des utilisateurs
    $query = $bdd->query("SELECT email FROM users");
    
    // Vérifier si la requête a réussi
    if ($query) {
        // Parcourir les résultats
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $destinataire_email = $row['email']; // Adresse e-mail de l'utilisateur
            
            // Envoyer l'e-mail à chaque utilisateur
            if (envoyerMail($destinataire_email, $titre, $contenu_email)) {
                echo "Email envoyé avec succès à $destinataire_email<br />";
            } else {
                echo "Erreur lors de l'envoi de l'email à $destinataire_email<br />";
            }
        }
    } else {
        echo 'Erreur lors de la récupération des adresses e-mail des utilisateurs.';
    }

    // Fonction pour envoyer un e-mail
    function envoyerMail($destinataire_email, $titre, $contenu_email) {
        // Adresse e-mail de l'expéditeur
        $from = "From: hello <GILLET.Tristan.94@gmail.com>\r\n";
        
        // Configuration des paramètres SMTP
        $smtp_server = 'smtp.gmail.com';
        $smtp_port = 587;
        
        // Etablir la connexion SMTP
        $socket = stream_socket_client("tcp://$smtp_server:$smtp_port", $errno, $errstr, 30);
        
        // Vérifier si la connexion est établie
        if (!$socket) {
            echo "Erreur lors de l'établissement de la connexion SMTP: $errstr ($errno)";
            return false;
        }
        
        // Attendre le message de bienvenue du serveur SMTP
        fread($socket, 8192);
        
        // Envoyer la commande EHLO pour indiquer le client SMTP
        fwrite($socket, "EHLO $smtp_server\r\n");
        fread($socket, 8192);
        
        // Commencer la connexion TLS
        fwrite($socket, "STARTTLS\r\n");
        fread($socket, 8192);
        
        // Activer le cryptage TLS
        stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
        
        // Envoyer l'e-mail
        fwrite($socket, "MAIL FROM: <GILLET.Tristan.94@gmail.com>\r\n");
        fwrite($socket, "RCPT TO: <$destinataire_email>\r\n");
        fwrite($socket, "DATA\r\n");
        fwrite($socket, "Subject: $titre\r\n");
        fwrite($socket, "$from");
        fwrite($socket, "Content-Type: text/html; charset=ISO-8859-1\r\n");
        fwrite($socket, "Content-Transfer-Encoding: 8bit\r\n");
        fwrite($socket, "\r\n");
        fwrite($socket, "$contenu_email\r\n");
        fwrite($socket, ".\r\n");
        
        // Attendre la réponse du serveur SMTP
        fread($socket, 8192);
        
        // Fermer la connexion SMTP
        fwrite($socket, "QUIT\r\n");
        fclose($socket);
        
        return true;
    }
    /*
    $q_emails = 'GILLET.Tristan.94@gmail.com'; // Requête pour récupérer les emails des abonnés $bdd->query("SELECT email FROM users")
    $compteur = 1; // Variable pour compter les envois d'emails

    // Vérification si la requête a réussi
    if ($q_emails) {
        while ($r = $q_emails->fetch(PDO::FETCH_ASSOC)) {
            $e_mail = $r['email']; // Email de l'abonné

            // Contenu de l'email
            $contenu_email = 'Bonjour! <br />Email : ' . $e_mail . '<br />';
            $contenu_email .= 'Voici la dernière newsletter:';
            $contenu_email .= 'Au revoir <br /><br />';

            // Envoi de l'email
            $from = "From: hello <newsletter@monsite.ext>\nMime-Version: 1.0\nContent-Type: text/html; charset=ISO-8859-1\n";
            if (mail($e_mail, $titre, $contenu_email, $from)) {
                echo 'N° ' . $compteur . ' - ' . $e_mail . ' : envoyé avec succès!<br />';
            } else {
                echo 'Erreur lors de l\'envoi de l\'email à ' . $e_mail . '<br />';
            }
            $compteur++; // Incrémentation du compteur d'envois
        }
    } else {
        echo 'Erreur lors de la récupération des emails des abonnés.';
    }*/
?>
