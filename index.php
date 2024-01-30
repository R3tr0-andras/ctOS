<?php
  //Pour éviter les notices
  if (session_status() == PHP_SESSION_NONE) {
    // Démarrer la session
    session_start();
  }

  //var_dump($_SESSION);

  require_once("Data\dataBaseConnection.php");
  require_once("Controllers\indexController.php");
  require_once("Controllers\userController.php");
  require_once("Controllers\searchController.php");
