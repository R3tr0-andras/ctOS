<?php

/* 
Fonction de sélection des ustilisateurs 
---------------------------------------
But : récupérer toutes les infos de la table user
*/
function SelectAllUsers($pdo)
{

}

function SelectUsersBySearch($pdo, $searchTerm)
{

}

/* 
Fonction de création des ustilisateurs 
---------------------------------------
But : creer des éléments dans la table user
*/
function CreateUser($pdo)
{
    try {
        $query = "insert into user(userName, userFirstName, userPseudo, userPassword, userEmail, userRole, userGenre, userBirthDate, userPhoneNumber, userEthnic, userJobs, userIncome, userProfileImage, userIsFaker ) 
        values (:userName, :userFirstName, :userPseudo, :userPassword, :userEmail, :userRole, :userGenre, :userBirthDate, :userPhoneNumber, :userEthnic, :userJobs, :userIncome, :userProfileImage, :userIsFaker)";
        
        $img = uploadImage();

        $createUser = $pdo->prepare($query);

        $createUser->execute([
            'userPseudo' => $_POST['Pseudo'],
            'userEmail' => $_POST['Mail'],
            'userPassword' => $_POST['Password'],
            'userName' => $_POST['Nom'],
            'userFirstName' => $_POST['Prenom'],
            'userGenre' => $_POST['Genre'],
            'userBirthDate' => $_POST['Date'],
            'userPhoneNumber' => $_POST['Tel'],
            'userEthnic' => $_POST['Ethnie'],
            'userJobs' => $_POST['Job'],
            'userIncome' => $_POST['Income'],
            'userProfileImage' => $img,
            'userRole' => 'user',
            'userIsFaker' => '0'
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* 
Fonction de connexion des ustilisateurs 
---------------------------------------
But : récupérer des infos de la table user pour se connecter
*/
function connexionUser($pdo)
{
    try {
        $query = "select * from user where userPseudo=:userPseudo and userEmail=:userEmail and userPassword=:userPassword";
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'userPseudo' => $_POST['Pseudo'],
            'userEmail' => $_POST['Mail'],
            'userPassword' => $_POST['Password'],
        ]);
        $user = $connectUser->fetch();
        //var_dump($user);
        if (!$user) {
            return false;
        } else {
            $_SESSION['user'] = $user;
            return true;
        }
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}

//Modifier un utilisateur
function UpdateUser($pdo, $userId, $img)
{
    try {
        $query = "UPDATE user SET 
                    userName = :userName,
                    userFirstName = :userFirstName,
                    userPseudo = :userPseudo,
                    userPassword = :userPassword,
                    userEmail = :userEmail,
                    userRole = :userRole,
                    userGenre = :userGenre,
                    userBirthDate = :userBirthDate,
                    userPhoneNumber = :userPhoneNumber,
                    userEthnic = :userEthnic,
                    userJobs = :userJobs,
                    userIncome = :userIncome,
                    userProfileImage = :userProfileImage
                WHERE userId = :userId";

        // You need to handle image upload separately if you want to update profile image.

        $updateUser = $pdo->prepare($query);

        $updateUser->execute([
            'userName' => $_POST['Nom'],
            'userFirstName' => $_POST['Prenom'],
            'userPseudo' => $_POST['Pseudo'],
            'userPassword' => $_POST['Password'],
            'userEmail' => $_POST['Mail'],
            'userRole' => 'user',
            'userGenre' => $_POST['Genre'],
            'userBirthDate' => $_POST['Date'],
            'userPhoneNumber' => $_POST['Tel'],
            'userEthnic' => $_POST['Ethnie'],
            'userJobs' => $_POST['Job'],
            'userIncome' => $_POST['Income'],
            'userProfileImage' => $img, // You need to handle image upload here.
            'userId' => $userId
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* 
Fonction de supression des ustilisateurs 
---------------------------------------
But : suprimer toutes les infos de la table user
*/
function deleteUser($pdo, $userId)
{
    try {
        if($_SESSION['userRole'] == 'admin') {
            $query = "delete from user where userId = :userId";
            $ajoutUser = $pdo->prepare($query);
            $ajoutUser->execute([
                'userId' => $_SESSION['user']->userId
            ]);
            // Message à afficher après la suppression
            $deleteMessage = "L'utilisateur a été supprimé avec succès.";
            echo $deleteMessage;
            // Fermer la session
            session_destroy();

            // Redirection vers la page d'accueil après 2 secondes
            header("refresh:2; url=index.php");
            exit();
        } else {
            $VousPouvezPas = "Vous ne pouvez pas supprimer l'utilisateur";
            echo $VousPouvezPas;
        }
        
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/* 
Fonction de traitement d'image de profil 
---------------------------------------
But : suprimer toutes les infos de la table user
*/
function uploadImage() {
    $targetDirectory = "../Assets/Pictures/userProfile/"; // Chemin de stockage des images
    
    // Vérifier si un fichier a été téléchargé
    if (!empty($_FILES["imageProfil"]["name"])) {
        $originalFileName = $_FILES["imageProfil"]["name"];
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $newFileName = $_SESSION['user']->userId . '.' . $extension; // Renommer le fichier avec l'identifiant de l'utilisateur
        
        $targetFile = $targetDirectory . $newFileName;

        // Déplacer le fichier téléchargé vers le dossier spécifié
        if (move_uploaded_file($_FILES["imageProfil"]["tmp_name"], $targetFile)) {
            return $newFileName; // Retourner le nom du fichier
        } else {
            return false; // Retourner false en cas d'erreur
        }
    } else {
        return false; // Retourner false si aucun fichier n'a été téléchargé
    }
}