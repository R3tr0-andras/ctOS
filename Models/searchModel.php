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
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Retournez les résultats de la recherche
    return $results;
}