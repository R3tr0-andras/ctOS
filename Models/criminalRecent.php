<?php

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
        $query = "DELETE fROM criminal_record where recordId = :recordId";

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'recordId' => $_POST['DelBTN']
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}