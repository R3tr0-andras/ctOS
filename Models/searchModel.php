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
        $query = "select * from user where userId = :userId ";

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

function GetTableCriminalRecordUser($pdo) {
    try {
        $query = "select * from criminal_record where userId = :userId ";

        $selectUserToTracking = $pdo->prepare($query);

        $selectUserToTracking->execute([
            'userId' => $_GET["userId"] // récupération du paramètre
        ]);

        $userCriminalRecord = $selectUserToTracking->fetchAll(); // récupération d'un enregistrement

        return $userCriminalRecord;
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}

function GetTableRecent($pdo) {
    try {
        $query = "select * from recent where userId = :userId ";

        $selectUserToTracking = $pdo->prepare($query);

        $selectUserToTracking->execute([
            'userId' => $_GET["userId"] // récupération du paramètre
        ]);

        $userRecentThing = $selectUserToTracking->fetch(); // récupération d'un enregistrement

        return $userRecentThing;
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}

function createCriminalRecord($pdo) {
    try {
        $today = date("Y-m-d H:i:s"); 

        $query = "INSERT INTO criminal_record(userId, recordReason, recordDate, recordDangerousness) 
        VALUES (:userId, :recordReason, :recordDate, :recordDangerousness)";

        $createRecord = $pdo->prepare($query);

        $createRecord->execute([
            'userId' => $_GET["userId"],
            'recordReason' => $_POST['recordReason'],
            'recordDate' => $today,
            'recordDangerousness' => $_POST['recordDangerousness']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function UpdateCriminalRecord($pdo) {
    try {
        $query = "UPDATE criminal_record SET 
            recordDate = :recordDate,
            recordReason = :recordReason
        WHERE recordId = :recordId";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'recordDate' => $_POST['recordDate'],
            'recordReason' => $_POST['recordReason'],
            'recordId' => $_POST['ModBTN']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function DeleteCriminalRecord($pdo) {
    try {
        $query = "delete from criminal_record where recordId = :recordId";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'recordId' => $_POST['DelBTN']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}