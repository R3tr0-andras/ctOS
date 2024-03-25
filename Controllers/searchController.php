<?php

// Inclure le modèle utilisateur
require_once "Models\searchModel.php";
require_once("Models\dangerousnessModel.php");

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Couleur des fonds
global $couleurBackground;
global $crimePourcentage;

// Gestion des routes
if ($uri === '/searching') {
    $couleurBackground = "#000000";
    $crimePourcentage = 0;
    // Vérification si la requête est une requête AJAX
    if (isset($_POST['searchBTN'])) {
        var_dump($_POST['searchText']);
        // Appeler la fonction de recherche
        $results = searching($pdo, $_POST['searchText']);
        $title = "Searching";
        $template = "Views\search\searchingbar.php";

        // Inclure le fichier de template
        require_once("Views\base.php");
    } else {
        // Si ce n'est pas une requête AJAX, afficher la page normale
        $title = "Searching";
        $template = "Views\search\searchingbar.php";
        require_once("Views\base.php");
    }
} elseif (isset($_GET["userId"]) && $uri === "/trackingUser?userId=" . $_GET["userId"]) {
    $couleurBackground = "#000000";
    $crimePourcentage = 0;

    //recherche des données de l'utilisateur concernée
    $userSearched = GetTableUser($pdo);

    $title = "Tracking";
    $template = "Views/search/trackingUser.php";
    require_once("Views\base.php");
} elseif (isset($_GET["userId"]) && $uri === "/trackingLive?userId=" . $_GET["userId"]) {
    // Récuppération des informations utilisatrices SPECIFIQUE à un utilisateur
    $userSearched = GetTableUser($pdo);
    $criminalRecordUsers = GetTableCriminalRecordUser($pdo);
    $userRecentThing = GetTableRecent($pdo);

    // Gestion des couleurs
    $imageBackground = '';
    if (isset($_SESSION['user'])) {
        $couleurBackground = getColorFromPercentage($pdo);
        $crimePourcentage = calculateCrimePercentage($pdo);
    } else {
        $couleurBackground = "#000000";
        $crimePourcentage = 0;
    }

    // Gestion des routes
    $title = "Live Tracking";
    $template = "Views\search\lifeTracking.php";
    require_once("Views\base.php");
}
