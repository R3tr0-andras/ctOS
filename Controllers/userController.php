<?php

// Inclure le modèle utilisateur
require_once "Models\userModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Gestion des routes
if ($uri === '/profil') {

    $title = "Online profile";
    $template = "Views\Users\profile.php";
    require_once("Views\base.php");
} 

elseif ($uri == "/register") {

    if (isset($_POST['btnEnvoi'])) {
        if (connexionUser($pdo)) {
            $title = "Log In";
            $template = "Views\Users\connexion.php";
            require_once("Views\base.php");
        } else {
            $error_message = "Failed to create profile.";
            $title = "Home page";
            $template = "Views\home.php";
            require_once("Views\base.php");
        }
    } else {
        $title = "Register";
        $template = "Views\Users\inscription.php";
        require_once("Views\base.php");
    }
} 

elseif ($uri === "/login") {
    
    if (isset($_POST['btnEnvoi'])) {
        
        if (connexionUser($pdo)) {
            
            $title = "Home page";
            $template = "Views\home.php";
            require_once("Views\base.php");
            //var_dump($_SESSION);
        } else {
            
            $error_message = "Login failed.";
            $title = "Log In";
            $template = "Views\Users\connexion.php";
            require_once("Views\base.php");
        }
    } else {
        
        $title = "Log In";
        $template = "Views\Users\connexion.php";
        require_once("Views\base.php");
    }
} 

elseif ($uri == "/logout") {

    session_destroy();
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
