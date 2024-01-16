<?php

// Inclure le modèle utilisateur
require_once "Models\userModel.php";

// Récupérer l'URI de la requête
$uri = $_SERVER['REQUEST_URI'];

// Gestion des routes
if ($uri === '/profil') {
    // Afficher le profil de l'utilisateur
    require_once "Views\Users\profile.php";
} elseif ($uri == "/register") {
    // Vérifier si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier les champs vides
        $messageErreur = verifEmpty();
        if (!$messageErreur) {
            // Créer un nouvel utilisateur
            CreateUser($pdo);
            // Rediriger vers la page de connexion
            header("Location: /connexion");
            // Terminer le script après la redirection
            exit();
        }
    }
    // Afficher le formulaire d'inscription ou de modification
    require_once "Views\Users\inscriptionOrModifyProfile.php";
} 

// Partie connection au profil de l'utilisateur
elseif ($uri === "/login") {
    // Vérifier si le formulaire de connexion est soumis
    if (isset($_POST['btnEnvoi'])) {
        // Tenter de connecter l'utilisateur
        if (connexionUser($pdo)) {
            // Connexion réussie, redirection vers la page d'accueil
            $title = "Page d'accueil";
            $template = "Views\home.php";
            require_once("Views\base.php");
            //var_dump($_SESSION);
        } else {
            // Échec de la connexion, gestion de l'erreur
            $error_message = "Échec de la connexion. Veuillez vérifier vos identifiants.";
            $title = "Log In";
            $template = "Views\Users\connexion.php";
            require_once("Views\base.php");
        }
    } else {
        // Afficher le formulaire de connexion
        $title = "Log In";
        $template = "Views\Users\connexion.php";
        require_once("Views\base.php");
    }
} elseif ($uri == "/logout") {
    // Détruire la session et rediriger vers la page d'accueil
    session_destroy();
    var_dump($_SESSION);
    //redirection vers la page d'acceuil
    $title = "Page d'accueil";
    $template = "Views\home.php";
    require_once("Views\base.php");
} elseif ($uri == "/modify") {
    // Vérifier si la requête est de type POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vérifier les champs vides
        $messageErreur = verifEmpty();
        if (!$messageErreur) {
            // Modifier les informations de l'utilisateur
            modifyUser($pdo, $userId);
            // Rediriger vers la page de connexion
            header("Location: /connexion");
            // Terminer le script après la redirection
            exit();
        }
    }
    // Afficher le formulaire d'inscription ou de modification
    require_once "Views\Users\inscriptionOrModifyProfile.php";
} elseif ($uri == "/delete") {
    // Supprimer l'utilisateur et rediriger vers la page d'accueil
    deleteUser($pdo, $userId);
    header("Location: /");
    exit();
}

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
