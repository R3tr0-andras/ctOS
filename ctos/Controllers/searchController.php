<?php

// Inclure le modèle utilisateur
require_once "Models\searchModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Gestion des routes
if ($uri === '/searching') {
    // Afficher la barre de recherche
    require_once "Views\search\searchingbar.php";
} 
