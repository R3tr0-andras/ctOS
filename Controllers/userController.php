<?php

// Inclure le modèle utilisateur
require_once "Models\userModel.php";
require_once "Models\searchModel.php";
require_once("Models\dangerousnessModel.php");

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Gestion des routes
if ($uri === '/profil') {
    // Couleur
    $couleurBackground = "#000000";
    $crimePourcentage = 0;

    $title = "Online profile";
    $template = "Views\Users\profile.php";
    require_once("Views\base.php");
} elseif ($uri == "/register") {
    if (isset($_POST['btnEnvoi'])) {
        if (CreateUser($pdo)) {
            $couleurBackground = "#000000";
            $crimePourcentage = 0;

            $title = "Log In";
            $template = "Views\Users\connexion.php";
            require_once("Views\base.php");
        } else {
            $couleurBackground = "#000000";
            $crimePourcentage = 0;

            $error_message = "Failed to create profile.";
            $title = "Home page";
            $template = "Views\home.php";
            require_once("Views\base.php");
        }
    } else {
        // Couleur
        $couleurBackground = "#000000";
        $crimePourcentage = 0;

        $title = "Register";
        $template = "Views\Users\inscription.php";
        require_once("Views\base.php");
    }
} elseif ($uri === "/login") {
    if (isset($_POST['btnEnvoi'])) {
        if (connexionUser($pdo)) {
            $couleurBackground = "#000000";
            $crimePourcentage = 0;

            $title = "Home page";
            $template = "Views\home.php";
            require_once("Views\base.php");
            //var_dump($_SESSION);
        } else {
            $couleurBackground = "#000000";
            $crimePourcentage = 0;

            $error_message = "Login failed.";
            $title = "Log In";
            $template = "Views\Users\connexion.php";
            require_once("Views\base.php");
        }
    } else {
        // Couleur
        $couleurBackground = "#000000";
        $crimePourcentage = 0;

        $title = "Log In";
        $template = "Views\Users\connexion.php";
        require_once("Views\base.php");
    }
} elseif ($uri == "/logout") {
    session_destroy();
    header("Location: /");
    //var_dump($_SESSION);
    $title = "Home page";
    $template = "Views\home.php";
    require_once("Views\base.php");
}
//elseif ($uri == "/modify") {
//  
//} 

// Fonction de vérification des champs vides
function verifempty()
{
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $messageErreur[$key] = "Votre " . $key . " est vide";
        }
    }
    if (isset($messageErreur)) {
        return $messageErreur;
    } else {
        return false;
    }
}
