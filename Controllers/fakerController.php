<?php

// Inclure le modèle des faker
require_once "Models/fakerModel.php";

// Gestion des routes
if ($uri === '/fakerCreator') {
    // Vérifier si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['submit'])) {
            $nombre = $_GET["nombre"];

            for ($i = 0; $i == $nombre; $i++) {
                CreateFaker($pdo);
                CreateCriminalFaker($pdo, $userId);
                CreateRecentThing ($pdo, $userId);
            }
        }

        // Vérifier les champs vides
        $messageErreur = verifEmpty();
        if (!$messageErreur) {
            // Créer un nouvel utilisateur
            CreateFaker($pdo);
        }
    }
    // Afficher le formulaire d'inscription ou de modification
    require_once "Views/faker\creator.php";
} 