<?php
// Connecter un utilisateur
function searching($pdo, $searchTerm) {
    // Nettoyez les données entrantes pour éviter les attaques par injection SQL
    $searchTerm = htmlspecialchars($searchTerm);
        
    // Préparez la requête SQL pour rechercher dans la base de données
    $stmt = $pdo->prepare("SELECT * FROM user WHERE userName LIKE ? OR userFirstName LIKE ?");
    
    // Exécutez la requête avec le terme de recherche comme paramètre
    $stmt->execute(["%$searchTerm%", "%$searchTerm%"]);

    // Débogage : Affichez la requête SQL pour vérifier sa validité
    echo "Requête SQL exécutée : " . $stmt->queryString . "<br>";

    // Récupérez les résultats de la recherche
    $results = $stmt->fetchAll();

    // Retournez les résultats de la recherche
    return $results;
}

function GetTableUser($pdo) {
    try {
        $query = "SELECT * FROM user WHERE userId = :userId ";

        $selectUserToTracking = $pdo->prepare($query);

        $selectUserToTracking->execute([
            'userId' => $_GET["userId"] // récupération du paramètre
        ]);

        $userProfileToTracking = $selectUserToTracking->fetch(); // récupération d'un enregistrement

        return $userProfileToTracking;
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}