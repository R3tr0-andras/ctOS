<?php

require_once("Models\userModel.php");

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $couleurBackground = "#000000";
    $crimePourcentage = 0;
    
    $title = "Page d'accueil";
    $template = "Views\home.php";
    require_once("Views\base.php");
}