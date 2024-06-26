<?php

// Inclure le modèle utilisateur et crud
require_once("Models/userModel.php");
require_once("Models/searchModel.php");
require_once("Models/dangerousnessModel.php");
require_once("Models/criminalRecent.php");
require_once("Models/recentModel.php");

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
}
// Tracker le profil
elseif (isset($_GET["userId"]) && $uri === "/trackingUser?userId=" . $_GET["userId"]) {
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
}
// Tracker le casier judiciaire
elseif (isset($_GET["userId"]) && $uri === "/trackingLive?userId=" . $_GET["userId"]) {
    // Récuppération des informations utilisatrices SPECIFIQUE à un utilisateur
    $userSearched = GetTableUser($pdo);
    $criminalRecordUsers = GetTableCriminalRecordUser($pdo);
    $userRecentThing = GetTableRecent($pdo);

    // Gestion des couleurs
    $couleurBackground = getColorFromPercentage($pdo);
    $crimePourcentage = calculateCrimePercentage($pdo);

    // Gestion du Crud des casier judiciaires
    if (isset($_POST['ModBTN'])) {
        if (UpdateCriminalRecord($pdo)) {
            //var_dump("test concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        } else {
            //var_dump("test non concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        }
    } else if (isset($_POST['DelBTN'])) {
        if (DeleteCriminalRecord($pdo)) {
            //var_dump("test concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        } else {
            //var_dump("test non concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        }
    }

    // Gestion du Crud des recent
    if (isset($_POST['RecentAddBTN'])) {
        if (AddRecent($pdo)) {
            //var_dump("test concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        } else {
            //var_dump("test non concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        }
    } else if (isset($_POST['RecentModBTN'])) {
        if (UpdateRecent($pdo)) {
            //var_dump("test concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        } else {
            //var_dump("test non concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        }
    } else if (isset($_POST['RecentDelBTN'])) {
        if (DeleteRencent($pdo)) {
            //var_dump("test concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        } else {
            //var_dump("test non concluant");
            header("Location: /trackingUser?userId=" . $_GET["userId"]);
        }
    }

    // Gestion des routes
    $title = "Live Tracking";
    $template = "Views\search\lifeTracking.php";
    require_once("Views\base.php");
}
// Modifier un profil
elseif (isset($_GET["userId"]) && $uri === "/modifyProfil?userId=" . $_GET["userId"]) {
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
        } else {
            // Gestion des routes
            $title = "Tracking";
            $template = "Views/search/trackingUser.php";
            require_once("Views\base.php");
        }
    }

    // Gestion des routes
    $title = "Modification";
    $template = "Views\Users\modifyProfil.php";
    require_once("Views\base.php");
}
// Ajouter un reccord
elseif (isset($_GET["userId"]) && $uri === "/setCriminalRecord?userId=" . $_GET["userId"]) {
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
            require_once("Views\base.php");
        } else {
            // Handle update failure
            // Gestion des routes
            $title = "Tracking";
            $template = "Views/search/trackingUser.php";
            require_once("Views\base.php");
        }
    }

    // Gestion des routes
    $title = "Ajout";
    $template = "Views\search\setCriminalRecord.php";
    require_once("Views\base.php");
} elseif (isset($_GET["userId"]) && $uri === "/deleteProfil?userId=" . $_GET["userId"]) {
    $idToDelete = $_GET["userId"];
    //var_dump($idToDelete);

    DeleteAllRecords($pdo, $idToDelete);
    DeleteRecentByProfile ($pdo, $idToDelete);
    deleteUser($pdo, $idToDelete);
    
    $title = "Page d'accueil";
    $template = "Views\home.php";
    require_once("Views\base.php");
    
    //$title = "Tracking";
    //$template = "Views/search/searching.php";
    //require_once("Views\base.php");

}
