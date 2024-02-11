<?php

// Inclure le modèle des faker
require_once "Models/fakerModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

$creationSuccess = false;

// Gestion des routes
if ($uri === '/fakerCreator') {
    // Vérifier si la requête est de type POST
    if (isset($_POST['startFunction'])) {
        $userId = CreateFaker($pdo);

        // Vérifier si les fonctions de création ont réussi
        if (CreateCriminalFaker($pdo, $userId) && CreateRecentThing($pdo, $userId)) {
            $creationSuccess = true;
        }
        
    } else {
        // Vérifier les champs vides
        $messageErreur = verifEmpty();
        if (!$messageErreur) {
            // Créer un nouvel utilisateur
            $userId = CreateFaker($pdo);
        }
    }

    $title = $creationSuccess ? "Creating Complete" : "Creating";
    $template = $creationSuccess ? "Views/faker/view.php" : "Views/faker/creator.php";
    require_once("Views\base.php");

} else if ($uri === '/fakerView') {
    $title = "Creating Complete";
    $template = "Views/faker/view.php";
    require_once("Views\base.php");
}
