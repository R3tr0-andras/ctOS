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
        //var_dump($userId);
        CreateCriminalFaker($pdo, $userId);
        CreateRecentThing($pdo, $userId);
    } else {
        // Vérifier les champs vides
        $messageErreur = verifEmpty();
        if (!$messageErreur) {

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
