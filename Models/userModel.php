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
        $query = "insert into user(userName, userFirstName, userPseudo, userPassword, userEmail, userRole, userGenre, userBirthDate, userPhoneNumber, userEthnic, userJobs, userIncome, userIsFaker ) 
        values (:userName, :userFirstName, :userPseudo, :userPassword, :userEmail, :userRole, :userGenre, :userBirthDate, :userPhoneNumber, :userEthnic, :userJobs, :userIncome, :userIsFaker)";

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
function modifyUser($pdo, $userId)
{

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
Fonction de récupération de couleur du header
---------------------------------------
But : récupération de la couleur du header
*/

function test($pdo, $userId) {
    try {
        $query = "SELECT * FROM criminal_record where userId = $userId";
        $criminelUser = $pdo->prepare($query);
    
        $userColor = $criminelUser->fetch();
        
        
    } catch (PDOException $e) {
        $message = $e->getmessage();
        die($message);
    }
}