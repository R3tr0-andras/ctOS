<?php

// Inclure le modèle utilisateur
require_once "Models\searchModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Gestion des routes
if ($uri === '/searching') {
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
}  elseif (isset($_GET["userId"]) && $uri === "/voiruser?userId=" . $_GET["userId"]) {
    //recherche des données de l'utilisateur concernée
    $userSearched = selectUser($pdo);
    
}
