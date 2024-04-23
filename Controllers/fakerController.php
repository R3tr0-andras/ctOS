<?php

// Inclure le modèle des faker
require_once "Models/fakerModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

$creationSuccess = false;

// Gestion des routes
if ($uri === '/fakerCreator') {
    if (isset($_POST['btnEnvoi'])) {
        $userId = CreateFaker($pdo);
        // Créer un faux utilisateur avec un enregistrement criminel et une activité récente
        CreateCriminalFaker($pdo, $userId);
        CreateRecentThing($pdo, $userId);

        // Rediriger vers la page de suivi en passant l'ID utilisateur
        header("Location: /trackingUser?userId=$userId");
        exit;
        
    } else {
        // Vérifier les champs vides
        $messageErreur = verifEmpty();
        if (!$messageErreur) {
            // Gérer le cas des champs vides
        }
    }
    
    // Configuration des paramètres pour la création de faux utilisateurs
    $couleurBackground = "#000000";
    $crimePourcentage = 0;

    $title = "Création Terminée" ;
    $template = "Views/faker/creator.php";
    require_once("Views\base.php");
}