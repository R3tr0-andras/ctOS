<?php 

function GetTableRecent($pdo) {
    try {
        $query = "SELECT * FROM recent WHERE userId = :userId ";

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

function AddRecent($pdo) {
    try {
        $today = date("Y-m-d H:i:s"); 

        $query = "INSERT INTO recent(userId, recentDate, recentContent) VALUES (:userId, :recentDate, :recentContent)";

        $createRecord = $pdo->prepare($query);

        $createRecord->execute([
            'userId' => $_GET["userId"],
            'recentDate' => $today,
            'recentContent' => $_POST['recentContentAdd']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function UpdateRecent($pdo) {
    try {
        $query = "UPDATE recent SET recentContent = :recentContent WHERE recentId = :recentId";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'recentContent' => $_POST['recentContentMod'],
            'recentId' => $_POST['RecentModBTN']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function DeleteRencent($pdo) {
    try {
        $query = "DELETE fROM recent WHERE recentId = :recentId";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'recentId' => $_POST['RecentDelBTN']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}