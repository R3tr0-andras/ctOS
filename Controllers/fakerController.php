<?php

// Inclure le modèle des faker
require_once "Models/fakerModel.php";

// Gestion des routes
if ($uri === '/fakerCreator') {
    // Vérifier si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
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