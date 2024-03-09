<?php

// Inclure le modèle utilisateur
require_once "Models\searchModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Gestion des routes
if ($uri === '/searching') {
    // Vérification si la requête est une requête AJAX
    if (isset($_GET['searchBTN'])) {
        // Appeler la fonction de recherche
        $results = searching($pdo, $_GET['searchText']);

        // Définir le titre de la page
        $title = "Searching";

        // Définir le chemin du template à utiliser pour afficher la barre de recherche et les résultats
        $template = "Views\search\searchingbar.php";

        // Inclure le fichier de template
        require_once("Views\base.php");
    } else {
        // Si ce n'est pas une requête AJAX, afficher la page normale
        $title = "Searching";
        $template = "Views\search\searchingbar.php";
        require_once("Views\base.php");
    }
} else if ($uri === '/searching/Searched') {
    if ($uri === '/searching/Searched/Profile') {
        //SearchedProfile($pdo);

    } else if ($uri === '/searching/Searched/CriminalRecord') {
        //SearchedCriminalRecord($pdo);

    } else if ($uri === '/searching/Searched/History') {
        //SearchedHistory($pdo);

    } else {
    }
}
