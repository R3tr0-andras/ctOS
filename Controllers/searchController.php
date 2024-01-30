<?php

// Inclure le modèle utilisateur
require_once "Models\searchModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Gestion des routes
if ($uri === '/searching') {
    // Afficher la barre de recherche
    if (isset($_POST['btnEnvoi'])) {
        // Utiliser la barre de recherche
        $userID = searching($pdo);
        //var_dump($userID);
        if (searching($pdo)) {
            // recherche réussie
            $title = "Searching Complete";
            $template = "Views\search\searched.php";
            require_once("Views\base.php");
        } else {
            $title = "Page d'accueil";
            $template = "Views\home.php";
            require_once("Views\base.php");
        }
    } else {
        // Afficher la barre de recherche
        $title = "Searching";
        $template = "Views\search\searchingbar.php";
        require_once("Views\base.php");
    }
}else if ($uri === '/searching/Searched') {
    if ($uri === '/searching/Searched/Profile') {
        //SearchedProfile($pdo);

    } else if ($uri === '/searching/Searched/CriminalRecord') {
        //SearchedCriminalRecord($pdo);

    } else if ($uri === '/searching/Searched/History') {
        //SearchedHistory($pdo);

    }else {

    }
}