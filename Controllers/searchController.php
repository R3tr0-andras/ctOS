<?php

// Inclure le modèle utilisateur
require_once "Models\userModel.php";
require_once "Models\searchModel.php";
require_once("Models\dangerousnessModel.php");

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Couleur des fonds
global $couleurBackground;
global $crimePourcentage;

// Gestion des routes
if ($uri === '/searching') {
    // Gestion des couleurs
    $couleurBackground = "#000000";
    $crimePourcentage = 0;

    if (isset($_POST['searchBTN'])) {
        // Appeler la fonction de recherche
        $results = searching($pdo, $_POST['searchText']);

        // Gestion des routes
        $title = "Searching";
        $template = "Views\search\searchingbar.php";
        require_once("Views\base.php");
    } else {
        // Gestion des routes
        $title = "Searching";
        $template = "Views\search\searchingbar.php";
        require_once("Views\base.php");
    }
} elseif (isset($_GET["userId"]) && $uri === "/trackingUser?userId=" . $_GET["userId"]) {
    // Gestion des couleurs
    $couleurBackground = "#000000";
    $crimePourcentage = 0;

    //recherche des données de l'utilisateur concernée
    $userSearched = GetTableUser($pdo);
    $userRecentThing = GetTableRecent($pdo);

    // Gestion des routes
    $title = "Tracking";
    $template = "Views/search/trackingUser.php";
    require_once("Views\base.php");
} elseif (isset($_GET["userId"]) && $uri === "/trackingLive?userId=" . $_GET["userId"]) {
    // Récuppération des informations utilisatrices SPECIFIQUE à un utilisateur
    $userSearched = GetTableUser($pdo);
    $criminalRecordUsers = GetTableCriminalRecordUser($pdo);
    $userRecentThing = GetTableRecent($pdo);

    // Gestion des couleurs
    $couleurBackground = getColorFromPercentage($pdo);
    $crimePourcentage = calculateCrimePercentage($pdo);

    // Gestion des routes
    $title = "Live Tracking";
    $template = "Views\search\lifeTracking.php";
    require_once("Views\base.php");
} elseif (isset($_GET["userId"]) && $uri === "/modifyProfil?userId=" . $_GET["userId"]) {
    // Récuppération des informations utilisatrices SPECIFIQUE à un utilisateur
    $userSearched = GetTableUser($pdo);
    $criminalRecordUsers = GetTableCriminalRecordUser($pdo);
    $userRecentThing = GetTableRecent($pdo);

    // Gestion des couleurs
    $couleurBackground = "#000000";
    $crimePourcentage = 0;

    if (isset($_POST['modifyBTN'])) {
        if (UpdateUser($pdo)) {
            var_dump("test concluant");
            // Gestion des routes
            $title = "Tracking";
            $template = "Views/search/trackingUser.php";
            require_once("Views\base.php");
            exit; // Stop further execution after redirection
        } else {
            // Handle update failure
            // You might want to set an error message here
        }
    }

    // Gestion des routes
    $title = "Modification";
    $template = "Views\Users\modifyProfil.php";
    require_once("Views\base.php");
} elseif (isset($_GET["userId"]) && $uri === "/setCriminalRecord?userId=" . $_GET["userId"]) {
    // Récuppération des informations utilisatrices SPECIFIQUE à un utilisateur
    $userSearched = GetTableUser($pdo);
    $criminalRecordUsers = GetTableCriminalRecordUser($pdo);
    $userRecentThing = GetTableRecent($pdo);

    // Gestion des couleurs
    $couleurBackground = "#000000";
    $crimePourcentage = 0;

    if (isset($_POST['AddBTN'])) {
        if (createCriminalRecord($pdo)) {
            //var_dump("test concluant");
            // Gestion des routes
            $title = "Tracking";
            $template = "Views/search/trackingUser.php";
            require_once("Views/base.php");
        } else {
            // Handle update failure
            // You might want to set an error message here
        }
    }

    // Gestion des routes
    $title = "Ajout";
    $template = "Views\search\setCriminalRecord.php";
    require_once("Views\base.php");
}
