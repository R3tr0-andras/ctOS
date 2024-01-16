<?php

require_once("Models\userModel.php");

$uri = $_SERVER["REQUEST_URI"];

if ($uri === "/index.php" || $uri === "/") {
    $title = "Page d'accueil";
    $template = "Views\home.php";
    require_once("Views\base.php");
} elseif ($uri === "/search") {
    
}